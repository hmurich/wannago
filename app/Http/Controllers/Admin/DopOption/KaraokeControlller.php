<?php
namespace App\Http\Controllers\Admin\DopOption;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Generators\DirectoryNameController;

use Illuminate\Http\Request;
use App\Model\SysDirectoryName;

class KaraokeControlller extends DirectoryNameController{
    protected $title = 'Дополнительные свойства караоке';
    protected $parent_id = 18;
    protected $action_class = 'Admin\DopOption\KaraokeControlller';

}