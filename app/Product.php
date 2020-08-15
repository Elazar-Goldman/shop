<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public static function getProductById($id){
        return self::findOrFail($id);
    }

        public static function store($request){
        $product = new self();
        
        $product->pro_name = $request->name;
        
        $product->slug = $request->slug;
        
        $product->pro_price =  $request->price;
        
        $product->pro_description =  $request->description;
        
          $product->category_id =  $request->category;
        
        $product->pro_img = $request->image->store('images/products', 'public');
        
        
        $product->save();
        
    }

    public static function getAll(){
        return self::orderBy('slug')->get();
    }


    public static function addToCart($id, $qty=1){
        
     $product =  self::findOrFail($id);
         
       \Cart::add(
        ['id' => $product->id,
      'name' => $product->pro_name,
      'qty' => $qty,
      'price' => $product->pro_price,
      'weight' => 0]);
    }

    public static function getProduct($cat, $pro) {
        $product = self::where('slug', $pro)->firstOrFail();
        $product_cat = $product->category->slug;
        
        abort_if($product_cat !== $cat, 404);
        return $product;
    }

}
