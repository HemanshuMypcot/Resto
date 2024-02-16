<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRestoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:4|max:40',
            'email'=>'required|email|unique:restaurants',
            'address'=>'required|min:4|max:100',
            'file'=>'required|mimes:jpg,jpeg,png,webp'
        ];
    }
}
