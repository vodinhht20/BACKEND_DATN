<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Branch;
use App\Models\PostCategory;
use App\Repositories\BranchRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct(
        private BranchRepository $branchRepo,
        private PostRepository $postRepo
    )
    {
        //
    }
    public function info(){
        $posts = Post::with(['branch', 'employee', 'category'])->paginate(10);
        return view('admin.post.info', compact('posts'));
    }

    public function addPostForm()
    {
        $branchs = $this->branchRepo->getAll();
        $categories = PostCategory::all();
        return view('admin.post.add', compact('categories', 'branchs'));
    }

    public function addPost(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'images' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề không được quá 255 ký tự',
            'content.required' => 'Nội dung khoong được để trống',
            'images.required' => 'Ảnh không được để trống',
            'images.mimes' => 'Định dạng file phải là ảnh',
            'images.max' => 'Ảnh không được quá 10MB',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        $option = [
            'title' => $request->title,
            'content' => $request->content,
            'employee_id' => Auth::user()->id,
            'slug' => self::makeSlug($request->title)
        ];

        if ($request->hasFile('images')) {
            $urlImage = $this->storeImage($request, 'images');
            $option['images'] = $urlImage;
        }
        $option['type'] = 0;
        $post = new Post;
        $post->fill(array_merge($request->all(), $option));
        $post->save();
        return redirect()->route('post.info')->with('message.success', "tạo bài viết thành công");
    }

    public function updatePostForm($id)
    {
        $post = Post::find($id);
        $branchs = $this->branchRepo->getAll();
        $categories = PostCategory::all();
        return view('admin.post.update', compact('post', 'branchs', 'categories'));
    }

    public function updatePost(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'images' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ],[
            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề không được quá 255 ký tự',
            'content.required' => 'Nội dung khoong được để trống',
            'images.required' => 'Ảnh không được để trống',
            'images.mimes' => 'Định dạng file phải là ảnh',
            'images.max' => 'Ảnh không được quá 10MB',
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
            $urlImage = $this->storeImage($request, 'images');
            $option['images'] = $urlImage;
        }

        $option['type'] = 0;
        $post = Post::find($id);
        $post->fill(array_merge($request->all(), $option));
        $post->save();
        return redirect()->route('post.info')->with('message.success', "Sửa bài viết thành công");
    }

    protected function storeImage(Request $request, $name = 'image')
    {
        $path = $request->file($name)->store('public/posts');
        return substr($path, strlen('public/'));
    }

    private static function makeSlug($string)
    {
        $slug = Str::slug($string);
        $post = Post::whereSlug($slug)->first();
        if ($post) {
            self::makeSlug($string . $post->id + 1);
        }
        return $slug;
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => "Không thể xóa tin này"
            ], 403);
        }
        $result = $this->postRepo->delete($request->id);
        if ($result) {
            return response()->json([
                "status" => "success"
            ]);
        }
        return response()->json([
            "status" => "failed",
            "message" => "Xóa tin thất bại"
        ], 422);
    }
}
