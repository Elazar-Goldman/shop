<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignup extends FormRequest
{

    public function rules(){
   $unique = ($this-> user) ? ','.$this->user: '';
   $requred = ($this->user)? '': 'required|min:4|';
    
       return [
        'name'=>'Required|min:2|max:30',
        'email'=>'Required|Email|unique:users,email'. $unique,
        'password'=>$requred.'Confirmed',
        'role'=> 'sometimes|integer|exists:roles,id'
             
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'A name is required',
        'name.min' => 'The name must be at least two charters',
    ];
}
}
