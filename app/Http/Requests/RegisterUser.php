<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:100'
            ],
            'rg' => [
                'required',
                'size:10'
            ],
            'phone' => [
                'required',
                'max:15'
            ],
            'email' => [
                'required',
                'email'
            ],
            'password' => [
                'required',
                'min:8'
            ],
            'company_id' => [
                'required',
                'numeric',
                'exists:companies,id'
            ],
        ];
    }
}