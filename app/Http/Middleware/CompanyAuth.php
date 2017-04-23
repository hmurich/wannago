<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CompanyAuth {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next){
        if ($this->auth->guest())
            return redirect()->action('Company\AuthController@getLogin')->with('error', 'Введите email и пароль, для доступа в админку');

        if ($this->auth->user()->type_id != 3)
            return redirect()->guest('/')->with('error', 'У Вас нет прав для просмотра');

        return $next($request);
    }
}
