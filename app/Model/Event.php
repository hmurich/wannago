<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Event extends Model{
    protected $table = 'events';

    function relObject(){
        return $this->belongsTo('App\Model\Object', 'object_id');
    }

}
