<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function info(Request $request)
    {
        return view('admin.company.info');
    }
}
