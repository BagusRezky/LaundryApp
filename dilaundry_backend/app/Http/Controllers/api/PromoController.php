<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
      function readAll()
    {
        $promos = Promo::all();
        return response()->json([
            // 'message' => 'Ini adalah readAll dari UserController',
            'data' => $promos,
        ], 200);

    }
}
