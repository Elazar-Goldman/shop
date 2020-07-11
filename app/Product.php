<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public static function getProduct($cat, $pro) {
        $product = self::where('slug', $pro)->firstOrFail();
        $product_cat = $product->category->slug;
        
        abort_if($product_cat !== $cat, 404);
        return $product;
    }

}