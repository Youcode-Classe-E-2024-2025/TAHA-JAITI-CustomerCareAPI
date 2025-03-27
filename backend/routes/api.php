<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "auth"], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
});


Route::middleware(['jwt'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'myTickets']);
    Route::get('/tickets/free', [TicketController::class, 'freeTickets']);
    Route::get('/tickets/{ticket}', [TicketController::class, 'get']);
    Route::post('/tickets', [TicketController::class, 'create']);
    Route::post('/tickets/{id}', [TicketController::class, 'assignTicket']);
    Route::delete('/tickets/{id}', [TicketController::class, 'delete']);
    Route::patch('/tickets/{id}/{status}', [TicketController::class, 'updateStatus'])
        ->whereIn('status', ['open', 'inprog', 'closed']);

    Route::post('/reply/{id}', [ResponseController::class,'reply']);
});
