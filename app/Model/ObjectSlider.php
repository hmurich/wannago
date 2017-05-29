<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ObjectSlider extends Model{
    protected $table = 'object_slider';
    public $timestamps = false;

    const IMAGE_W = 800;
    const IMAGE_H = 450;

}
