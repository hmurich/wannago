<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class AdminAuth {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next){
        if ($this->auth->guest() || $this->auth->user()->type_id != 1){
            Auth::logout();

            return redirect()->action('Admin\AuthController@getLogin')->with('error', 'Введите email и пароль, для доступа в админку');
        }

        return $next($request);
    }
}
