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

    public function delete(string $id): bool{
        $ticket = Ticket::findOrFail($id);

        return $ticket->delete() ? true : false;
    }

    public function updateStatus(string $id, string $status): ?Ticket {
        $ticket = Ticket::findOrFail($id);

        $ticket->status = ($status === 'inprog') ? 'in_progress' : $status;

        return $ticket->save() ? $ticket : null;
    }

    public function myTickets(){
        $user = Auth::user();
        
        $tickets = $user->role === 'agent'
            ? Ticket::where('assigned_to', $user->id)->get()
            : Ticket::where('user_id', $user->id)->get();

        return $tickets;
    }
}
