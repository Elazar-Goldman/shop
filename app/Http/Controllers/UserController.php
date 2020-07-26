<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserSignup;
use App\User;
use App\Http\Requests\UserLogin;

class UserController extends Controller
{
     public function logout(Request $request){
         $name = session('name');   
        $request->session()->flush();
        return redirect('shop')->with('status', 'bye bye'.$name);
        }
    
    public function processLogin(UserLogin $request){
        if(User::loginUser($request)){
              if(session('place-order-process')){
                  $request->session()->forget('place-order-process');
            return redirect('place-order');
        }
            return redirect('shop')->with('status', 'Welcome'. ucfirst(session('name')));
        }
        return redirect('login')->with('status-fail', 'Wrong email or password.');
    }

        public function displayLogin(){
        return view('user.login');
    }

        public function processSignup(UserSignup $request) {
        User::store($request);
        return redirect('login');
    }    
    
 public function displaySignup(){
     return view('user.signup');
 }
}
  