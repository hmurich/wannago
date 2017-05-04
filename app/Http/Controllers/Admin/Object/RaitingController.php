<?php
namespace App\Http\Controllers\Admin\Object;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Object;
use App\Model\SysDirectoryName;
use App\Model\ObjectScoreVote;


class RaitingController extends Controller{
    function getIndex(Request $request, $object_id){
        $object = Object::findOrFail($object_id);

        $items = ObjectScoreVote::where('object_id', $object->id);
        $ar = array();
        $ar['title'] = 'Оценки "'.$object->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        $ar['ar_is_admin'] = array(0=>'Пользователем', 1=>'Админом/Модератором');
        $ar['action'] = action('Admin\Object\RaitingController@postSave', $object->id);

        return view('admin.object.reiting', $ar);
    }

    function postSave(Request $request, $object_id){
        $object = Object::findOrFail($object_id);
        $score = $object->relScore;
        if (!$score)
            abort(404);

        $vote = new ObjectScoreVote();
        $vote->object_id = $object->id;
        $vote->score_id = $score->id;
        $vote->is_admin = 1;
        $vote->score_val = $request->input('score_val');
        $vote->save();

        $score->score_sum = $score->score_sum + $vote->score_val;
        $score->score_count = $score->score_count + 1;
        $score->score_avg = $score->score_sum / $score->score_count;
        $score->save();

        $object->raiting = round($score->score_avg, 2);
        $object->save();

        return back()->with('success', 'Сохранено');
    }

    function getDelete($vote_id){
        $vote = ObjectScoreVote::findOrFail($vote_id);
        $object = Object::findOrFail($vote->object_id);

        $score = $object->relScore;
        if (!$score)
            abort(404);

        $score->score_sum = $score->score_sum - $vote->score_val;
        $score->score_count = $score->score_count - 1;

        if ($score->score_count == 0)
            $score->score_avg = 0;
        else
            $score->score_avg = $score->score_sum / $score->score_count;

        $score->save();

        $object->raiting = round($score->score_avg, 2);
        $object->save();

        $vote->delete();

        return redirect()->back()->with('success', 'Удалено');
    }

}
