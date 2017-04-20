<?php
namespace App\Http\Controllers\Admin\Directory;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class WhereGoController extends DirectoryNameController{
    protected $title = 'Куда Сходить';
    protected $parent_id = 8;
    protected $action_class = 'Admin\Directory\WhereGoController';

}
