<?php
namespace App\Http\Controllers\Admin\DopOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class BanketController extends DirectoryNameController{
    protected $title = 'Дополнительные свойства банкетных залов';
    protected $parent_id = 22;
    protected $action_class = 'Admin\DopOption\BanketController';

}
