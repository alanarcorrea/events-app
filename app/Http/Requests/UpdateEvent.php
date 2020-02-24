<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvent extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'min:3',
                'max:150'
            ],
            'description' => [
                'max:1500'
            ],
            'date' => [
                'date'
            ],
            'hour' => [
                'numeric'
            ],
            'place' => [
                'max:100'
            ],
            'confirmation_deadline' => [
                'date'
            ],
            'minimun_people' => [
                'numeric'
            ],
        ];
    }
}