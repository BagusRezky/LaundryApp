<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function readAll()
    {
        $users = User::all();
        return response()->json([
            // 'message' => 'Ini adalah readAll dari UserController',
            'data' => $users,
        ], 200);

    }
}
