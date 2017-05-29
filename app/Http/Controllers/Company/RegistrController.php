<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Company;
use Hash;
use Auth;
use DB;

class RegistrController extends Controller{
    function getIndex(){
        $ar = array();
        $ar['title'] = 'Форма регистрации';
        $ar['action'] = action('Company\RegistrController@postIndex');

        return view('company.registr', $ar);
    }

    function postIndex(Request $request){
        if ($request->has('email') && User::where('email', $request->input('email'))->count())
            return redirect()->back()->with('error', 'Email уже существует');

        DB::beginTransaction();

        $user = new User();
        $user->type_id = 3;
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $item = new Company();
        $item->user_id = $user->id;

        $item->name =  $request->input('name');
        $item->phone =  $request->input('phone');
        $item->address =  $request->input('address');
        $item->save();

        DB::commit();

        return redirect()->action('Company\AuthController@getLogin')->with('success', 'Сохранено');
    }
}
