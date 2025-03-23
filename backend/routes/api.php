<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "auth"], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});


Route::middleware(['jwt'])->group(function () {
    Route::post('/tickets', [TicketController::class, 'create']);
    Route::delete('/tickets/{id}', [TicketController::class, 'delete']);
    Route::patch('/tickets/{id}/{status}', [TicketController::class, 'updateStatus'])
        ->whereIn('status', ['open', 'inprog', 'closed']);
});
