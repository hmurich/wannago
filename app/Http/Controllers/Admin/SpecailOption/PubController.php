<?php
namespace App\Http\Controllers\Admin\SpecailOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class PubController extends DirectoryNameController{
    protected $title = 'Оссобености пабов';
    protected $parent_id = 9;
    protected $action_class = 'Admin\SpecailOption\PubController';

}
