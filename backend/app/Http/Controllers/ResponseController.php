<?php

namespace App\Http\Controllers;

use App\Helpers\Res;
use App\Http\Requests\ResponseRequest;
use App\Services\ResponseService;

class ResponseController extends Controller
{
    private ResponseService $responseService;

    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }

    public function reply(ResponseRequest $request, string $id)
    {
        $response = $this->responseService->reply($request, $id);
        return $response ? Res::success(null, 'Replied!', 201) : Res::error('Failed to create reply');
    }
}
