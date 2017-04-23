<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Model\NewObject;
use App\Model\Company;
use App\Model\SysDirectoryName;
use Illuminate\Http\Request;

class NewObjectController extends Controller{
    function getIndex (Request $request){
        $user = $request->user();
        $company = Company::where('user_id', $user->id)->first();
        if (!$company)
            abort(404);

        $items = NewObject::where('company_id', $company->id);

        $ar = array();
        $ar['title'] = 'Заявки на новую организацию';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);
        $ar['ar_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_status'] = NewObject::getStatusAr();

        return view('company.new_object.index', $ar);
    }

    function getItem(Request $request){
        $user = $request->user();
        $company = Company::where('user_id', $user->id)->first();
        if (!$company)
            abort(404);

        $ar = array();
        $ar['title'] = 'Подать заявку на новую организацию';
        $ar['action'] = action('Company\NewObjectController@postItem');
        $ar['company'] = $company;
        $ar['user'] = $user;

        $ar['ar_type'] = SysDirectoryName::where('parent_id', 3)->pluck('name', 'id');
        $ar['ar_status'] = NewObject::getStatusAr();

        return view('company.new_object.item', $ar);
    }

    function postItem(Request $request){
        $user = $request->user();
        $company = Company::where('user_id', $user->id)->first();
        if (!$company)
            abort(404);

        $item = new NewObject();
        $item->company_id = $company->id;
        $item->status_id = 0;
        $item->cat_id = $request->input('cat_id');
        $item->fio = $request->input('fio');
        $item->phone = $request->input('phone');
        $item->email = $request->input('email');
        $item->name = $request->input('name');
        $item->save();

        return redirect()->action('Company\NewObjectController@getIndex')->with('info', 'Ваша заявка на новую организацию принята. В лижайшее время с Вами свяжеться наш сотрудник.');
    }
}
