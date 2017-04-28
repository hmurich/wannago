<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\Generators\ModelSnipet;

class News extends Model{
    protected $table = 'news';

    function relComments(){
        return $this->hasMany('App\Model\NewsComment', 'news_id');
    }

    function getCreatedAttribute(){
        return ModelSnipet::formatDate($this->created_at, 'd.m.Y');
    }
}
