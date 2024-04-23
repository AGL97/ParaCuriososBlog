<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    public function createUser(CreateUserRequest $request):JsonResponse{
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token'  => $user->createToken("API TOKEN")->plainTextToken
        ],200);
    }

    public function loginUser(LoginUserRequest $request):JsonResponse{
        if(!Auth::attempt($request->only(['email','password']))){
            return response()->json([
                'status'=>false,
                'message' => 'Email or Password dont match with our records'
            ],400);
        }
        $user = User::where('email',$request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ],200);
    }
}
