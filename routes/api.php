<?php
use Illuminate\Http\Request;
use App\Model\SysDirectory;
use App\Model\SysDirectoryName;
use App\Model\Reserve;
use App\Model\Object;


Route::get('get-city-ar', function () {
    $elems = SysDirectoryName::where('parent_id', 1)->select('id', 'name')->orderBy('id', 'asc')->get()->toJson();
    echo $elems;
});

Route::get('get-ar-directory', function () {
    $elems = SysDirectory::select('id', 'name')->orderBy('id', 'asc')->get()->toJson();
    echo $elems;
});

Route::get('get-ar-directory-elem/{id?}', function ($id = 0) {
    $elems = SysDirectoryName::select('id', 'name');

    if ($id)
        $elems = $elems->where('parent_id', $id);

    $elems = $elems->orderBy('id', 'asc')->get()->toJson();
    echo $elems;
});

Route::get('get-ar-object', function ($id = 0) {
    $items = Object::where('id', '>', 0)->with('relMainOptions', 'relStandartData',
                                                'relDopOption', 'relTag', 'relLocation', 'relScore',
                                                'relSpecialOption', 'relUser')->get()->toJson();
    echo $items;
});

Route::get('get-object-news/{id}', function ($id) {
    $object = Object::findOrFail($id);
    $news = $object->relNews()->get()->toJson();

    echo $news;
});

Route::get('get-object-comment/{id}', function ($id) {
    $object = Object::findOrFail($id);
    $news = $object->relComment()->get()->toJson();

    echo $news;
});

Route::get('get-object-event/{id}', function ($id) {
    $object = Object::findOrFail($id);
    $news = $object->relEvent()->get()->toJson();

    echo $news;
});

Route::get('get-object-galerea/{id}', function ($id) {
    $object = Object::findOrFail($id);
    $news = $object->relGelerea()->get()->toJson();

    echo $news;
});

Route::post('post-add-reserver', function(Request $request){
    if (!$request->has('object_id') || !$request->has('name') || !$request->has('phone') || !$request->has('email') || !$request->has('enter_date'))
        abort(400);

    $object = Object::findOrFail($request->input('object_id'));

    $el = new Reserve;
    $el->object_id  = $object->id;
    $el->name       = $request->input('name');
    $el->phone      = $request->input('phone');
    $el->email	    = $request->input('email');
    $el->note       = $request->input('note');
    $el->enter_date = $request->input('enter_date');
    $el->enter_time = $request->input('enter_time');
    $el->save();

    echo '1';
});
