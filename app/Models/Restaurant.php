<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates  = ['deleted_at'];
	
	
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
