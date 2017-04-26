<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model{
    protected $table = 'banners';

    static function getTwoEl(){
        $items = Banner::inRandomOrder()->take(2)->get();
        foreach ($items as $i){
            $i->view_count ++ ;
            $i->save();
        }

        return $items;
    }
}
