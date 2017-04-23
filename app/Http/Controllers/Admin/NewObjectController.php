<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\NewObject;
use App\Model\SysDirectoryName;

class NewObjectController extends Controller{
    function getIndex (Request $request){
        $items = NewObject::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Заявки на новую организацию';
        $ar['items'] = $items->orderBy('id', 'desc')->with('relCompany')->paginate(24);
        $ar['ar_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_status'] = NewObject::getStatusAr();

        return view('admin.new_object.index', $ar);
    }

    function getActive(Request $request, $new_object_id, $status_id = 0){
        if (!in_array($status_id, array(0, 1, 2)))
            abort(404);

        $new_object = NewObject::findOrFail($new_object_id);
        $new_object->status_id = $status_id;
        $new_object->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getDelete($new_object_id){
        $new_object = NewObject::findOrFail($new_object_id);
        $new_object->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
