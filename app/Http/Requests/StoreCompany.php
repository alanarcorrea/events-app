<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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