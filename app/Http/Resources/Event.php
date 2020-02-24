<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date, 
            'hour' => $this->hour,
            'place' => $this->place,
            'confirmation_deadline' => $this->confirmation_deadline,
            'minimun_people' => $this->minimun_people,
            'status' => $this->status, 
        ];
    }
}