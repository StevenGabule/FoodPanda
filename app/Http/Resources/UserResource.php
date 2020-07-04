<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_dates' => [
                'created_at_humans' => $this->created_at->diffForHumans(),
                'created_at' => $this->created_at,
            ],
        ];
    }
}
