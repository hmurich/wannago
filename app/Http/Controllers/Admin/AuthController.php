<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class AuthController extends Controller{
    function getLogin (){
        /*
        $user = new User();
        $user->email = 'hmurich@mail.ru';
        $user->password = Hash::make('346488');
        $user->type_id = 1;
        $user->save();
        */

        $ar = array();
        $ar['title'] = 'Форма входа';
        $ar['action'] = action('Admin\AuthController@postLogin');

        return view('admin.auth', $ar);
    }

    function postLogin(Request $request){
        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return back()->with('error', 'Не правильный email/пароль');

        return redirect()->action('Admin\IndexController@getIndex');
    }

    function getProfile(Request $request){
        $user = $request->user();

        $ar = array();
        $ar['title'] = 'Профиль';
        $ar['user'] = $user;
        $ar['action'] = action('Admin\AuthController@postProfile');

        return view('admin.cabinet', $ar);
    }

    function postProfile(Request $request){
        $user = $request->user();

        if (User::where('email', $request->input('email'))->where('id', '<>', $user->id)->count() > 0)
            return back()->with('error', 'Указанный email уже существует');

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getLogout(){
        Auth::logout();

        return redirect()->to('/');
    }
}
