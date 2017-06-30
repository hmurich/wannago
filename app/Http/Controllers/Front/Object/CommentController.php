<?php
namespace App\Http\Controllers\Front\Object;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\Object;
use App\Model\Comment;
use App\Model\Visitor;
use App\Model\ObjectScoreVote;

use App\User;
use Auth;

class CommentController extends Controller{
    function getList (Request $request, $alias){
        $city_id = City::getCityID();

        $object = Object::where('alias', $alias)->first();
        if (!$object)
            abort(404);

        $items = Comment::where('object_id', $object->id);

        $ar_simular = Object::where('id', '!=', $object->id)
                            ->where('cat_id', $object->cat_id)
                            ->where('raiting', '>=', $object->raiting)->take(4)->pluck('id')->toArray();
        if (count($ar_simular) < 4 ){
            $count_take = 4 - count($ar_simular);
            $ar_simular_down = Object::where('id', '!=', $object->id)
                                        ->where('cat_id', $object->cat_id)
                                        ->where('raiting', '<', $object->raiting)->take($count_take)->pluck('id')->toArray();

            $ar_simular = $ar_simular + $ar_simular_down;
        }

        $ar = array();
        $ar['title'] = 'Отзывы "'.$object->name.'"';
        $ar['object'] = $object;
        $ar['standart_data'] = $object->relStandartData;
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(12);

        $ar['active_menu'] = 'comment';

        $cat = SysDirectoryName::find($object->cat_id);
        if ($cat)
            $ar['menu_cat'] = $cat;

        $ar['city_id'] = $city_id;
        $ar['simular_object'] = Object::whereIn('id', $ar_simular)->orderBy('raiting', 'desc')->get();
        $ar['ar_company_object'] = Object::where('company_id', $object->company_id)->pluck('cat_id', 'alias');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');

        return view('front.object.comment', $ar);
    }

    function postList(Request $request){
        $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user_data = json_decode($s, true);
        if (!isset($user_data['network']) || !isset($user_data['uid']))
            abort(404);


        $visitor = Visitor::where('network', $user_data['network'])->where('uid', $user_data['uid'])->first();
        if (!$visitor){
            $user = new User();
            $user->type_id = 4;
            $user->email = time().'@rand.rand';
            $user->password = time();
            $user->save();

            $visitor = new Visitor();
            $visitor->user_id = $user->id;
            if (isset($user_data['network']))
                $visitor->network = $user_data['network'];
            if (isset($user_data['identity']))
                $visitor->identity = $user_data['identity'];
            if (isset($user_data['uid']))
                $visitor->uid = $user_data['uid'];
            if (isset($user_data['first_name']))
                $visitor->first_name = $user_data['first_name'];
            if (isset($user_data['last_name']))
                $visitor->last_name = $user_data['last_name'];
            if (isset($user_data['profile']))
                $visitor->profile = $user_data['profile'];

            $visitor->save();
        }

        Auth::loginUsingId($visitor->user_id);

        return back()->with('success', 'Сохранено');
    }

    function postSave(Request $request, $alias){
        $object = Object::where('alias', $alias)->first();
        if (!$object)
            abort(404);

        $user = $request->user();
        if (!$user)
            return back()->with('error', 'Вы не автризованы');

        $item = new Comment();
        $item->object_id = $object->id;
        $item->title = $request->input('title');
        $item->note = $request->input('note');
        $item->had_answer = 0;
        $item->parent_id = 0;
        $item->save();

        if ($request->has('score_val'))
            $this->addRaiting($request, $object);

        return back()->with('success', 'Сохранено');
    }

    function addRaiting(Request $request, $object){
        $score = $object->relScore;
        if (!$score)
            return false;

        $user_id = 0;
        if ($request->user())
            $user_id = $request->user()->id;

        $vote = new ObjectScoreVote();
        $vote->object_id = $object->id;
        $vote->score_id = $score->id;
        $vote->is_admin = 0;
        $vote->mobile_user_id = $user_id;
        $vote->score_val = $request->input('score_val');
        $vote->save();

        $score->score_sum = $score->score_sum + $vote->score_val;
        $score->score_count = $score->score_count + 1;
        $score->score_avg = $score->score_sum / $score->score_count;
        $score->save();

        $object->raiting = round($score->score_avg, 2);
        $object->save();

        return true;
    }
}
