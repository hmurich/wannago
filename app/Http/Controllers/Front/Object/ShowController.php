<?php
namespace App\Http\Controllers\Front\Object;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\ObjectMainOption;
use App\Model\Object;
use App\Model\Event;

class ShowController extends Controller{
    function getIndex (Request $request, $alias){
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

        $events = Event::where('object_id', $object->id)->where('date_event' , '>', date('Y-m-d'))->orderBy('date_event', 'asc')->take(4)->get();

        $ar_pub_id = SysDirectoryName::where('parent_id', 4)->pluck('id');
        $ar_karaoke_id = SysDirectoryName::where('parent_id', 5)->pluck('id');
        $ar_kitchen_id = SysDirectoryName::where('parent_id', 6)->pluck('id');
        $ar_music_id = SysDirectoryName::where('parent_id', 7)->pluck('id');

        $ar = array();
        $ar['title'] = $object->name;
        $ar['city_id'] = $city_id;
        $ar['object'] = $object;
        $ar['events'] = $events;

        $ar['main_pub'] = ObjectMainOption::where('object_id', $object->id)->whereIn('option_id', $ar_pub_id)->select('name')->get()->implode('name', ', ');
        $ar['main_karaoke'] = ObjectMainOption::where('object_id', $object->id)->whereIn('option_id', $ar_karaoke_id)->select('name')->get()->implode('name', ', ');
        $ar['main_kitchen'] = ObjectMainOption::where('object_id', $object->id)->whereIn('option_id', $ar_kitchen_id)->select('name')->get()->implode('name', ', ');
        $ar['main_musik'] = ObjectMainOption::where('object_id', $object->id)->whereIn('option_id', $ar_music_id)->select('name')->get()->implode('name', ', ');

        $ar['ar_avg_price'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');

        $ar['simular_object'] = Object::whereIn('id', $ar_simular)->orderBy('raiting', 'desc')->get();
        $ar['ar_company_object'] = Object::where('company_id', $object->company_id)->pluck('cat_id', 'alias');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');


        return view('front.object.show', $ar);
    }

}