<?php
namespace App\Http\Controllers\Admin\SpecailOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class KofeController extends DirectoryNameController{
    protected $title = 'Оссобености кофейни';
    protected $parent_id = 11;
    protected $action_class = 'Admin\SpecailOption\KofeController';
    
}
