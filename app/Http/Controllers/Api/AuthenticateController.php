<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    /**
     * Return the user's access token.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Logged in successfully.'], 200);
        }

        return response()->json(['message' => 'This action is unauthorized.'], 401);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'cpassword' => 'required|min:6|same:password'
        ]);

        // return response()->json($request);

        if($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        } else {
            $data = $request->all();

            $username = strtolower($data['surname']) . substr(strtolower($data['name']), 0, 3);
    
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'surname' => $data['surname'],
                'nickname' => $data['nickname'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'zipcode' => $data['zipcode'],
                'username' => $username,
            ]);

            return response()->json(['message' => 'Registered successfully!'], 200);
        }
    }
}
