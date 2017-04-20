<?php
namespace App\Http\Controllers\Admin\DopOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class PubController extends DirectoryNameController{
    protected $title = 'Дополнительные свойства пабов';
    protected $parent_id = 17;
    protected $action_class = 'Admin\DopOption\PubController';

}
