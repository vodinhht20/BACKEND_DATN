<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
class TicketController extends Controller
{
    public function index(){

        $ticket = Ticket::paginate(10);
        return view('admin.ticket.list',['ticket' => $ticket]);
    }
}
