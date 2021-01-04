<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ShopController extends Controller
{
    
    
       public function displayProduct($cat, $pro){
      
      $data['product']= Product::getProduct($cat, $pro);
      return view('shop.product', $data);
     
  }
    
      public function displayCategoryLow($slug){
  $data['category']= Category::getProductsLow($slug);
      return view('shop.compare', $data);
  }
  
        public function displayCategoryHigh($slug){
  $data['category']= Category::getProductsHigh($slug);
      return view('shop.compare', $data);
  }



  public function displayCategory($slug){
      
      $data['category']= Category::getCategory($slug);  
      return view('shop.category', $data);
     
  }
    
    public function displayShop(){
      
      $data['categories']= Category::getCategories();
      return view('shop.shop',$data);
  }

  
}


