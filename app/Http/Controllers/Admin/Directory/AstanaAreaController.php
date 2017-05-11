<?php
namespace App\Http\Controllers\Admin\Directory;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class AstanaAreaController extends DirectoryNameController{
    protected $title = 'Районы Астаны';
    protected $parent_id = 25;
    protected $action_class = 'Admin\Directory\AstanaAreaController';

}
