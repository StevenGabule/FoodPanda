<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'avatar' => $this->avatar,
            'category_id' => $this->category_id,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'price' => number_format($this->price, 2),
            'category' => $this->category->name
        ];
    }
}
