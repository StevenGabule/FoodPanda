<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Carbon\Carbon;
use App\Models\{
    Category,
    Food,
    Restaurant
};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Food::class, function (Faker $faker) {
    $name = Str::substr($faker->text, 0, 10);
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'short_description' => $faker->text,
        'description' => $faker->text,
        'price' => $faker->randomFloat(2, 200, 3000),
        'availability' => $faker->boolean,
        'status' => $faker->boolean,
        'restaurant_id' => Restaurant::pluck('id')->random(),
        'category_id' => Category::pluck('id')->random(),
        'created_at' => Carbon::now(),
    ];
});
