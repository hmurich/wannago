<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;

use App\Model\Object;

class PageController extends Controller{
    function getMap (Request $request){
        $city_id = City::getCityID();

        $ar = array();
        $ar['title'] = 'Карта сайта';

        $ar['city_id'] = $city_id;
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        $ar['objects'] = Object::all()->keyBy('cat_id');


        return view('front.sitemap', $ar);
    }
}
