<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function info(){
        $posts = Post::all();
        return view('admin.post.info', compact('posts'));
    }

    public function addPostForm(){
        return view('admin.post.add');
    }

    public function addPost(){
        
    }
}
