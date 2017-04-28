<?php
namespace App\Http\Controllers\Front\Object;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\Object;
use App\Model\News;

class NewsController extends Controller{
    function getList (Request $request, $alias){

    }

    function getShow (Request $request, $alias, $news_id){
        $city_id = City::getCityID();

        $object = Object::where('alias', $alias)->first();
        if (!$object)
            abort(404);

        $ar_simular = Object::where('id', '!=', $object->id)
                            ->where('cat_id', $object->cat_id)
                            ->where('raiting', '>=', $object->raiting)->take(4)->pluck('id');
        if (count($ar_simular) < 4){
            $count_take = 4 - count($ar_simular_up);
            $ar_simular_down = Object::where('id', '!=', $object->id)
                                        ->where('cat_id', $object->cat_id)
                                        ->where('raiting', '<=', $object->raiting)->take($count_take)->pluck('id');
            $ar_simular = $ar_simular + $ar_simular_down;
        }

        $news = News::where(array('object_id'=>$object->id, 'id'=>$news_id))->first();
        if (!$news)
            abort(404);

        $ar = array();
        $ar['title'] = $news->title;
        $ar['object'] = $object;
        $ar['news'] = $news;

        $ar['city_id'] = $city_id;
        $ar['simular_object'] = Object::whereIn('id', $ar_simular)->orderBy('raiting', 'desc')->get();
        $ar['ar_company_object'] = Object::where('company_id', $object->company_id)->pluck('cat_id', 'alias');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');

        return view('front.object.news_item', $ar);
    }
}
