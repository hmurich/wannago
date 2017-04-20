<?php
namespace App\Http\Controllers\Admin\Directory;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class PubTypeController extends DirectoryNameController{
    protected $title = 'Типы пабов';
    protected $parent_id = 4;
    protected $action_class = 'Admin\Directory\PubTypeController';

}
