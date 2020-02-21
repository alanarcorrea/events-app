<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fantasy_name' => [
                'required',
                'min:3',
                'max:150'
            ],
            'company_name' => [
                'required',
                'min:3',
                'max:150'
            ],
            'cnpj' => [
                'required',
                'size:14'
            ],
            'phone' => [
                'required',
                'max:15'
            ],
            'address' => [
                'required',
                'max:300'
            ],
            'city' => [
                'required'
            ],
            'state' => [
                'required'
            ],
        ];
    }
}