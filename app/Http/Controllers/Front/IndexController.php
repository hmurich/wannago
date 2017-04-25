<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class IndexController extends Controller{
    function getIndex (){
        $ar = array();
        $ar['title'] = 'WannaGo';

        return view('front.index.index', $ar);
    }


}
