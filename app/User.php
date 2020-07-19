<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     public static function loginUser($request){
     $user = self::where('email', $request->email)->first();
     if(! $user || ! Hash::check($request->password, $user->password)){
         return false;
     }
    }
    
    public static function store($request){
        $user = new self();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 35;
        
        $user->save();
        
    }
   
}
