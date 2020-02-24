<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvent extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:3',
                'max:150'
            ],
            'description' => [
                'required',
                'max:1500'
            ],
            'date' => [
                'required',
                'date'
            ],
            'hour' => [
                'required'
            ],
            'place' => [
                'required',
                'max:100'
            ],
            'address' => [
                'required',
                'max:200'
            ],
            'confirmation_deadline' => [
                'required',
                'date'
            ],
            'minimum_people' => [
                'required',
                'numeric'
            ],
        ];
    }
}