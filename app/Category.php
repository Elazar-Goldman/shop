<?php

namespace App;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public static function deleteCategory($id){
        $category = self::findOrFail($id);
        Storage::disk('public')->delete($category->cat_img);
        $products = $category->products;
        foreach ($products as $product) {
            Product::deleteProduct($product->id);
        }
        
        self::destroy($id);
    }
   public function products(){
        return $this->hasMany('App\Product');
    }
    public static function updateCategory($id, $request){
        $category = self::findOrFail($id);
         $category->cat_name = $request->name;
        $category->slug = $request->slug;
        
        if($request->image){
        // First delete and then upload new
        Storage::disk('public')->delete($category->cat_img);    
        $category->cat_img = $request->image->store('images/categories', 'public');

        }
        
        $category->save();
    }

        public static function getCategoryById($id){
        return self::findOrFail($id);
    }


    public static function store($request){
        $category = new self();
        
        $category->cat_name = $request->name;
        
        $category->slug = $request->slug;
        
        $category->cat_img = $request->image->store('images/categories', 'public');
        
        
        $category->save();
        
    }
    
        public static function getProductsLow($slug){
        $data['category'] = self::where('slug', $slug)->firstOrFail(['id', 'slug']);
        $id = $data['category']['id'];
        $data['products'] = Product::getProductsLowCost($slug, $id);
        return $data;
    }
    
       public static function getProductsHigh($slug){
        $data['category'] = self::where('slug', $slug)->firstOrFail(['id', 'slug']);
        $id = $data['category']['id'];
        $data['products'] = Product::getProductsHighCost($slug, $id);
        return $data;
    }
    
    

    public static function getCategory($slug){
   
 return self::where('slug', $slug)->firstOrFail(['id', 'slug']);

  }


    
  public static function getCategories(){
   
 return self::orderBy('slug')->get();

  }
}



