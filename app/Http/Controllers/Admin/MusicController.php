<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class MusicController extends DirectoryNameController{
    protected $title = 'Музыка';
    protected $parent_id = 7;
    protected $action_class = 'Admin\MusicController';
    
}
