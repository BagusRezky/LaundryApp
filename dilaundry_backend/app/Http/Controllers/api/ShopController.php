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

     function readRecommendationLimit()
    {

         $shops = Shop::orderBy('rate', 'desc')
        ->limit(5)
        ->get();

        if (count($shops) > 0) {
            return response()->json([
                'message' => 'Berhasil menampilkan data',
                'data' => $shops
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'data' => $shops,
            ], 404);
        }


        return response()->json([
            
            'data' => $shops,
        ], 200);

    }
}
