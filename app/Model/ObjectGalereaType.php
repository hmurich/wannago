<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ObjectGalereaType extends Model{
    protected $table = 'object_galerea_type';

    function relPhotos(){
        return $this->hasMany('App\Model\ObjectGallery', 'type_id');
    }
}
