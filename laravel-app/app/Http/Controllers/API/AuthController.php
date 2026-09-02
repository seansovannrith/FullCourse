<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SignupRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\User\SigninRequest;
use App\Http\Resources\User\UserResource;


class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response([
            'message' => 'User signed up.',
            'user' => new UserResource($user)
        ], 201);
    }

    public function signin(SigninRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['Password does not match.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response([
            'message' => 'User signed in.',
            'user' => new UserResource($user),
            'access_token' => $token
        ]);
    }
    public function signout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response([
            'message' => 'User signed out.'
        ],200);
    }
  
    public function verify(Request $request)
    {
        $user = $request->user();
        return response([
            'message' => 'User is authenticated.',
            'user' => new UserResource($user)
        ], 200);
    }
}
