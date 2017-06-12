<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\Generators\ModelSnipet;

class News extends Model{
    protected $table = 'news';

    const IMAGE_W = 710;
    const IMAGE_H = 440;

    function relComments(){
        return $this->hasMany('App\Model\NewsComment', 'news_id');
    }

    function relObject(){
        return $this->belongsTo('App\Model\Object', 'object_id');
    }

    function getCreatedAttribute(){
        return ModelSnipet::formatDate($this->created_at, 'd.m.Y');
    }

    function getDateStrAttribute(){
        return ModelSnipet::modifyDateToStr($this->created_at);
    }
}
