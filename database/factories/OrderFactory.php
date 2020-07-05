<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{
    Order,
    Restaurant,
    User
};
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => User::where('id', 3)->pluck('id')->random(),
        'restaurant_id' => Restaurant::pluck('id')->random(),
        'shipping_type' => random_int(0,1),
        'status' => $faker->boolean,
        'order_date' => $faker->date('Y-m-d'),
        'created_at' => Carbon::now(),
    ];
});
