<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{
    Food,
    Restaurant,
    TempOrderDetail,
    User
};

$factory->define(TempOrderDetail::class, function () {
    return [
        'user_id' => User::where('id', 3)->pluck('id')->random(),
        'restaurant_id' => Restaurant::pluck('id')->random(),
        'food_id' => Food::pluck('id')->random(),
        'quantity' => mt_rand(5,10),
    ];
});
