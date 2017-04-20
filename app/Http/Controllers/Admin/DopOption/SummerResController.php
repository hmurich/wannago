<?php
namespace App\Http\Controllers\Admin\DopOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class SummerResController extends DirectoryNameController{
    protected $title = 'Дополнительные свойства летних площадок';
    protected $parent_id = 24;
    protected $action_class = 'Admin\DopOption\SummerResController';

}
