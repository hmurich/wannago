<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;

class WhereGoController extends Controller{
    function getIndex (Request $request){
        $city_id = City::getCityID();

        $ar = array();
        $ar['title'] = 'Подборки';
        $ar['where_go'] = SysDirectoryName::where('parent_id', 8)->get();

        $ar['city_id'] = $city_id;
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        return view('front.where_go.index', $ar);
    }
}
