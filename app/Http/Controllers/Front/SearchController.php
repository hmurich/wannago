<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\Object;

class SearchController extends Controller{
    function getIndex (Request $request){
        $city_id = City::getCityID();

        $items = Object::where('city_id', $city_id);


        if ($request->has('name'))
            $items = $items->where('name', 'like', '%'.$request->input('name').'%');

        if ($request->has('sort') && $request->input('sort') == 'new')
            $items = $items->orderBy('created_at', 'desc');
        else if ($request->has('sort') && $request->input('sort') == 'cost')
            $items = $items->orderBy('avg_price_id', 'desc');
        else
            $items = $items->orderBy('raiting', 'desc');

        $ar = array();
        $ar['title'] = 'Вы искали по имени "'.$request->input('name').'"';
        $ar['items'] = $items->with('relStandartData')->paginate(12);

        $ar['name'] = $request->input('name');
        $ar['city_id'] = $city_id;
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_input'] = $request->all();

        $ar['ar_avg_price'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');
        $ar['ar_pub_type'] = SysDirectoryName::where('parent_id', 4)->pluck('name', 'id');
        $ar['ar_karaoke_type'] = SysDirectoryName::where('parent_id', 5)->pluck('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 6)->pluck('name', 'id');
        $ar['ar_music_type'] = SysDirectoryName::where('parent_id', 7)->pluck('name', 'id');

        $ar['ar_pub_id'] = SysDirectoryName::where('parent_id', 4)->pluck('id');
        $ar['ar_karaoke_id'] = SysDirectoryName::where('parent_id', 5)->pluck('id');
        $ar['ar_kitchen_id'] = SysDirectoryName::where('parent_id', 6)->pluck('id');
        $ar['ar_music_id'] = SysDirectoryName::where('parent_id', 7)->pluck('id');

        return view('front.catalog.search', $ar);
    }
}
