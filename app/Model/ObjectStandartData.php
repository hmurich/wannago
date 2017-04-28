<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ObjectStandartData extends Model{
    protected $table = 'object_standart_data';
    public $timestamps = false;

    function setNoteAttribute($value) {
		$this->attributes['note'] = $value;
        $this->note_clean = strip_tags($value);
  	}
}
