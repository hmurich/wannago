<?php
namespace App\Http\Controllers\Front\Object;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\ObjectMainOption;
use App\Model\Object;
use App\Model\Event;
use App\Model\News;
use App\Model\Comment;

use App\Model\Visitor;
use App\User;
use Auth;

class ShowController extends Controller{
    function getIndex (Request $request, $alias){
        if ($request->has('token'))
            $this->socialAuth($request);

        $city_id = City::getCityID();

        $object = Object::where('alias', $alias)->first();
        if (!$object)
            abort(404);

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


        $events = Event::where('object_id', $object->id)->where('date_event' , '>', date('Y-m-d'))->orderBy('date_event', 'asc')->take(1)->get();
        $news = News::where('object_id', $object->id)->orderBy('id', 'asc')->take(1)->get();

        $ar_pub_id = SysDirectoryName::where('parent_id', 4)->pluck('id');
        $ar_karaoke_id = SysDirectoryName::where('parent_id', 5)->pluck('id');
        $ar_kitchen_id = SysDirectoryName::where('parent_id', 6)->pluck('id');
        $ar_music_id = SysDirectoryName::where('parent_id', 7)->pluck('id');

        $ar = array();
        $ar['title'] = $object->name;
        $ar['object'] = $object;
        $ar['special_option'] = $object->relSpecialOption;
        $ar['standart_data'] = $object->relStandartData;
        $ar['events'] = $events;
        $ar['news'] = $news;
        $ar['comments'] = Comment::where('object_id', $object->id)->orderBy('id', 'desc')->paginate(12);

        $cat = SysDirectoryName::find($object->cat_id);
        if ($cat)
            $ar['menu_cat'] = $cat;

        $ar['active_menu'] = 'note';

        $ar['main_pub'] = ObjectMainOption::where('object_id', $object->id)->whereIn('option_id', $ar_pub_id)->select('name')->get()->implode('name', ', ');
        $ar['main_karaoke'] = ObjectMainOption::where('object_id', $object->id)->whereIn('option_id', $ar_karaoke_id)->select('name')->get()->implode('name', ', ');
        $ar['main_kitchen'] = ObjectMainOption::where('object_id', $object->id)->whereIn('option_id', $ar_kitchen_id)->select('name')->get()->implode('name', ', ');
        $ar['main_musik'] = ObjectMainOption::where('object_id', $object->id)->whereIn('option_id', $ar_music_id)->select('name')->get()->implode('name', ', ');

        $ar['ar_avg_price'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');

        $ar['city_id'] = $city_id;
        $ar['simular_object'] = Object::whereIn('id', $ar_simular)->orderBy('raiting', 'desc')->get();
        $ar['ar_company_object'] = Object::where('company_id', $object->company_id)->pluck('cat_id', 'alias');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');

        return view('front.object.show', $ar);
    }

    private function socialAuth(Request $request){
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

}
