<?php
namespace App\Http\Controllers\Admin\DopOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class CafeController extends DirectoryNameController{
    protected $title = 'Дополнительные свойства  кафе';
    protected $parent_id = 20;
    protected $action_class = 'Admin\DopOption\CafeController';

}
