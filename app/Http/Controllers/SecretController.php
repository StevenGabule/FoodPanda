<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->user()) {
            return response()->json(['error' => 'User does not exists'], 500);
        }
        return $request->user()->secrets;
    }
}
