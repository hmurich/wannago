<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Object;
use App\Model\SysDirectoryName;
use Cache;

class IndexController extends Controller{
    function getIndex (Request $request){
        $this->checkFill();

        $items = Object::where('id', '>', 0);

        if ($request->has('name') && $request->input('name'))
            $items = $items->where('name', 'like', '%'.$request->input('name').'%');

        if ($request->has('cat_id') && $request->input('cat_id') > 0)
            $items = $items->where('cat_id', $request->input('cat_id'));

        if ($request->has('city_id') && $request->input('city_id') > 0)
            $items = $items->where('city_id', $request->input('city_id'));

        if ($request->has('is_fill') && $request->input('is_fill') == 'empty')
            $items = $items->where('is_fill', 0);
        else if ($request->has('is_fill') && $request->input('is_fill') == 'fill');
            $items = $items->where('is_fill', 1);

        $total_count = clone $items;

        $ar = array();
        $ar['title'] = 'Заполненность ресторанов';
        $ar['items'] = $items->with('relStandartData', 'relLocation')->orderBy('id', 'desc')->paginate(24);
        $ar['total_count'] = $total_count->count();
        $ar['ar_input'] = $request->all();

        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_fill'] = array('fill'=>'Заполнено', 'empty'=>'Не заполнено');

        return view('admin.index.index', $ar);
    }

    function checkFill(){
        $need_check = false;
        if (!Cache::has('check_fill_object'))
            $need_check = true;
        else {
            $last_time = Cache::get('check_fill_object');
            $def_time = time() - $last_time;
            if ($def_time > 120)
                $need_check = true;
        }

        if (!$need_check)
            return true;

        Cache::add('check_fill_object', time(), 120);

        $items = Object::where('id', '>', 0)->with('relStandartData', 'relSlider', 'relGelerea', 'relLocation', 'relSpecialOption', 'relMenu')->get();
        foreach ($items as $i) {
            $all_fill = true;
            if (!($i->relStandartData && $i->relStandartData->note))
                $all_fill = false;

            if ($all_fill && !($i->relStandartData && $i->relStandartData->logo))
                $all_fill = false;

            if ($all_fill && !($i->relSlider()->count() > 0))
                $all_fill = false;

            if ($all_fill && !($i->relGelerea()->count() > 0))
                $all_fill = false;

            if ($all_fill && !($i->relLocation && $i->relLocation->lng && $i->relLocation->lat))
                $all_fill = false;

            if ($all_fill && !($i->relSpecialOption()->count() > 0))
                $all_fill = false;

            if ($all_fill && !($i->relMenu()->count() > 0))
                $all_fill = false;

            $i->is_fill = ($all_fill ? 1 : 0);
            $i->save();

        }
    }

    function itterateObject(){

    }
}
