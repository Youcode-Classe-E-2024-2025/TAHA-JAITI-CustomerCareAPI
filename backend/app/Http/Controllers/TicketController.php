<?php

namespace App\Http\Controllers;

use App\Helpers\Res;
use App\Http\Requests\TicketPostRequest;
use App\Services\TicketService;

class TicketController extends Controller
{
    private TicketService $ticketService;

    public function __construct(TicketService $ticketService) {
        $this->ticketService = $ticketService;
    }


    public function create(TicketPostRequest $request){
        $res = $this->ticketService->create($request);

        return $res ? Res::success($res, 'Ticket created successfully', 201) : Res::error('Failed to create ticket');
    }

    public function delete(string $id){
        $res = $this->ticketService->delete($id);

        return $res ? Res::success($res,'Ticket deleted successfully',200) : Res::error('Failed to delete ticket');
    }
}