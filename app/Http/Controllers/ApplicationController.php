<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){
        return view('admin.application.view');
    }
    public function nestView(){
        return view('admin.application.viewnest');
    }
    public function policy(){
        return view('admin.application.policy');
    }
    public function procedure(){
        return view('admin.application.procedure');
    }
}
