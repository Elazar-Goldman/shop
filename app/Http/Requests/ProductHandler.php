<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductHandler extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'name'=> 'Required|min:2|regex:/^[\d\w -]+$/',
            'slug'=>'Required|min:2|alpha_dash|unique:categories,slug',
            'image'=> 'Required|image',
            'category'=>'Required|integer|exists:categories,id',
            'price'=>'Required|numeric',
            'description'=>'Required|min:6',
        ];
    }
}
