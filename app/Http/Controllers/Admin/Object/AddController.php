<?php
namespace App\Http\Controllers\Admin\Object;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\SysDirectory;
use App\Model\SysDirectoryName;
use App\Model\Company;
use App\Model\Object;

class AddController extends Controller{
    function getIndex ($type_id){
        $cat = SysDirectoryName::where('parent_id', 3)->where('id', $type_id)->first();
        if (!$cat)
            abort(404);

        $ar = array();
        $ar['title'] = 'Форма новой организации в "'.$cat->name.'"';
        $ar['cat'] = $cat;
        $ar['action'] = action('Admin\Object\AddController@postSave', $type_id);

        $ar['ar_company'] = Company::pluck('name', 'id');

        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_avg_pice'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');
        $ar['ar_pub_type'] = SysDirectoryName::where('parent_id', 4)->pluck('name', 'id');
        $ar['ar_karaoke_type'] = SysDirectoryName::where('parent_id', 5)->pluck('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 6)->pluck('name', 'id');
        $ar['ar_music_type'] = SysDirectoryName::where('parent_id', 7)->pluck('name', 'id');

        $ar['ar_spec_option'] = $cat->getSpecialOption();
        $ar['ar_dop_option'] = $cat->getDopOption();

        return view('admin.object.add', $ar);
    }

    function postSave(Request $request, $type_id){
        
    }
}
