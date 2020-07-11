<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   public function products(){
        return $this->hasMany('App\Product');
    }
  public static function getCategory($slug){
   
 return self::where('slug', $slug)->firstOrFail();

  }


    
  public static function getCategories(){
   
 return self::orderBy('slug')->get();

  }
}



