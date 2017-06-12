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
        $ar['title'] = 'Weekends.kz - гид #1 по заведениям в Астане';
        $ar['events'] = Event::where('city_id', $city_id)->where('date_event' , '>', date('Y-m-d'))->where('is_active', 1)->orderBy('date_event', 'asc')->take(5)->get();
        $ar['news'] = News::where('city_id', $city_id)->orderBy('id', 'desc')->take(9)->get();
        $ar['banners'] = Banner::getTwoEl();

        $ar['where_go'] = SysDirectoryName::where('parent_id', 8)->get();
        $ar['recomended'] = Object::where('city_id', $city_id)->where('is_recomded', 1)->with('relStandartData', 'relSlider')->take(8)->get();
        $ar['object_on_slide'] = Object::where('city_id', $city_id)->where('is_slide', 1)->get();

        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_avg_pice'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');
        $ar['ar_pub_type'] = SysDirectoryName::where('parent_id', 4)->pluck('name', 'id');
        $ar['ar_karaoke_type'] = SysDirectoryName::where('parent_id', 5)->pluck('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 6)->pluck('name', 'id');
        $ar['ar_music_type'] = SysDirectoryName::where('parent_id', 7)->pluck('name', 'id');
        $ar['city_id'] = $city_id;

        if ($request->has('cat_id'))
            $ar['cat_id'] = $request->input('cat_id');
        else
            $ar['cat_id'] = 9;

        $ar['spec_option'][9] = SysDirectoryName::where('parent_id', 9)->pluck('name', 'id');
        $ar['spec_option'][23] = SysDirectoryName::where('parent_id', 10)->pluck('name', 'id');
        $ar['spec_option'][24] = SysDirectoryName::where('parent_id', 11)->pluck('name', 'id');
        $ar['spec_option'][25] = SysDirectoryName::where('parent_id', 12)->pluck('name', 'id');
        $ar['spec_option'][26] = SysDirectoryName::where('parent_id', 13)->pluck('name', 'id');
        $ar['spec_option'][27] = SysDirectoryName::where('parent_id', 14)->pluck('name', 'id');
        $ar['spec_option'][28] = SysDirectoryName::where('parent_id', 15)->pluck('name', 'id');
        $ar['spec_option'][29] = SysDirectoryName::where('parent_id', 16)->pluck('name', 'id');

        $ar['request'] = $request;

        return view('front.index.index', $ar);
    }

    function getChangeCity($city_id){
        City::setCityID($city_id);

        return back();
    }




}
