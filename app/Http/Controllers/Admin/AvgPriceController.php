<?php
namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class AvgPriceController extends DirectoryNameController{
    protected $title = 'Средний счет';
    protected $parent_id = 2;
    protected $action_class = 'Admin\AvgPriceController';
    
}
