<?php
namespace App\Http\Controllers\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\Comment;

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

        $items = Comment::where('object_id', $object->id)->where('parent_id', 0);

        $ar = array();
        $ar['title'] = 'Отзывы "'.$object->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        return view('company.comment.index', $ar);
    }

    function getAnswer(Request $request, $comment_id){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $comment = Comment::where('object_id', $object->id)->where('id' , $comment_id)->where('had_answer', 0)->where('parent_id', 0)->first();
        if (!$comment)
            abort(404);

        $ar = array();
        $ar['title'] = 'Ответ на отзыв';
        $ar['action'] = action('Company\CommentController@postAnswer', $comment->id);

        return view('company.comment.answer', $ar);
    }

    function postAnswer(Request $request, $comment_id){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $comment = Comment::where('object_id', $object->id)->where('id' , $comment_id)->where('had_answer', 0)->where('parent_id', 0)->first();
        if (!$comment)
            abort(404);
        $comment->had_answer = 1;
        $comment->save();

        $answer = new Comment();
        $answer->title = $request->input('title');
        $answer->note = $request->input('note');
        $answer->object_id = $object->id;
        $answer->parent_id = $comment->id;
        $answer->save();

        return redirect()->action('Company\CommentController@getIndex')->with('success', 'Сохранено');
    }
}
