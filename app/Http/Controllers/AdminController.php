<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AdminController extends Controller
{
    public function displayOrders(){
        $data['orders'] = Order::getAll();
        return view('admin.orders' ,$data);
    }

        public function displayDashborad(){
        return view('admin.main');
    }
}
