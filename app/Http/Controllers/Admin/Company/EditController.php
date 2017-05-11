<?php
namespace App\Http\Controllers\Admin\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

use App\Model\SysDirectoryName;
use App\Model\Company;
use App\User;

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
        }

        $item->name =  $request->input('name');
        $item->phone =  $request->input('phone');
        $item->address =  $request->input('address');
        $item->note = $request->input('note');
        $item->save();

        DB::commit();

        return redirect()->action('Admin\Company\ListController@getIndex')->with('success', 'Сохранено');
    }

    function getPassword (Request $request, $id){
        $item = Company::findOrFail($id);
        $user = User::findOrFail($item->user_id);

        $ar = array();
        $ar['title'] = 'Изменение логина пароля';
        $ar['action'] = action('Admin\Company\EditController@postPassword', $item->id);
        $ar['item'] = $item;
        $ar['user'] = $user;

        return view('admin.moderator.password', $ar);
    }

    function postPassword(Request $request, $id){
        $item = Company::findOrFail($id);
        $user = User::findOrFail($item->user_id);

        if (User::where('email', $request->input('email'))->where('id', '<>', $user->id)->count() > 0)
            return redirect()->back()->with('error', 'Email уже существует');

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->action('Admin\Company\ListController@getIndex')->with('success', 'Сохранено');
    }

}
