<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\Branch;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function info(){
        $posts = Post::all();
        return view('admin.post.info', compact('posts'));
    }

    public function addPostForm(){
        $branchs = Branch::all();
        $categories = PostCategory::all();
        return view('admin.post.add', compact('categories', 'branchs'));
    }

    public function addPost(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'images' => 'required',
        ],[
            'title.required' => 'Tiêu đề không được để trống',
            'content.required' => 'Nội dung khoong được để trống',
            'images.required' => 'Ảnh không được để trống',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        $option = [
            'title' => $request->title,
            'content' => $request->content,
            'employee_id' => Auth::user()->id,
        ];
        if ($request->hasFile('images')) {
        $images = $request->file('images')->store('images');
        }
        $option['images'] = $images;
        $option['type'] = 0;
        $post = new Post;
        $post->fill(array_merge($request->all(), $option));
        $post->save();
        return redirect()->route('post.info')->with('message.success', "tạo bài viết thành công");
    }

    public function updatePostForm($id){
        $posts = Post::find($id);
        $branchs = Branch::all();
        $categories = PostCategory::all();
        return view('admin.post.update', compact('posts', 'branchs', 'categories'));
    }

    public function updatePost(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'images' => 'required',
        ],[
            'title.required' => 'Tiêu đề không được để trống',
            'content.required' => 'Nội dung khoong được để trống',
            'images.required' => 'Ảnh không được để trống',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        $post = Post::find($id);
        $post -> fill($request->all(), $post);
        $post -> save();
        return redirect()->route('post.info')->with('message.success', "Sửa bài viết thành công");
    }
}
