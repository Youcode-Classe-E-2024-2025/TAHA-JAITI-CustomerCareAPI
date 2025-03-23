<?php

namespace App\Services;

use App\Facades\JWT;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

}
