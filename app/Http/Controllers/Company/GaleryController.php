<?php
namespace App\Http\Controllers\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\ObjectGallery;
use App\Model\Generators\ModelSnipet;

class GaleryController extends Controller{
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

        $items = ObjectGallery::where('object_id', $object->id);

        $ar = array();
        $ar['title'] = 'Галерея "'.$object->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);
        $ar['action'] = action('Company\GaleryController@postItem');

        return view('company.galerea.index', $ar);
    }

    function postItem(Request $request){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);


        $item = new ObjectGallery();
        $item->object_id = $object->id;
        if ($request->hasFile('image'))
            $item->image = ModelSnipet::setImage($request->file('image'), 'galerea', 800, 350);

        $item->save();

        return redirect()->action('Company\GaleryController@getIndex')->with('success', 'Сохранено');
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

        $item = ObjectGallery::where('id', $id)->where('object_id', $object->id)->first();
        if (!$item)
            abort(404);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
