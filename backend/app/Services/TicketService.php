<?php

namespace App\Services;

use App\Http\Requests\TicketPostRequest;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketService
{


    public function create(TicketPostRequest $request): ?Ticket
    {
        $ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'open',
            'assigned_to' => null,
            'user_id' => Auth::user()->id
        ]);


        return $ticket ? $ticket : null;
    }


}