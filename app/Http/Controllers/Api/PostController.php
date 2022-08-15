<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostController extends Controller
{
    public function __construct(private PostRepository $PostRepo)
    {
        //
    }

    public function index(Request $request){
        $employee = JWTAuth::toUser($request->access_token);
        $posts = $this->PostRepo->getListPosts($employee->branch_id);
        return response()->json([
            "message" => "Lấy danh sách bài viết thành công",
            "data" => $posts,
        ]);
    }

    public function post(Request $request, $slug){
        $employee = JWTAuth::toUser($request->access_token);
        $post = $this->PostRepo->getPost($slug, $employee->branch_id);
        return response()->json([
            "message" => "Lấy bài viết thành công",
            "data" => $post,
        ]);
    }
}
