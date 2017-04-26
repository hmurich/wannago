<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Banner;
use App\Model\Generators\ModelSnipet;

class BannerController extends Controller{
    function getIndex (Request $request){
        $items = Banner::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Баннеры(реклама)';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);
        $ar['action'] = action('Admin\BannerController@postSave');

        return view('admin.banner.index', $ar);
    }

    function postSave(Request $request){
        $item = new Banner();
        $item->href = $request->input('href');

        if ($request->hasFile('image'))
            $item->image = ModelSnipet::setImage($request->file('image'), 'banners', 210, 265);
        $item->save();

        return redirect()->back()->with('success', 'Создано');
    }

    function getDelete(Request $request, $banner_id){
        $item = Banner::findOrFail($banner_id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
