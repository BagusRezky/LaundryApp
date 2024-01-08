<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
      function readAll()
    {
        $shops = Shop::all();
        return response()->json([
            // 'message' => 'Ini adalah readAll dari UserController',
            'data' => $shops,
        ], 200);

    }
}
