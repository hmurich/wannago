<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Page;

class PageController extends Controller{
    function getIndex (Request $request){
        $items = Page::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Страницы';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        return view('admin.page.index', $ar);
    }

    function getItem(Request $request, $id = 0){
        $item = Page::find($id);

        $ar = array();
        if (!$item){
            $ar['title'] = 'Добавление страницы';
            $ar['action'] = action('Admin\PageController@postItem');
        }
        else {
            $ar['title'] = 'Изменение страницы';
            $ar['action'] = action('Admin\PageController@postItem', $item->id);
            $ar['item'] = $item;
        }

        return view('admin.page.item', $ar);
    }

    function postItem(Request $request, $id = 0){
        $item = Page::find($id);
        if (!$item)
            $item = new Page();

        $item->sys_key = $request->input('sys_key');
        $item->title = $request->input('title');
        $item->note = $request->input('note');
        $item->save();

        return redirect()->action('Admin\PageController@getIndex')->with('success', 'Создано');
    }

    function getDelete(Request $request, $id){
        $item = Page::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Удалено');
    }
}
