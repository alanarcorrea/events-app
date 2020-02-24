<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFriend extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:150'
            ],
            'rg' => [
                'size:10'
            ],
            'user_id' => [
                'integer',
                'exists:users,id'
            ],
        ];
    }
}