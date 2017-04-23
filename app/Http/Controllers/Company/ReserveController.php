<?php
namespace App\Http\Controllers\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\Reserve;

class ReserveController extends Controller{
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

        $items = Reserve::where('object_id', $object->id);

        $ar = array();
        $ar['title'] = 'Бронирование "'.$object->name.'"';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        return view('company.reserve.index', $ar);
    }

    function getAccept(Request $request, $event_id){
        $user = $request->user();

        $object = Object::where('user_id', $user->id);
        if (session()->has('object_id'))
            $object = $object->where('id', session()->get('object_id'));
        $object = $object->orderBy('name', 'id')->first();
        if (!$object)
            $object = Object::where('user_id', $user->id)->orderBy('name', 'id')->first();
        if (!$object)
            abort(404);

        $event = Reserve::where('object_id', $object->id)->where('id' , $event_id)->first();
        if (!$event)
            abort(404);

        $event->is_accept = 1;
        $event->save();

        return redirect()->back()->with('success', 'Сохранено');
    }
}
