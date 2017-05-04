<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Object;
use App\Model\SysDirectoryName;

class IndexController extends Controller{
    function getIndex (Request $request){
        $items = Object::where('id', '>', 0);

        if ($request->has('name') && $request->input('name'))
            $items = $items->where('name', 'like', '%'.$request->input('name').'%');

        if ($request->has('cat_id') && $request->input('cat_id') > 0)
            $items = $items->where('cat_id', $request->input('cat_id'));

        if ($request->has('city_id') && $request->input('city_id') > 0)
            $items = $items->where('city_id', $request->input('city_id'));

        $total_count = clone $items;

        $ar = array();
        $ar['title'] = 'Заполненность ресторанов';
        $ar['items'] = $items->with('relStandartData', 'relLocation')->orderBy('id', 'desc')->paginate(24);
        $ar['total_count'] = $total_count->count();
        $ar['ar_input'] = $request->all();

        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        return view('admin.index.index', $ar);
    }
}
