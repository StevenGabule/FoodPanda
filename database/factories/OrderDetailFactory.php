<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\{
    Food,
    Order,
    OrderDetail
};

$factory->define(OrderDetail::class, function () {
    return [
        'order_id' => Order::pluck('id')->random(),
        'food_id' => Food::pluck('id')->random(),
        'quantity' => mt_rand(5,10),
        'created_at' => Carbon::now()
    ];
});
