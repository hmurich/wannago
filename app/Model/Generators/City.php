<?php
namespace App\Model\Generators;

class City {
    static function getCityID(){
        if (!session()->has('user_city'))
            session()->put('user_city', 1);

        return session()->get('user_city');
    }

    static function setCityID($id){
        session()->put('user_city', $id);
    }
}
