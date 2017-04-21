<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Company extends Model{
    protected $table = 'company';

    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function relObjects(){
        return $this->hasMany('App\Model\Object', 'company_id');
    }

}
