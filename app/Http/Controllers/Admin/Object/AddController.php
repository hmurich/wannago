<?php
namespace App\Http\Controllers\Admin\Object;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\SysDirectoryName;
use App\Model\Company;
use App\Model\Object;

class EditController extends Controller{
    function getIndex ($type_id, $object){
        $cat = SysDirectoryName::where('parent_id', 3)->where('id', $type_id)->first();
        if (!$cat)
            abort(404);

        $ar = array();
        $ar['title'] = 'Форма добавления новой организации';
        $ar['cat'] = $cat;

        $ar['ar_company'] = Company::pluck('name', 'id');

        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('list', 'id');
        $ar['ar_avg_pice'] = SysDirectoryName::where('parent_id', 2)->pluck('list', 'id');
        $ar['ar_pub_type'] = SysDirectoryName::where('parent_id', 4)->pluck('list', 'id');
        $ar['ar_karaoke_type'] = SysDirectoryName::where('parent_id', 5)->pluck('list', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 6)->pluck('list', 'id');
        $ar['ar_music_type'] = SysDirectoryName::where('parent_id', 7)->pluck('list', 'id');

        $ar['ar_spec_option_pub'] = SysDirectoryName::where('parent_id', 9)->pluck('list', 'id');
        $ar['ar_spec_option_karaoke'] = SysDirectoryName::where('parent_id', 10)->pluck('list', 'id');
        $ar['ar_spec_option_kofe'] = SysDirectoryName::where('parent_id', 11)->pluck('list', 'id');
        $ar['ar_spec_option_cafe'] = SysDirectoryName::where('parent_id', 12)->pluck('list', 'id');
        $ar['ar_spec_option_restoran'] = SysDirectoryName::where('parent_id', 13)->pluck('list', 'id');
        $ar['ar_spec_option_banket'] = SysDirectoryName::where('parent_id', 14)->pluck('list', 'id');
        $ar['ar_spec_option_club'] = SysDirectoryName::where('parent_id', 15)->pluck('list', 'id');
        $ar['ar_spec_option_summer_res'] = SysDirectoryName::where('parent_id', 16)->pluck('list', 'id');

        $ar['ar_dop_option_pub'] = SysDirectoryName::where('parent_id', 17)->pluck('list', 'id');
        $ar['ar_dop_option_karaoke'] = SysDirectoryName::where('parent_id', 18)->pluck('list', 'id');
        $ar['ar_dop_option_cofe'] = SysDirectoryName::where('parent_id', 19)->pluck('list', 'id');
        $ar['ar_dop_option_kafe'] = SysDirectoryName::where('parent_id', 20)->pluck('list', 'id');
        $ar['ar_dop_option_restoran'] = SysDirectoryName::where('parent_id', 21)->pluck('list', 'id');
        $ar['ar_dop_option_banket'] = SysDirectoryName::where('parent_id', 22)->pluck('list', 'id');
        $ar['ar_dop_option_club'] = SysDirectoryName::where('parent_id', 23)->pluck('list', 'id');
        $ar['ar_dop_option_summer_res'] = SysDirectoryName::where('parent_id', 24)->pluck('list', 'id');

        return view('admin.object.add.index', $ar);
    }

    function postAdd(Request $request, $type_id){

    }
}
