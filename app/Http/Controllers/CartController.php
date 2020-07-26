<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
class CartController extends Controller

{
    public function placeOrder(){
        if(session('id')){
            if(\Cart::count()){
                Order::store();
                return redirect('shop')->with('status','Thank you for shopping your order is on its way');
                
            }
                return redirect('cart');
            
        }
        session(['place-order-process'=>true ]);
        
        return redirect('login')->with('status-fail', 'to complate you order please login. Not regestered yet? <a href="'.url('signup').'">click here </a>');
    }

    

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


