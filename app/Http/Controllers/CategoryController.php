<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;

class CategoryController extends Controller
{
    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->getAllCategoryPaginate(5);
        return view('admin.category.list', compact('categories'));
    }

    public function showFormCreate()
    {
        $category_parents = $this->categoryRepo->getCategorytParent();
        return view('admin.category.create', compact('category_parents'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Tên loại sản phẩm không được để trống',
            'name.max' => 'Tên loại sản phẩm không được quá 255 ký tự',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        DB::beginTransaction();
        try {

            $option = [
                'name' => $request->name,
                'slug' => Str::slug($request->name . ' ' .uniqid(), '-'),
                'parent_id' => 0
            ];
            
            if ($request->hasFile('image')) {
                $option['image'] = $this->storeImage($request);
            }
            
            if (isset($request->parent_id)) {
                $option['parent_id'] = $request->parent_id;
            }

            $category = $this->categoryRepo->create($option);
            DB::commit();
            return redirect()->route('admin-list-category')->with('message.success', 'Thêm loại sản phẩm thành công')->with('id_new', $category->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message.error', 'Không thể tạo mới')->withInput();
        }

    }

    public function ajaxChangeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required',
        ], [
            'id.required' => 'Thiếu id category',
            'status.required' => 'Thiếu status category',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages(),
            ], 403);
        }

        $option = [
            'status' => $request->status
        ];
        $category = $this->categoryRepo->update($request->id, $option);
        return response()->json([
            'success' => true,
            'data' => $category,
        ]);
    }

    public function showFormUpdate(Request $request, $id)
    {
        $category_parents = $this->categoryRepo->getCategorytParent($id);
        $category = $this->categoryRepo->find($id);
        if ($category) {
            return view('admin.category.update', compact('category', 'category_parents'));
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Tên loại sản phẩm không được để trống',
            'name.max' => 'Tên loại sản phẩm không được quá 255 ký tự',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        
        DB::beginTransaction();
        try {
            $option = [
                'name' => $request->name,
            ];

            if ($request->hasFile('image')) {
                $option['image'] = $this->storeImage($request);
            }

            if (isset($request->parent_id)) {
                $option['parent_id'] = $request->parent_id;
            }

            $this->categoryRepo->update($id, $option);
            DB::commit();
            return redirect()->route('admin-list-category')->with('message.success', 'Cập nhật loại sản phẩm thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message.error', 'Không thể cập nhật')->withInput();
        }
    }

    public function ajaxRemoveCategory(Request $request)
    {
        $result = $this->categoryRepo->removeCategory($request->id);
        $categories = $this->categoryRepo->getAllCategoryPaginate(5)->withPath($request->pathname);
        $viewCate = view('admin.category._partials.base_table', compact('categories'))->render();
        if ($result) {
            return response()->json([
                "success" => true,
                "data" => $viewCate
            ],200);
        }
        return response()->json([
            "success" => false,
            "message" => "Không thể xóa loại sản phẩm này"
        ],442);
    }

    protected function storeImage(Request $request) {
        $path = $request->file('image')->store('public/images');
        return substr($path, strlen('public/'));
    }
}
