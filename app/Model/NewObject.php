<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class NewObject extends Model{
    protected $table = 'new_object';

    function relCompany(){
        return $this->belongsTo('App\Model\Company', 'company_id');
    }

    static function getStatusAr(){
        return array(
            0 => 'В обработке',
            1 => 'Отказано',
            2 => 'Одобрено'
        );
    }

}
