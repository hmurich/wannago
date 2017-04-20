<?php
namespace App\Http\Controllers\Admin\Directory;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class CityController extends DirectoryNameController{
    protected $title = 'Города';
    protected $parent_id = 1;
    protected $action_class = 'Admin\Directory\CityController';

}
