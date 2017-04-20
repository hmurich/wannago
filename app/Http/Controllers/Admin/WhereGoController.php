<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\SysDirectoryName;
use App\Model\Object;
use App\Model\ObjectMainOption;

class WhereGoController extends Controller{
    function getIndex (Request $request, $cat_id){
        $cat = SysDirectoryName::where('parent_id', 8)->where('id', $cat_id)->first();
        if (!$cat)
            abort(404);

        $items = Object::whereHas('relMainOptions', function($q) use ($cat){
            $q->where('option_id', $cat->id);
        });

        $ar = array();
        $ar['title'] = 'Куда сходить "'.$cat->name.'"';
        $ar['cat'] = $cat;
        $ar['items'] = $items->with('relUser', 'relStandartData')->orderBy('id', 'asc')->paginate(24);

        $ar['action'] = action('Admin\WhereGoController@postAdd', $cat->id);
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_object'] = Object::orderBy('id', 'asc')->pluck('name', 'id');

        return view('admin.where_go.index', $ar);
    }

    function postAdd(Request $request, $cat_id){
        $cat = SysDirectoryName::where('parent_id', 8)->where('id', $cat_id)->first();
        if (!$cat)
            abort(404);

        $object = Object::findOrFail($request->input('object_id'));

        if (ObjectMainOption::where('object_id', $object->id)->where('option_id', $cat->id)->count() > 0)
            return redirect()->back()->with('error', 'Данная организация уже в списке');

        DB::beginTransaction();

        $option = new ObjectMainOption();
        $option->object_id = $object->id;
        $option->option_id = $cat->id;
        $option->sys_key = $cat->sys_key;
        $option->save();

        DB::commit();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getDelete( $cat_id, $object_id){
        $cat = SysDirectoryName::where('parent_id', 8)->where('id', $cat_id)->first();
        if (!$cat)
            abort(404);

        $object = Object::findOrFail($object_id);
        ObjectMainOption::where('object_id', $object->id)->where('option_id', $cat->id)->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
