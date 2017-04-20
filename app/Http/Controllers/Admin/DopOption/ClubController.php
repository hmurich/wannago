<?php
namespace App\Http\Controllers\Admin\DopOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class ClubController extends DirectoryNameController{
    protected $title = 'Дополнительные свойства ночных клубов';
    protected $parent_id = 23;
    protected $action_class = 'Admin\DopOption\ClubController';

}
