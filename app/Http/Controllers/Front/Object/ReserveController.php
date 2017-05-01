<?php
namespace App\Http\Controllers\Front\Object;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Object;
use App\Model\Reserve;

class ReserveController extends Controller{
    function getForm($object_id){
        $object = Object::findOrFail($object_id);

        $ar = array();
        $ar['object'] = $object;
        $ar['standart_data'] = $object->relStandartData;
        $ar['action'] = action('Front\Object\ReserveController@postForm', $object->id);

        return view('front.object.include.booking', $ar);
    }

    function postForm(Request $request, $object_id){
        $object = Object::findOrFail($object_id);

        $item = new Reserve();
        $item->object_id = $object->id;
        $item->name = $request->input('name');
        $item->phone = $request->input('phone');
        $item->email = $request->input('email');
        $item->note = 'Количество персон - '.$request->input('count_person').'.'.$request->input('note');
        $item->enter_date = $request->input('enter_date');
        $item->enter_time = $request->input('time');
        $item->created_unix = time();
        $item->save();

        return back()->with('success', 'Ваша бронь успешна принята');
    }

}
