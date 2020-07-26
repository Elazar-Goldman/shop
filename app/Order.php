<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function getAll(){
        
        return self::orderBy('created_at','desc')->get();
  
    }
    public static function store(){
      $order = new self();
      $order->user_id = session('id');
      $order->order_list = \Cart::content()->toJson();
      
      $order->save();
      \Cart::destroy();
  }
}
