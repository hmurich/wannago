<?php
namespace App\Http\Controllers\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\ObjectGallery;
use App\Model\ObjectGalereaType;
use App\Model\Generators\ModelSnipet;

class GaleryController extends Controller{
    function getIndex(Request $request, $cat_id){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $items = ObjectGallery::where('object_id', $object->id)->where('type_id', $cat_id);

        $cat = ObjectGalereaType::findOrFail($cat_id);

        $ar = array();
        $ar['title'] = 'Галерея "'.$object->name.'", категория "'.$cat->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);
        $ar['action'] = action('Company\GaleryController@postItem', $cat_id);

        return view('company.galerea.index', $ar);
    }

    function postItem(Request $request, $cat_id){
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
        $item->type_id = $cat_id;
        if ($request->hasFile('image'))
            $item->image = ModelSnipet::setImage($request->file('image'), 'galerea', ObjectGallery::IMAGE_W, ObjectGallery::IMAGE_H);

        $item->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getDelete(Request $request, $cat_id, $id){
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
