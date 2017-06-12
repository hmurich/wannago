<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ObjectSlider extends Model{
    protected $table = 'object_slider';
    public $timestamps = false;

    const IMAGE_W = 710;
    const IMAGE_H = 440;
	
	const IMAGE_SMALL_W = 360;
    const IMAGE_SMALL_H = 223;
	
	function getSmallImageAttribute(){
		$img = $this->image;
		$img = explode(".", $img);
		$img = $img[0].'_small.'.$img[1];
		
		return $img;
	}
}
