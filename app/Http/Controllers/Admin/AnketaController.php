<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Anketa;
use App\Model\AnketePhoto;

class AnketaController extends Controller{
    function getIndex(){
        $items = Anketa::where('id', '>', 0);

        $ar = array();
        $ar['title'] = 'Анкеты';
        $ar['items'] = $items->orderBy('id', 'desc')->paginate(24);

        return view('admin.anketa.index', $ar);
    }

    function getShow($id){
        $el = Anketa::findOrFail($id);

        $ar = array();
        $ar['title'] = 'Просмотр анкеты';
        $ar['item'] = $el;
        $ar['photos'] = AnketePhoto::where('anketa_id', $el->id)->get();

        return view('admin.anketa.show', $ar);
    }
}
