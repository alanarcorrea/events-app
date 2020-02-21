<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompany extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fantasy_name' => [
                'min:3',
                'max:150'
            ],
            'company_name' => [
                'min:3',
                'max:150'
            ],
            'cnpj' => [
                'size:14'
            ],
            'phone' => [
                'max:15'
            ],
            'address' => [
                'max:300'
            ],
        ];
    }
}