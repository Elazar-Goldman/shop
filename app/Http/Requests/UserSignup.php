<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignup extends FormRequest
{

    public function rules()
    {
       return [
        'name'=>'Required|min:2|max:30',
        'email'=>'Required|Email|unique:users,email',
        'password'=>'Required|min:4|Confirmed',
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
