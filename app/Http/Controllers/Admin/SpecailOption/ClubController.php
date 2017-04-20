<?php
namespace App\Http\Controllers\Admin\SpecailOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class ClubController extends DirectoryNameController{
    protected $title = 'Оссобености ночных клубов';
    protected $parent_id = 15;
    protected $action_class = 'Admin\SpecailOption\ClubController';

}
