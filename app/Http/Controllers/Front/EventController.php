<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Generators\City;
use App\Model\SysDirectoryName;
use App\Model\Event;

use App\Model\Generators\ModelSnipet;

class EventController extends Controller{
    function getIndex (Request $request){
        $city_id = City::getCityID();

        $items = Event::where('is_active', 1)->where('city_id', $city_id);

        if ($request->has('is_hot') && $request->input('is_hot')){
            $items = $items->where('is_hot', 1);
            $is_hot = 0;
        }
        else
            $is_hot = 1;

        if ($request->has('title') && $request->input('title'))
            $items = $items->where('title', 'like', '%'.$request->input('title').'%');

        if ($request->has('event_data') && $request->input('event_data')){
            $event_data = explode("/", $request->input('event_data'));
            if (count($event_data) == 3)
                $items = $items->where('date_event', $event_data[2].'-'.$event_data[0].'-'.$event_data[1]);
        }


        $ar = array();
        $ar['title'] = 'События';
        $ar['items'] = $items->orderBy('id', 'desc')->with('relObject')->paginate(12);

        $ar['is_hot'] = $is_hot;

        $ar['ar_input'] = $request->all();
        $ar['city_id'] = $city_id;
        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        return view('front.events.index', $ar);
    }
}
