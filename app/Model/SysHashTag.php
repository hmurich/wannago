<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SysHashTag extends Model{
    protected $table = 'sys_hash_tags';

    static function checkForIsset($tag_text){
		$ar = explode(",", $tag_text);

		$insert = array();
		foreach ($ar as $name) {
			if (!SysHashTag::where('name', trim($name))->first()){
				$item = array();
				$item['name'] = $name;
				$item['created_at'] = date('Y-m-d h:i:s');
				$item['updated_at'] = date('Y-m-d h:i:s');

				$insert[] = $item;
			}
		}

		if (count($insert) > 0){
			SysHashTag::insert($insert);
		}
	}
}
