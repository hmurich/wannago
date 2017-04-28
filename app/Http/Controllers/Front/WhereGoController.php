<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\Object;

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

    function getList(Request $request, $where_go_id){
        $where_go = SysDirectoryName::where('parent_id', 8)->where('id', $where_go_id)->first();
        if (!$where_go)
            abort(404);

        $city_id = City::getCityID();
        $items = Object::where('city_id', $city_id)->whereHas('relMainOptions', function($q) use ($where_go){
                $q->where('option_id', $where_go->id);
            });

        $ar = array();
        $ar['title'] = 'Подборки "'.$where_go->name.'"';
        $ar['where_go'] = $where_go;
        $ar['items'] = $items->with('relSlider', 'relMainOptions', 'relStandartData', 'relDopOption', 'relSpecialOption')->paginate(12);

        $ar['city_id'] = $city_id;
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        $ar['ar_avg_price'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');

        $ar['ar_pub_id'] = SysDirectoryName::where('parent_id', 4)->pluck('id');
        $ar['ar_karaoke_id'] = SysDirectoryName::where('parent_id', 5)->pluck('id');
        $ar['ar_kitchen_id'] = SysDirectoryName::where('parent_id', 6)->pluck('id');
        $ar['ar_music_id'] = SysDirectoryName::where('parent_id', 7)->pluck('id');

        //echo '<pre>'; print_r($ar['ar_avg_pice']); echo '</pre>'; exit();

        return view('front.where_go.list', $ar);
    }
}
