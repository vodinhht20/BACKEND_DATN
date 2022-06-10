<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index() {
        return view('admin.checkin.view');
    }
}
