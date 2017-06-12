<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\SysDirectoryName;
use App\Model\Generators\City;
use App\Model\Anketa;
use App\Model\AnketePhoto;

class AnketaController extends Controller{
    function getIndex(Request $request){
        $city_id = City::getCityID();
        $city = SysDirectoryName::where('parent_id', 1)->where('id', $city_id)->first();
        if (!$city)
            abort(404);

        $ar = array();
        $ar['title'] = 'Анкета';
        $ar['city_id'] = $city_id;
        $ar['city'] = $city;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');

        return view('front.anketa.index', $ar);
    }

    function postIndex(Request $request){

    }
}
