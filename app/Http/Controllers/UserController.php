<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserSignup;
use App\User;
use App\Http\Requests\UserLogin;

class UserController extends Controller
{
    public function processLogin(UserLogin $request){
        if(User::loginUser($request)){
            return redirect('shop');
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
  