<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\NewObject;

class NewObjectController extends Controller{
    function postSave (Request $request){
        $item = new NewObject();
        $item->company_id = 0;
        $item->status_id = 0;
        $item->cat_id = $request->input('cat_id');
        $item->fio = $request->input('fio');
        $item->phone = $request->input('phone');
        $item->email = $request->input('email');
        $item->name = $request->input('name');
        $item->save();

        return redirect()->back()->with('info', 'Ваша заявка на новую организацию принята. В лижайшее время с Вами свяжеться наш сотрудник.');
    }
}
