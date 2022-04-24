<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $newPrimaryTop = Post::orderBy('created_at', 'desc')->first();

        $postListNews = Post::where('id','!=',$newPrimaryTop->id)->get();

        return view('client.news.index',compact('newPrimaryTop','postListNews'));
    }
}
