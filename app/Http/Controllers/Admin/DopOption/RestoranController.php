<?php
namespace App\Http\Controllers\Admin\DopOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class RestoranController extends DirectoryNameController{
    protected $title = 'Дополнительные свойства ресторана';
    protected $parent_id = 21;
    protected $action_class = 'Admin\DopOption\RestoranController';

}
