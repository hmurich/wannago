<?php
namespace App\Http\Controllers\Admin\SpecailOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class KaraokeControlller extends DirectoryNameController{
    protected $title = 'Оссобености караоке';
    protected $parent_id = 10;
    protected $action_class = 'Admin\SpecailOption\KaraokeControlller';

}
