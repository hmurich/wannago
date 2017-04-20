<?php
namespace App\Http\Controllers\Admin\SpecailOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class RestoranController extends DirectoryNameController{
    protected $title = 'Оссобености ресторана';
    protected $parent_id = 13;
    protected $action_class = 'Admin\SpecailOption\RestoranController';

}
