<?php

namespace App\Http\Controllers\api\user;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        return User::all();
    }

    public function currentUser(){
        return Auth::user();
    }

    public function index(Request $request)
    {
        // dd($request->all());
        $user = User::firstWhere('email', $request->email);
        
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }

            $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'access_token' => $token
            ];
        
            return response($response, 201);
    }
}
