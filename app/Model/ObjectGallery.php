<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ObjectGallery extends Model{
    protected $table = 'object_gallery';
    public $timestamps = false;

    const IMAGE_W = 800;
    const IMAGE_H = 450;
}
