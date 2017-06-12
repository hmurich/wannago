<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\SysDirectoryName;
use App\Model\Generators\City;
use App\Model\Generators\ModelSnipet;
use App\Model\Anketa;
use App\Model\AnketePhoto;

class AnketaController extends Controller{
    function getIndex(Request $request){
        $city_id = City::getCityID();
        $city = SysDirectoryName::where('parent_id', 1)->where('id', $city_id)->first();
        if (!$city)
            abort(404);

        $ar = array();
        $ar['title'] = 'Анкета';

        $ar['city_id'] = $city_id;
        $ar['city'] = $city;
        $ar['ar_city'] = SysDirectoryName::where('parent_id', 1)->pluck('name', 'id');

        $ar['ar_object_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_special'] = SysDirectoryName::where('parent_id', 9)->pluck('name', 'id');
        $ar['ar_kitchen'] = SysDirectoryName::where('parent_id', 6)->pluck('name', 'id');
        $ar['ar_musik'] = SysDirectoryName::where('parent_id', 6)->pluck('name', 'id');

        return view('front.anketa.index', $ar);
    }

    function postIndex(Request $request){
        //echo '<pre>'; print_r($request->all()); echo '</pre>'; exit();
        $anketa = new Anketa();
        $anketa->phone                      = $request->input('phone');
        $anketa->kitchen_id                 = $request->input('kitchen_id');
        $anketa->name                       = $request->input('name');
        $anketa->address                    = $request->input('address');
        $anketa->fio                        = $request->input('fio');
        $anketa->cat_id                     = $request->input('cat_id');
        $anketa->email                      = $request->input('email');
        $anketa->number                     = $request->input('number');
        $anketa->avg_price                  = $request->input('avg_price');
        $anketa->work_day                   = $request->input('work_day');
        $anketa->work_time_from             = $request->input('work_time_from');
        $anketa->work_time_to               = $request->input('work_time_to');
        $anketa->work_time_full             = ($request->has('work_time_full') ? 1 : 0);
        $anketa->note_zal                   = $request->input('note_zal');
        $anketa->kredit_cart                = $request->input('kredit_cart');
        $anketa->park                       = $request->input('park');
        $anketa->children                   = $request->input('children');
        $anketa->musik                      = $request->input('musik');
        $anketa->ar_special                 = ($request->has('ar_specail') ? implode(",", $request->input('ar_specail')) : null);
        $anketa->description                = $request->input('description');
        $anketa->photo_service_day          = $request->input('photo_service_day');
        $anketa->photo_service_time_from    = $request->input('photo_service_time_from');
        $anketa->photo_service_time_to      = $request->input('photo_service_time_to');
        $anketa->photo_service_true         = ($request->has('photo_service_true') ? 1 : 0);
        $anketa->sale_title                 = $request->input('sale_title');
        $anketa->sale_date                  = $request->input('sale_date');
        $anketa->sale_note                  = $request->input('sale_note');
        $anketa->save();

        $data = $request->all();
        if (isset($data['ar_photo'])){
            foreach ($data['ar_photo'] as $k=>$v){
                if ($request->hasFile('ar_photo.'.$k)){
                    $image = new AnketePhoto();
                    $image->anketa_id = $anketa->id;
                    $image->photo = ModelSnipet::setImage($request->file('ar_photo.'.$k), 'anketa');
                    $image->save();
                    //echo 'asdfasdf <br/>';
                }

                //echo '111111 <br/>'; exit();
            }
        }

        return redirect()->back()->with('success', 'Сохранено');
    }
}
