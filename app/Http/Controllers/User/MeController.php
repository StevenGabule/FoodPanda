<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class MeController extends Controller
{
    public function getMe()
    {
        return response()->json(auth()->user());
    }
}
