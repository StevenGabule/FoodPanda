<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class RestaurantsResource extends JsonResource
{
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => Str::substr($this->short_description, 0, 30) . '...',
            'avatar' => $this->avatar,
            'count' => $this->foods()->count(),
            'foods' => FoodsResource::collection($this->foods),
        ];
    }
}
