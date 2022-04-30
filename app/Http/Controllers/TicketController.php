<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
class TicketController extends Controller
{
    public function index(){

        $tickets = Ticket::paginate(10);
        return view('admin.ticket.list', compact('tickets'));
    }
}
