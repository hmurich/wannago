<?php
namespace App\Http\Controllers\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\News;
use App\Model\Generators\ModelSnipet;

class NewsController extends Controller{
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

        $items = News::where('object_id', $object->id);

        $ar = array();
        $ar['title'] = 'Новости "'.$object->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        return view('company.news.index', $ar);
    }

    function getDeleteImage(Request $request, $id){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $item = News::where('id', $id)->where('object_id', $object->id)->first();
        if (!$item)
            abort(404);

        $item->image = null;
        $item->save();

        return redirect()->back()->with('success', 'Удалено');
    }

    function getItem(Request $request, $id = 0){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $item = News::where('id', $id)->where('object_id', $object->id)->first();

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавить новость';
            $ar['action'] = action('Company\NewsController@postItem');
        }
        else {
            $ar['title'] = 'Редактировать новость';
            $ar['action'] = action('Company\NewsController@postItem', $item->id);
            $ar['item'] = $item;
        }


        return view('company.news.item', $ar);
    }

    function postItem(Request $request, $id = 0){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $item = News::where('id', $id)->where('object_id', $object->id)->first();
        if (!$item){
            $item = new News();
            $item->object_id = $object->id;
        }
        if ($request->hasFile('image'))
            $item->image = ModelSnipet::setImage($request->file('image'), 'image-news', 800, 600);
        $item->title = $request->input('title');
        $item->note = $request->input('note');
        $item->save();

        return redirect()->action('Company\NewsController@getIndex')->with('success', 'Сохранено');
    }

    function getDelete(Request $request, $id){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $item = News::where('id', $id)->where('object_id', $object->id)->first();
        if (!$item)
            abort(404);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
