<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\Anketa;
use App\Model\AnketePhoto;

class AnketaController extends Controller{
    function getIndex(Request $request){
        $ar = array();
        $ar['title'] = 'Анкета';

        return view('front.anketa.index', $ar);
    }

    function postIndex(Request $request){

    }
}
