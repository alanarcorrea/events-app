<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fantasy_name' => $this->fantasy_name,
            'company_name' => $this->company_name,
            'cnpj' => $this->cnpj,
            'phone' => $this->phone,
            'address' => $this->address,
            'cep' => $this->cep,
            'city' => $this->city,
            'state' => $this->state,
        ];
    }
}
