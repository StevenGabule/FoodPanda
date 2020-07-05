<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestaurantsResource;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('status', true)->paginate(16);
        return RestaurantsResource::collection($restaurant);
    }

    public function showRestaurant($slug) {
		$restaurant = Restaurant::whereSlug($slug)->get();
		return RestaurantsResource::collection($restaurant);
	}
}
