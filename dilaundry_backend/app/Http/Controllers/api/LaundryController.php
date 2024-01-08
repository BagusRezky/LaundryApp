<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
      function readAll()
    {
        $laundries = Laundry::all();
        return response()->json([
            // 'message' => 'Ini adalah readAll dari UserController',
            'data' => $laundries,
        ], 200);

    }
}
