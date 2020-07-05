<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class ShopController extends Controller
{
  public function displayShop(){
      
      $data['categories']= Category::getCategories();
      //return view('shop.shop',$data);
  }
}
