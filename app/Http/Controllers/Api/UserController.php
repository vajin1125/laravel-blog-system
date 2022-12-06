<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {

        $users = User::all();
        return response()->json([
            'users' => $users
        ]);
    }
}
