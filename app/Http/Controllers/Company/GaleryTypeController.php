<?php
namespace App\Http\Controllers\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\ObjectGalereaType;
use App\Model\Generators\ModelSnipet;

class GaleryTypeController extends Controller{
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

        $items = ObjectGalereaType::where('object_id', $object->id);

        $ar = array();
        $ar['title'] = 'Категории галереи "'.$object->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);
        $ar['action'] = action('Company\GaleryTypeController@postItem');

        return view('company.galerea_type.index', $ar);
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


        $item = new ObjectGalereaType();
        $item->object_id = $object->id;
        $item->name = $request->input('name');

        $item->save();

        return redirect()->action('Company\GaleryTypeController@getIndex')->with('success', 'Сохранено');
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

        $item = ObjectGalereaType::where('id', $id)->where('object_id', $object->id)->first();
        if (!$item)
            abort(404);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
