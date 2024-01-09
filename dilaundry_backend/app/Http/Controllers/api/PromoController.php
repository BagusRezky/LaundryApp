<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
      function readAll()
    {
        $promos = Promo::with('shop')->get();
        return response()->json([
            // 'message' => 'Ini adalah readAll dari UserController',
            'data' => $promos,
        ], 200);

    }

     function readLimit()
    {
        $promos = Promo::orderBy('created_at', 'desc')
        ->limit(5)
        ->with('shop')
        ->get();

        if (count($promos) > 0) {
            return response()->json([
                'message' => 'Berhasil menampilkan data',
                'data' => $promos
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'data' => $promos,
            ], 404);
        }

    }
}
