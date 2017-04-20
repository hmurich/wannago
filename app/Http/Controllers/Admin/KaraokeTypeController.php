<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class KaraokeTypeController extends DirectoryNameController{
    protected $title = 'Типы размешения караоке';
    protected $parent_id = 5;
    protected $action_class = 'Admin\KaraokeTypeController';

}
