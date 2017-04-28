<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\News;

class NewsController extends Controller{
    function getIndex (Request $request){
        $city_id = City::getCityID();

        $items = News::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Новости';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(4);

        $ar['city_id'] = $city_id;
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        return view('front.news.index', $ar);
    }
}
