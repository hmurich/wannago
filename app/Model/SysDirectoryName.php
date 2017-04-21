<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SysDirectoryName extends Model{
    protected $table = 'sys_directory_names';

    function getDopOption(){
        $ar_dop_option = false;
        if ($this->id == 9) // Пабы и бары
            $ar_dop_option = SysDirectoryName::where('parent_id', 17)->pluck('name', 'id');
        else if ($this->id == 23) //Караоке
            $ar_dop_option = SysDirectoryName::where('parent_id', 18)->pluck('name', 'id');
        else if ($this->id == 24) //Кофейни
            $ar_dop_option = SysDirectoryName::where('parent_id', 19)->pluck('name', 'id');
        else if ($this->id == 25) //Кафе
            $ar_dop_option = SysDirectoryName::where('parent_id', 20)->pluck('name', 'id');
        else if ($this->id == 26) //Рестораны
            $ar_dop_option = SysDirectoryName::where('parent_id', 21)->pluck('name', 'id');
        else if ($this->id == 27) //Банкетные залы
            $ar_dop_option = SysDirectoryName::where('parent_id', 22)->pluck('name', 'id');
        else if ($this->id == 28) //Ночные клубы
            $ar_dop_option = SysDirectoryName::where('parent_id', 23)->pluck('name', 'id');
        else if ($this->id == 29) //Летние площадки
            $ar_dop_option = SysDirectoryName::where('parent_id', 24)->pluck('name', 'id');

        return $ar_dop_option;
    }

    function getSpecialOption(){
        $ar_spec_option = false;
        if ($this->id == 9) // Пабы и бары
            $ar_spec_option = SysDirectoryName::where('parent_id', 9)->pluck('name', 'id');
        else if ($this->id == 23) //Караоке
            $ar_spec_option = SysDirectoryName::where('parent_id', 10)->pluck('name', 'id');
        else if ($this->id == 24) //Кофейни
            $ar_spec_option = SysDirectoryName::where('parent_id', 11)->pluck('name', 'id');
        else if ($this->id == 25) //Кафе
            $ar_spec_option = SysDirectoryName::where('parent_id', 12)->pluck('name', 'id');
        else if ($this->id == 26) //Рестораны
            $ar_spec_option = SysDirectoryName::where('parent_id', 13)->pluck('name', 'id');
        else if ($this->id == 27) //Банкетные залы
            $ar_spec_option = SysDirectoryName::where('parent_id', 14)->pluck('name', 'id');
        else if ($this->id == 28) //Ночные клубы
            $ar_spec_option = SysDirectoryName::where('parent_id', 15)->pluck('name', 'id');
        else if ($this->id == 29) //Летние площадки
            $ar_spec_option = SysDirectoryName::where('parent_id', 16)->pluck('name', 'id');

        return $ar_spec_option;
    }
}
