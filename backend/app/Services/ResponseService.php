<?php


namespace App\Services;

use App\Http\Requests\ResponseRequest;
use App\Models\Response;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;


class ResponseService {


    public function reply(ResponseRequest $request, string $id){
        $user = Auth::user();
        $ticket = Ticket::findOrFail($id);

        $response = Response::create([
            'user_id' => $user->id,
            'ticket_id' => $ticket->id,
            'response' => $request->response
        ]);

        return $response ? true : false;
    }


}