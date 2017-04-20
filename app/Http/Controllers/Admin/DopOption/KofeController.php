<?php
namespace App\Http\Controllers\Admin\DopOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class KofeController extends DirectoryNameController{
    protected $title = 'Дополнительные свойства кофейни';
    protected $parent_id = 19;
    protected $action_class = 'Admin\DopOption\KofeController';

}
