<?php
namespace App\Http\Controllers\Admin\Company;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\SysDirectoryName;
use App\Model\Company;

class ListController extends Controller{
    function getIndex(Request $request){
        $items = Company::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Владельца заведений';
        $ar['ar_input'] = $request->all();
        $ar['items'] = $items->with('relUser', 'relObjects')->orderBy('id', 'desc')->paginate(25);

        return view('admin.company.index', $ar);

    }

    function getDelete($id){
        DB::beginTransaction();

        $item = Company::findOrFail($id);
        $user = $item->relUser;
        $item->delete();
        $user->delete();

        DB::commit();
        return redirect()->back()->with('success', 'Удалено');
    }
}
