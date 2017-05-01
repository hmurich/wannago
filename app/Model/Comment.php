<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\Generators\ModelSnipet;

class Comment extends Model{
    protected $table = 'comments';

    function getDateStrAttribute(){
        return ModelSnipet::modifyDateToStr($this->created_at).' '.ModelSnipet::formatDate( $this->created_at, 'Y');
    }
}
