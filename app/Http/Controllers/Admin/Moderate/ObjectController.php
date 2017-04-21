<?php
namespace App\Http\Controllers\Admin\Moderate;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Object;

class ObjectController extends Controller{
    function getIndex(Request $request, $is_moderate = 1){
        $items = Object::where('is_moderate', $is_moderate)

        $ar = array();

        if ($is_moderate)
            $ar['title'] = 'Действующие организации';
        else
            $ar['title'] = 'Организации на модерации';

        $ar['items'] = $items->with('relUser', 'relStandartData')->orderBy('id', 'desc')->paginate(24);
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        return view('admin.moderate.object.index', $ar);
    }

    function getVip($object_id){

    }

    function getSpecial($object_id){

    }

    function getModerate($object_id){

    }

    function getNew($object_id){

    }

    function getDelete($object_id){

    }

}
