<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\SysHashTag;

class ObjectHashTag extends Model{
    protected $table = 'object_hash_tags';
    public $timestamps = false;

    function setNoteAttribute($text){
		$this->attributes['note'] = $text;

		SysHashTag::checkForIsset($text);
	}
}
