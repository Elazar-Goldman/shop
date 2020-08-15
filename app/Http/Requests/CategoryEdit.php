<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEdit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $id = request()->category;
        return [
          'name'=> 'Required|min:2|regex:/^[\d\w -]+$/',
            'slug'=>'Required|min:2|alpha_dash|unique:categories,slug,'.$id,
            'image'=> 'image'
            
        ];
    }
}
