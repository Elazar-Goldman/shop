<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class CartController extends Controller

{
    public function deleteCart(){
        \Cart::destroy();
        return redirect('shop')->with('status', 'Your cart was deleted');;;
    }
    
    public function deleteItem($rowId){
        \Cart::remove($rowId);
        
        return redirect('cart')->with('status', 'The product was deleted');;
        
    }
    
    public function updateCart(Request $request){
        \Cart::update($request->rowId, $request->quantity);
        $data =[
            'cart_count'=>\Cart::count(),
            'cart_total'=>\Cart::total(), 
            'product_total'=>\Cart::get($request->rowId)->total(),
                
        ];
        return json_encode($data);
    }

    public function displayCart(){
             \Cart::setGlobalTax(0);
             $data['items'] =\Cart::content();
             $data['total'] =\Cart::total();
             return view('cart.cart', $data);
         }
  
     public function addToCartByQuantity(Request $request){
      Product::addToCart($request->id,(int) $request->quantity);
       return \Cart::count();
   }
    
   public function addToCart($id){
       Product::addToCart($id);
       return \Cart::count();
   }
}


