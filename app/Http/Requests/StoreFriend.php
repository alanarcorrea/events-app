<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFriend extends FormRequest
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
                'max:150'
            ],
            'rg' => [
                'required',
                'size:10'
            ],
            'user_id' => [
                'required',
                'integer',
                'exists:users,id'
            ],
        ];
    }
}