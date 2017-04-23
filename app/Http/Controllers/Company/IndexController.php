<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

class IndexController extends Controller{
    function getIndex (){
        $ar = array();
        $ar['title'] = 'Кабинет компании';

        return view('company.index.index', $ar);
    }
}
