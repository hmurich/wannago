<?php
namespace App\Http\Controllers\Admin\SpecailOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class SummerResController extends DirectoryNameController{
    protected $title = 'Оссобености летних площадок';
    protected $parent_id = 16;
    protected $action_class = 'Admin\SpecailOption\SummerResController';

}
