<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Company;
use Hash;
use Auth;
use DB;

class AuthController extends Controller{
    function getLogin (){
        $ar = array();
        $ar['title'] = 'Форма входа';
        $ar['action'] = action('Company\AuthController@postLogin');

        return view('company.auth', $ar);
    }

    function postChangeObject(Request $request){
        session()->put('object_id', $request->input('object_id'));

        return redirect()->back();
    }

    function postLogin(Request $request){
        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return back()->with('error', 'Не правильный email/пароль');

        return redirect()->action('Company\IndexController@getIndex');
    }

    function getProfile(Request $request){
        $user = $request->user();
        $item = Company::where('user_id', $user->id)->first();
        if (!$item)
            abort(404);

        $ar = array();
        $ar['title'] = 'Профиль';
        $ar['user'] = $user;
        $ar['item'] = $item;
        $ar['action'] = action('Company\AuthController@postProfile');

        return view('company.cabinet', $ar);
    }

    function postProfile(Request $request){
        $user = $request->user();
        $item = Company::where('user_id', $user->id)->first();
        if (!$item)
            abort(404);

        if (User::where('email', $request->input('email'))->where('id', '<>', $user->id)->count() > 0)
            return back()->with('error', 'Указанный email уже существует');

        DB::beginTransaction();

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $item->name =  $request->input('name');
        $item->phone =  $request->input('phone');
        $item->address =  $request->input('address');
        $item->note = $request->input('note');
        $item->save();

        DB::commit();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getLogout(){
        Auth::logout();

        return redirect()->to('/');
    }
}
