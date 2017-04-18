<?php
use Illuminate\Http\Request;
use App\Model\SysDirectory;
use App\Model\SysDirectoryName;

Route::get('/', function () {
    $ar = SysDirectory::pluck('name', 'id');
    echo '<pre>'; print_r($ar); echo '</pre>';
    json_encode($ar);
});


Route::get('get-city-ar', function () {
    $elems = SysDirectoryName::where('directory_id', 1)->select('id', 'name')->orderBy('id', 'asc')->get()->toJson();
    echo $elems;
});
