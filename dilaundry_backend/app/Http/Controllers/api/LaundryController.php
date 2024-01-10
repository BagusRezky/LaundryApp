<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
      function readAll()
    {
        $laundries = Laundry::with('user','shop')->get();
        return response()->json([
            // 'message' => 'Ini adalah readAll dari UserController',
            'data' => $laundries,
        ], 200);
    }

    function whereUserId($id)
    {

         $laundries = Laundry::where('user_id', '=' , $id)
        ->with('user','shop')
        ->orderBy('created_at', 'desc')
        ->get();

        if (count($laundries) > 0) {
            return response()->json([
                'message' => 'Berhasil menampilkan data',
                'data' => $laundries
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'data' => $laundries,
            ], 404);
        }
        return response()->json([
            'data' => $laundries,
        ], 200);
    }

    function claim(Request $request)
    {

        $laundry = Laundry::where([
            ['id', '=', $request -> id],
            ['claim_code', '=', $request -> claim_code],
        ])->first();

        if (!$laundry) {
            return response()->json([
                'message' => 'Kode claim tidak ditemukan',
            ], 404);
        }

        if ($laundry -> user_id != 0) {
            return response()->json([
                'message' => 'Laundry sudah diambil',
            ], 400);
        }

        $laundry -> user_id = $request -> user_id;
        $updated =$laundry -> save();

        if ($updated) {
            return response()->json([
                'message' => 'Berhasil mengambil laundry',
                'data' => $updated,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Gagal mengambil laundry',
            ], 500);
        }

    }
}
