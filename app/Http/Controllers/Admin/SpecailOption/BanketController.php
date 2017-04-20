<?php
namespace App\Http\Controllers\Admin\SpecailOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class BanketController extends DirectoryNameController{
    protected $title = 'Оссобености банкетных залов';
    protected $parent_id = 14;
    protected $action_class = 'Admin\SpecailOption\BanketController';

}
