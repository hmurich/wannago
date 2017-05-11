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
        $city = SysDirectoryName::where('parent_id', 1)->where('id', $city_id)->first();
        if (!$city)
            abort(404);

        $cat = SysDirectoryName::where('parent_id', 3)->where('id', $cat_id)->first();
        if (!$cat)
            abort(404);

        $items = Object::where('city_id', $city_id)->where('cat_id', $cat->id);

        if ($request->has('spec_option') && count($request->input('spec_option')) > 0 && !in_array(0, $request->input('spec_option')))
            $items = $items->whereHas('relSpecialOption', function($q) use ($request){
                $q->whereIn('option_id', $request->input('spec_option'));
            });

        if (($request->has('avg_price') && $request->input('avg_price') > 0) || ($request->has('ciry_area') && $request->input('ciry_area') > 0))
            $items = $items->whereHas('relStandartData', function($q) use ($request){
                if ($request->has('avg_price') && $request->input('avg_price') > 0)
                    $q = $q->where('avg_price_id', $request->input('avg_price'));

                if ($request->has('ciry_area') && $request->input('ciry_area') > 0)
                    $q = $q->where('city_area_id', $request->input('ciry_area'));
            });

        if ($request->has('pub_id') && $request->input('pub_id') > 0)
            $items = $items->whereHas('relMainOptions', function($q) use ($request){
                $q->where('option_id', $request->input('pub_id'));
            });

        if ($request->has('karaoke_type') && $request->input('karaoke_type') > 0)
            $items = $items->whereHas('relMainOptions', function($q) use ($request){
                $q->where('option_id', $request->input('karaoke_type'));
            });

        if ($request->has('music_type') && $request->input('music_type') > 0)
            $items = $items->whereHas('relMainOptions', function($q) use ($request){
                $q->where('option_id', $request->input('music_type'));
            });

        if ($request->has('kitchen') && $request->input('kitchen') > 0)
            $items = $items->whereHas('relMainOptions', function($q) use ($request){
                $q->where('option_id', $request->input('kitchen'));
            });

        if ($request->has('sort') && $request->input('sort') == 'new')
            $items = $items->orderBy('created_at', 'desc');
        else if ($request->has('sort') && $request->input('sort') == 'cost')
            $items = $items->orderBy('avg_price_id', 'desc');
        else
            $items = $items->orderBy('raiting', 'desc');

        $ar = array();
        $ar['title'] = 'Каталог';

        if ($request->has('on_map') && $request->input('on_map'))
            $ar['items'] = $items->with('relLocation', 'relStandartData')->get();
        else
            $ar['items'] = $items->with('relStandartData', 'relSpecialOption')->paginate(12);

        $ar['cat'] = $cat;
        $ar['menu_cat'] = $cat;

        $ar['city_id'] = $city_id;
        $ar['city'] = $city;
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_input'] = $request->all();

        $ar['ar_avg_price'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');
        $ar['ar_spec_option'] = $cat->getSpecialOption();
        $ar['ar_pub_type'] = SysDirectoryName::where('parent_id', 4)->pluck('name', 'id');
        $ar['ar_karaoke_type'] = SysDirectoryName::where('parent_id', 5)->pluck('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 6)->pluck('name', 'id');
        $ar['ar_music_type'] = SysDirectoryName::where('parent_id', 7)->pluck('name', 'id');

        if ($request->has('on_map') && $request->input('on_map'))
            return view('front.catalog.map', $ar);

        $ar['ar_pub_id'] = SysDirectoryName::where('parent_id', 4)->pluck('id');
        $ar['ar_karaoke_id'] = SysDirectoryName::where('parent_id', 5)->pluck('id');
        $ar['ar_kitchen_id'] = SysDirectoryName::where('parent_id', 6)->pluck('id');
        $ar['ar_music_id'] = SysDirectoryName::where('parent_id', 7)->pluck('id');

        $ar['ar_ciry_area'] = SysDirectoryName::where('parent_id', 25)->pluck('name', 'id')->toArray();

        return view('front.catalog.index', $ar);
    }
}
