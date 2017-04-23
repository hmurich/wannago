<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class NewObject extends Model{
    protected $table = 'new_object';

    static function getStatusAr(){
        return array(
            0 => 'В обработке',
            1 => 'Отказано',
            2 => 'Создано'
        );
    }

}
