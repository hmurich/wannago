<?php
namespace App\Http\Controllers\Admin\Object;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\SysDirectory;
use App\Model\SysDirectoryName;
use App\Model\Company;
use App\Model\Object;

use App\Model\ObjectStandartData;
use App\Model\ObjectSpecialOption;
use App\Model\ObjectScore;
use App\Model\ObjectMainOption;
use App\Model\ObjectLocation;
use App\Model\ObjectHashTag;
use App\Model\ObjectDopOption;

class EditController extends Controller{
    function getIndex ($object_id){
        $object = Object::findOrFail($object_id);

        $cat = SysDirectoryName::where('parent_id', 3)->where('id', $object->cat_id)->first();
        if (!$cat)
            abort(404);

        $ar = array();
        $ar['title'] = 'Изменение "'.$object->name.'"';
        $ar['cat'] = $cat;
        $ar['action'] = action('Admin\Object\EditController@postSave', $object->id);

        $ar['ar_company'] = Company::pluck('name', 'id');

        $ar['object'] = $object;
        $ar['standart_data'] = ObjectStandartData::where('object_id', $object->id)->first();
        $ar['main_option'] = ObjectMainOption::where('object_id', $object->id)->pluck('option_id');
        $ar['dop_option'] = ObjectDopOption::where('object_id', $object->id)->pluck('option_value', 'option_id');
        $ar['special_option'] = ObjectSpecialOption::where('object_id', $object->id)->pluck('option_id');
        $ar['location'] = ObjectLocation::where('object_id', $object->id)->first();
        $ar['tag'] = ObjectHashTag::where('object_id', $object->id)->first();

        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');
        $ar['ar_avg_pice'] = SysDirectoryName::where('parent_id', 2)->pluck('name', 'id');
        $ar['ar_pub_type'] = SysDirectoryName::where('parent_id', 4)->pluck('name', 'id');
        $ar['ar_karaoke_type'] = SysDirectoryName::where('parent_id', 5)->pluck('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 6)->pluck('name', 'id');
        $ar['ar_music_type'] = SysDirectoryName::where('parent_id', 7)->pluck('name', 'id');

        $ar['ar_spec_option'] = $cat->getSpecialOption();
        $ar['ar_dop_option'] = $cat->getDopOption();

        return view('admin.object.edit', $ar);
    }

    function postSave(Request $request, $object_id){
        $cat = SysDirectoryName::where('parent_id', 3)->where('id', $type_id)->first();
        if (!$cat)
            abort(404);

        $company = Company::findOrFail($request->input('company_id'));

        //echo '<pre>'; print_r($request->all()); echo '</pre>'; exit();
        DB::beginTransaction();

        // save object
        $object = new Object();
        $object->cat_id         = $cat->id;
        $object->user_id        = $company->user_id;
        $object->company_id     = $company->id;
        $object->view_total     = 0;
        $object->is_moderate    = 1;
        $object->name           = $request->input('name');
        $object->city_id        = $request->input('city_id');
        $object->save();

        //save standart_data
        $standart_data = new ObjectStandartData();
        $standart_data->object_id       = $object->id;
        $standart_data->address         = $request->input('address');
        $standart_data->phone           = $request->input('phone');
        $standart_data->note            = $request->input('note');
        $standart_data->work_time       = $request->input('work_time');
        $standart_data->avg_price_id    = $request->input('avg_price_id');
        if ($request->has('price_for_hout'))
            $standart_data->price_for_hout  = $request->input('price_for_hout');
        $standart_data->save();

        //save main option
        if ($request->has('main_option') && count($request->input('main_option')) > 0){
            $main_options = SysDirectoryName::whereIn('id', $request->input('main_option'))->get();
            foreach ($main_options as $o){
                $main_option = new ObjectMainOption();
                $main_option->object_id     = $object->id;
                $main_option->option_id     = $o->id;
                $main_option->sys_key       = $o->sys_key;
                $main_option->name          = $o->name;
                $main_option->save();
            }
        }

        //save dop_option
        if ($request->has('dop_option') && count($request->input('dop_option')) > 0){
            $dop_option_values = $request->input('dop_option');
            $dop_options = SysDirectoryName::whereIn('id', array_keys($dop_option_values))->get();

            foreach ($dop_options as $o){
                $dop_option = new ObjectDopOption();
                $dop_option->object_id      = $object->id;
                $dop_option->option_id      = $o->id;
                $dop_option->sys_key        = $o->sys_key;
                $dop_option->option_name    = $o->name;
                $dop_option->option_value   = $dop_option_values[$o->id];
                $dop_option->save();
            }
        }

        //save specail_option
        if ($request->has('specail_option') && count($request->input('specail_option')) > 0){
            $specail_options = SysDirectoryName::whereIn('id', $request->input('specail_option'))->get();
            foreach ($specail_options as $o) {
                $special_option = new ObjectSpecialOption();
                $special_option->object_id  = $object->id;
                $special_option->option_id  = $o->id;
                $special_option->sys_key    = $o->sys_key;
                $special_option->name       = $o->name;
                $special_option->save();
            }
        }

        // save score
        $score = new ObjectScore();
        $score->object_id = $object->id;
        $score->save();

        //score location
        $location = new ObjectLocation();
        $location->object_id = $object->id;
        $location->lng       = $request->input('lng');
        $location->lat       = $request->input('lat');
        $location->save();

        //hash tag
        $tag = new ObjectHashTag();
        $tag->object_id = $object->id;
        $tag->note      = $request->input('tags');
        $tag->save();

        DB::commit();

        return redirect()->back()->with('success', 'Сохранено');
    }
}
