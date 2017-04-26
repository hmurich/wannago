<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\Object;
use App\Model\Event;
use App\Model\News;
use App\Model\Banner;
use App\Model\SysDirectoryName;

class IndexController extends Controller{
    function getIndex (Request $request){
        $city_id = City::getCityID();

        $ar = array();
        $ar['title'] = 'WannaGo';
        $ar['events'] = Event::where('city_id', $city_id)->where('date_event' , '>', date('Y-m-d'))->where('is_active', 1)->orderBy('date_event', 'asc')->take(5)->get();
        $ar['news'] = News::where('city_id', $city_id)->orderBy('id', 'desc')->take(9)->get();
        $ar['banners'] = Banner::getTwoEl();

        $ar['where_go'] = SysDirectoryName::where('parent_id', 8)->get();
        $ar['recomended'] = Object::where('city_id', $city_id)->where('is_moderate', 1)->where('is_recomded', 1)->with('relStandartData', 'relSlider')->take(8)->get();

        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_avg_pice'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');
        $ar['ar_pub_type'] = SysDirectoryName::where('parent_id', 4)->pluck('name', 'id');
        $ar['ar_karaoke_type'] = SysDirectoryName::where('parent_id', 5)->pluck('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 6)->pluck('name', 'id');
        $ar['ar_music_type'] = SysDirectoryName::where('parent_id', 7)->pluck('name', 'id');

        return view('front.index.index', $ar);
    }

    function getChangeCity($city_id){
        City::setCityID($city_id);

        return back();
    }




}
