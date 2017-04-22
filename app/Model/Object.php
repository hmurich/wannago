<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Object extends Model{
    protected $table = 'objetcs';

    function relMainOptions(){
        return $this->hasMany('App\Model\ObjectMainOption', 'object_id');
    }

    function relStandartData(){
        return $this->hasOne('App\Model\ObjectStandartData', 'object_id');
    }

    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function getRaitingViewAttribute(){
        return round($this->raiting, 2);
    }
}
