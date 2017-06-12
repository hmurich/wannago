<?php
namespace App\Http\Controllers\Admin\Object;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Object;
use App\Model\SysDirectoryName;
use Auth;

class ListController extends Controller{
    function getAuth($user_id){
        Auth::loginUsingId($user_id);

        return redirect()->action('Company\IndexController@getIndex');
    }

    function getIndex(Request $request, $type_id){
        $cat = SysDirectoryName::where('parent_id', 3)->where('id', $type_id)->first();
        if (!$cat)
            abort(404);

        $items = Object::where('cat_id', $cat->id);

        $ar = array();

        $ar['title'] = 'Список организаций в "'.$cat->name.'"';
        $ar['items'] = $items->with('relUser', 'relStandartData')->orderBy('id', 'desc')->paginate(24);
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        return view('admin.object.list', $ar);
    }

    function getSlide(Request $request, $object_id){
        $object = Object::findOrFail($object_id);
		if ($object->is_slide){
			$object->is_slide = 0;
			$object->save();

			return redirect()->back()->with('success', 'Сохранено');
		}
		
        $ar = array();
        $ar['title'] = 'Указать организацию на слайде';
		$ar['action'] = action('Admin\Object\ListController@postSlide', $object->id);
		$ar['item'] = $object;
		
		
		return view('admin.object.slide', $ar);
    }
	
	function postSlide(Request $request, $object_id){
		$object = Object::findOrFail($object_id);
		$object->is_slide = 1;
		$object->slide_css = $request->input('slide_css');
		$object->save();
		
		return redirect()->action('Admin\Object\ListController@getIndex', $object->cat_id)->with('success', 'Сохранено');
	}

    function getRecomeded($object_id){
        $object = Object::findOrFail($object_id);
        $object->is_recomded = ($object->is_recomded ? 0 : 1);
        $object->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getVip($object_id){
        $object = Object::findOrFail($object_id);
        $object->is_vip = ($object->is_vip ? 0 : 1);
        $object->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getSpecial($object_id){
        $object = Object::findOrFail($object_id);
        $object->is_special = ($object->is_special ? 0 : 1);
        $object->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getModerate($object_id){
        $object = Object::findOrFail($object_id);
        $object->is_moderate = ($object->is_moderate ? 0 : 1);
        $object->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getNew($object_id){
        $object = Object::findOrFail($object_id);
        $object->is_new = ($object->is_new ? 0 : 1);
        $object->save();

        return redirect()->back()->with('success', 'Сохранено');
    }

    function getDelete($object_id){
        $object = Object::findOrFail($object_id);
        $object->delete();

        return redirect()->back()->with('success', 'Удалено');
    }

}
