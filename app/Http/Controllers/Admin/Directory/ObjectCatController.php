<?php
namespace App\Http\Controllers\Admin\Directory;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class ObjectCatController extends DirectoryNameController{
    protected $title = 'Категории заведений';
    protected $parent_id = 3;
    protected $action_class = 'Admin\Directory\ObjectCatController';

}
