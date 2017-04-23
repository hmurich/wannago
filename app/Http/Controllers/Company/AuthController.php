<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class AuthController extends Controller{
    function getLogin (){
        $ar = array();
        $ar['title'] = 'Форма входа';
        $ar['action'] = action('Company\AuthController@postLogin');

        return view('company.auth', $ar);
    }

    function postLogin(Request $request){
        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return back()->with('error', 'Не правильный email/пароль');

        return redirect()->action('Company\IndexController@getIndex');
    }

    function getProfile(Request $request){
        $user = $request->user();

        $ar = array();
        $ar['title'] = 'Профиль';
        $ar['user'] = $user;
        $ar['action'] = action('Company\AuthController@postProfile');

        return view('company.cabinet', $ar);
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
