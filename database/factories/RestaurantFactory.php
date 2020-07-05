<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Restaurant::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'user_id' => 1,
        'name' => $name,
        'slug' => Str::slug($name),
        'short_description' => $faker->text,
        'description' => $faker->text,
        'opening_day' => 0,
        'closing_day' => 6,
        'opening_time' => $faker->time(),
        'closing_time' => $faker->time(),
        'address' => $faker->address,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'status' => $faker->boolean,
        'owner' => $faker->name,
        'business_email' => $faker->unique()->safeEmail,
        'contact_person' => $faker->lastName,
        'contact_number' => $faker->phoneNumber,
        'telephone_number' => $faker->phoneNumber,
        'date_established' => $faker->date(),
        'created_at' => Carbon::now()
    ];
});
