<?php
namespace App\Http\Controllers\Admin\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

use App\Model\SysDirectoryName;
use App\Model\Company;
use App\User;

use App\Model\MailSend;

class EditController extends Controller{
    function getIndex(Request $request, $id = 0){
        $item = Company::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление владельца';
            $ar['action'] = action('Admin\Company\EditController@postSave');
        }
        else {
            $ar['title'] = 'Изменение владельца';
            $ar['action'] = action('Admin\Company\EditController@postSave', $item->id);
            $ar['item'] = $item;
        }

        return view('admin.company.item', $ar);
    }

    function postSave(Request $request, $id = 0){
        if ($request->has('email') && User::where('email', $request->input('email'))->count())
            return redirect()->back()->with('error', 'Email уже существует');

        DB::beginTransaction();

        $item = Company::find($id);
        if (!$item){
            $user = new User();
            $user->type_id = 3;
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            $item = new Company();
            $item->user_id = $user->id;

            $text = '<p>Ваш пароль - '.$request->input('password').'</p>';
            $text .= '<p>Ваше логин - '.$user->email.'</p>';

            MailSend::send($user->email, 'Ваш пароль для входа в weekends.kz', $text);
        }

        $item->name =  $request->input('name');
        $item->phone =  $request->input('phone');
        $item->address =  $request->input('address');
        $item->note = $request->input('note');
        $item->save();

        DB::commit();

        return redirect()->action('Admin\Company\ListController@getIndex')->with('success', 'Сохранено');
    }

}
