<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\Generators\ModelSnipet;

class ObjectScoreVote extends Model{
    protected $table = 'object_score_vote';

    function getCreatedAttribute(){
        return ModelSnipet::formatDate($this->created_at, 'd.m.Y');
    }
}
