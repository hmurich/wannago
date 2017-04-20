<?php
namespace App\Http\Controllers\Admin\SpecailOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class CafeController extends DirectoryNameController{
    protected $title = 'Оссобености  кафе';
    protected $parent_id = 12;
    protected $action_class = 'Admin\SpecailOption\CafeController';
    
}
