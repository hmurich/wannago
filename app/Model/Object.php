<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\Generators\ModelSnipet;

class Object extends Model{
    protected $table = 'objetcs';

    function setNameAttribute($value) {
		$this->attributes['name'] = $value;
        if (!$this->alias){
            $this->alias = rand(100000, 999999).'-'.ModelSnipet::translitString($value);
        }
  	}

    function relNews(){
        return $this->hasMany('App\Model\News', 'object_id');
    }

    function relComment(){
        return $this->hasMany('App\Model\Comment', 'object_id');
    }

    function relEvent(){
        return $this->hasMany('App\Model\Event', 'object_id');
    }

    function relGelerea(){
        return $this->hasMany('App\Model\ObjectGallery', 'object_id');
    }

    function relSlider(){
        return $this->hasMany('App\Model\ObjectSlider', 'object_id');
    }

    function relCat(){
        return $this->belongsTo('App\Model\SysDirectoryName', 'cat_id');
    }

    function relMainOptions(){
        return $this->hasMany('App\Model\ObjectMainOption', 'object_id');
    }

    function relStandartData(){
        return $this->hasOne('App\Model\ObjectStandartData', 'object_id');
    }

    function relDopOption(){
        return $this->hasMany('App\Model\ObjectDopOption', 'object_id');
    }

    function relTag(){
        return $this->hasOne('App\Model\ObjectHashTag', 'object_id');
    }

    function relLocation(){
        return $this->hasOne('App\Model\ObjectLocation', 'object_id');
    }

    function relScore(){
        return $this->hasOne('App\Model\ObjectScore', 'object_id');
    }

    function relSpecialOption(){
        return $this->hasMany('App\Model\ObjectSpecialOption', 'object_id');
    }

    function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function getRaitingViewAttribute(){
        return round($this->raiting, 2);
    }

    function getRaitingFullRoundAttribute(){
        return round($this->raiting, 0);
    }
}
