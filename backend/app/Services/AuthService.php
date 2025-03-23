<?php

namespace App\Services;

use Exception;
use App\Facades\JWT;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthService {


    public function register(RegisterRequest $request){
        $user = User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWT::generate($user);

        return $token ? $token : null;
    }

    public function login(LoginRequest $request){
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw new Exception('Invalid password');
        }

        $token = JWT::generate($user);

        return $token ? $token : null;
    }

}
