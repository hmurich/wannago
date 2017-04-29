<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\Object;

class CatalogController extends Controller{
    function getIndex (Request $request, $cat_id){
        $city_id = City::getCityID();
        $cat = SysDirectoryName::where('parent_id', 3)->where('id', $cat_id)->first();
        if (!$cat)
            abort(404);

        $items = Object::where('city_id', $city_id)->where('cat_id', $cat->id);

        if ($request->has('spec_option') && count($request->input('spec_option')) > 0)
            $items = $items->whereHas('', function($q) use ($request){

            });

        $ar = array();
        $ar['title'] = 'Каталог';
        $ar['items'] = $items->orderBy('raiting', 'desc')->paginate(4);
        $ar['cat'] = $cat;

        $ar['city_id'] = $city_id;
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        $ar['ar_avg_price'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');
        $ar['ar_spec_option'] = $cat->getSpecialOption();

        $ar['ar_pub_id'] = SysDirectoryName::where('parent_id', 4)->pluck('id');
        $ar['ar_karaoke_id'] = SysDirectoryName::where('parent_id', 5)->pluck('id');
        $ar['ar_kitchen_id'] = SysDirectoryName::where('parent_id', 6)->pluck('id');
        $ar['ar_music_id'] = SysDirectoryName::where('parent_id', 7)->pluck('id');

        return view('front.catalog.index', $ar);
    }
}
