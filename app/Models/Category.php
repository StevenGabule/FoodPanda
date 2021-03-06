<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function food()
    {
        return $this->belongsTo(Food::class, 'category_id');
    }
}
