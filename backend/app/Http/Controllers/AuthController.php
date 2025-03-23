<?php

namespace App\Http\Controllers;

use App\Helpers\Res;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function register(RegisterRequest $request)
    {
        $res = $this->authService->register($request);

        return $res ? Res::success($res, 'User Registered Successfully', 201) : Res::error("Failed to register");
    }

    public function login(LoginRequest $request)
    {
        $res = $this->authService->login($request);

        return $res ? Res::success($res, 'User logged in', 200) : Res::error("Failed to login");
    }
}