<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\Generators\ModelSnipet;

class Event extends Model{
    protected $table = 'events';

    function relObject(){
        return $this->belongsTo('App\Model\Object', 'object_id');
    }

    function getDateStrAttribute(){
        return ModelSnipet::modifyDateToStr($this->date_event);
    }

    function getTimeStrAttribute(){
        return ModelSnipet::formatDate($this->time_event, 'h:i');
    }

}
