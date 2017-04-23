<?php
namespace App\Http\Controllers\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\Event;

class CommentController extends Controller{
    function getIndex(Request $request){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $items = Comment::where('object_id', $object->id);

        $ar = array();
        $ar['title'] = 'Отзывы "'.$object->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        return view('company.comment.index', $ar);
    }

    function getAnswer(Request $request){

    }

    function postAnswer(){

    }
}
