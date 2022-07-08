<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function info(){
        return view('admin.blog.info');
    }
}
