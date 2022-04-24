<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Validator;

class ProductController extends Controller
{
    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepo) {

        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index() {
        $products = Product::all();
        return view("client.product.index", compact('products'));
    }

    public function showDetail(Request $request, $slug) {
        $product = $this->productRepo->getProductBySlug($slug);
        return view("client.product.detail", compact('product'));
    }

    public function showFormCreate() {
        $categories = $this->categoryRepo->getCategorytParent()->load('children_cate');
        return view('admin.product.create', compact('categories'));
    }

    public function addProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'category' => 'required',
            'discount' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($value > 0) {
                        if (!$request->start_discount) {
                            return $fail('Ngày bắt đầu không được để trống !');
                        } else if (!$request->end_discount) {
                            return $fail('Ngày kết thúc không được để trống !');
                        }
                    }
                },
            ],
            'start_discount' => [
                'nullable',
                'date_format:d/m/Y',
                'after:yesterday'
            ],
            'end_discount' => [
                'nullable',
                'date_format:d/m/Y',
                'before:start_date'
            ],

        ], [
            'name.required' => 'Tên sản sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm không được quá 255 ký tự',
            'image.required' => 'Hình ảnh không được trống',
            'price.required' => 'Giá không được để trống',
            'category.required' => 'Loại sản phẩm không được để trống',
            'category.required' => 'Loại sản phẩm không được để trống',
            'start_discount.after' => 'Ngày bắt đầu phải từ ngày hôm nay',
            'end_discount.before' => 'Ngày kết thúc phải trước ngày bắt đầu',
            'end_discount.date_format' => 'Vui lòng nhập đúng định dạng ngày tháng (d/m/Y)',
            'start_discount.date_format' => 'Vui lòng nhập đúng định dạng ngày tháng (d/m/Y)',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        if (!$request->hasFile('image')) {
            return redirect()->back()->with('message.error', "Không thể upload file")->withInput();
        }

        $urlImage = $this->storeImage($request, $request->name);

        DB::beginTransaction();
        try {
            $option = [
                'name' => $request->name,
                'slug' => Str::slug($request->name . ' ' .uniqid(), '-'),
                'image' => $urlImage,
                'price' => $request->price,
                'category_id' => $request->category
            ];
            if (isset($request->discount)) {
                $option['discount'] = $request->discount;
                if ($request->discount > 0) {
                    $option['start_discount'] = $this->formatDate($request->start_discount, 'd/m/Y');
                    $option['end_discount'] = $this->formatDate($request->end_discount, 'd/m/Y');
                }
            }

            if (isset($request->description)) {
                $option['description'] = $request->description;
            }

            $product = $this->productRepo->create($option);
            DB::commit();
            return redirect()->route('admin-product-list')->with('message.success','Thêm sản phẩm thành công')->with('id_new', $product->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message.error','Không thể tạo mới')->withInput();
        }

    }

    public function listProduct(Request $request) {

        $options = [];

        if ($request->input('keywords')) {
            $options['keywords'] = $request->input('keywords');
        }
        if ($request->input('cate')) {
            $options['cate'] = $request->input('cate');
        }
        if ($request->input('status')) {
            $options['status'] = $request->input('status');
        }
        $categories = $this->categoryRepo->getCategorytParent()->load('children_cate');
        $products = $this->productRepo->getAllProductPaginate(10, $options)->appends($request->query());
        return view('admin.product.list', compact('products', 'categories'));
    }
    public function ajaxFilterProduct(Request $request)
    {
        // chuyển param thành mảng
        $components = parse_url($request->param);
        parse_str($components['query'], $arrParam);
        
        $options = [];

        if (isset($arrParam['keywords'])) {
            $options['keywords'] = $arrParam['keywords'];
        }
        if (isset($arrParam['cate'])) {
            $options['cate'] = $arrParam['cate'];
        }
        if (isset($arrParam['status'])) {
            $options['status'] = $arrParam['status'];
        }
        $products = $this->productRepo->getAllProductPaginate(10, $options)->withPath($request->pathname)->appends($arrParam);
        $dataView = view('admin.product._partials.base_table', compact('products'))->render();
        return response()->json([
            "success" => true,
            "data" => $dataView
        ]);
    }
    
    public function exportExcel() {
        return Excel::download(new ProductExport($this->productRepo), 'products_' . Carbon::now()->format('Y_m_d_s') . '.xlsx');
    }

    public function exportCSV() {
        return Excel::download(new ProductExport($this->productRepo), 'products_' . Carbon::now()->format('Y_m_d_s') . '.csv');
    }

    public function ajaxRemoveProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Không thể khôi phục vì thiếu id',
        ]);
        if ($validator->fails()) {
            return response()->json(['messages' => $validator->messages()->first(), 'success' => false], 403);
        }
        $result = $this->productRepo->delete($request->id);
        if ($result) {
            $products = $this->productRepo->getAllProductPaginate(10)->withPath($request->pathname);
            $dataView = view('admin.product._partials.base_table', compact('products'))->render();
            return response()->json([
                "success" => true,
                "data" => $dataView
            ]);
        }
        return response()->json([
            "success" => false,
            "messages" => "Không thể xóa sản phẩm này"
        ]);
    }

    public function showFormUpdate(Request $request, $id) {
        $product = $this->productRepo->find($id);
        if ($product) {
            $categories = $this->categoryRepo->getCategorytParent();
            return view('admin.product.update', compact('product','categories'));
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function updateProduct(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',
            'category' => 'required',
            'discount' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($value > 0) {
                        if (!$request->start_discount) {
                            return $fail('Ngày bắt đầu không được để trống !');
                        } else if (!$request->end_discount) {
                            return $fail('Ngày kết thúc không được để trống !');
                        }
                    }
                },
            ],
            'start_discount' => [
                'nullable',
                'date_format:d/m/Y',
                'after:yesterday'
            ],
            'end_discount' => [
                'nullable',
                'date_format:d/m/Y',
                'before:start_date'
            ],

        ], [
            'name.required' => 'Tên sản sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm không được quá 255 ký tự',
            'price.required' => 'Giá không được để trống',
            'category.required' => 'Loại sản phẩm không được để trống',
            'category.required' => 'Loại sản phẩm không được để trống',
            'start_discount.after' => 'Ngày bắt đầu phải từ ngày hôm nay',
            'end_discount.before' => 'Ngày kết thúc phải trước ngày bắt đầu',
            'end_discount.date_format' => 'Vui lòng nhập đúng định dạng ngày tháng (d/m/Y)',
            'start_discount.date_format' => 'Vui lòng nhập đúng định dạng ngày tháng (d/m/Y)',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        $option = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
        ];

        if (isset($request->discount)) {
            $option['discount'] = $request->discount;
            if ($request->discount > 0) {
                $option['start_discount'] = $this->formatDate($request->start_discount, 'd/m/Y');
                $option['end_discount'] = $this->formatDate($request->end_discount, 'd/m/Y');
            }
        }

        if (isset($request->description)) {
            $option['description'] = $request->description;
        }

        if ($request->hasFile('image')) {
            $option['image'] = $this->storeImage($request, $request->name);
        }

        if ($this->productRepo->update($id, $option)) {
            return redirect()->route('admin-product-list')->with('message.success','Cập nhật sản phẩm thành công');
        } else {
            return redirect()->back()->with('message.error','Cập nhật sản phẩm thất bại')->withInput();
        }

    }

    public function ajaxChangeStatus(Request $request) {
        $option = [
            'status' => $request->status == 0 ? 1 : 0
        ];
        if ($this->productRepo->update($request->id, $option)) {
            $products = $this->productRepo->getAllProductPaginate(10)->withPath($request->pathname);
            $dataView = view('admin.product._partials.base_table', compact('products'))->render();
            return response()->json([
                "success" => true,
                "data" => $dataView
            ]);
        }
        return response()->json([
            "success" => false,
            "message" => "Không thể cập nhật sản phẩm này"
        ]);
    }

    public function showTrash() {
        $trashProduct = $this->productRepo->getAllTrash();
        return view('admin.product.trash', compact('trashProduct'));
    }

    public function ajaxRestoreTrash(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Không thể khôi phục vì thiếu id',
        ]);
        if ($validator->fails()) {
            return response()->json(['messages' => $validator->messages()->first(), 'success' => false], 403);
        }
        $result = $this->productRepo->restore($request->id);
        if ($result) {
            $trashProduct = $this->productRepo->getAllTrash();
            $viewData = view('admin.product._partials.base_trash', compact('trashProduct'))->render();
            return response()->json([
                'data' => $viewData,
                'success' => true,
                'messages' => 'Khôi phục sản phẩm thành công !'
            ]);
        }
        return response()->json(['messages' => "Không thể khôi phục, vui lòng thử lại !", 'success' => false], 422);
    }

    public function ajaxRestoreTrashAll(Request $request)
    {
        $result = $this->productRepo->restoreAll();
        if ($result) {
            $trashProduct = $this->productRepo->getAllTrash()->withPath($request->pathname);
            $viewData = view('admin.product._partials.base_trash', compact('trashProduct'))->render();
            return response()->json([
                'messages' => 'Xóa sản phẩm thành công !',
                'data' => $viewData,
                'success' => true
            ]);
        }
        return response()->json(['messages' => "Không thể khôi phục, vui lòng thử lại !", 'success' => false], 422);
    }

    public function ajaxDeleteTrash(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Không thể khôi phục vì thiếu id',
        ]);
        if ($validator->fails()) {
            return response()->json(['messages' => $validator->messages()->first(), 'success' => false], 403);
        }
        $result = $this->productRepo->deleteTrash($request->id);
        if ($result) {
            $trashProduct = $this->productRepo->getAllTrash()->withPath($request->pathname);
            $viewData = view('admin.product._partials.base_trash', compact('trashProduct'))->render();
            return response()->json([
                'messages' => 'Xóa sản phẩm thành công !',
                'data' => $viewData,
                'success' => true
            ]);
        }
        return response()->json(['messages' => "Không thể xóa sản phẩm này, vui lòng thử lại !", 'success' => false], 422);
    }

    public function ajaxDeleteTrashAll(Request $request)
    {
        $result = $this->productRepo->deleteAll();
        if ($result) {
            $trashProduct = $this->productRepo->getAllTrash()->withPath($request->pathname);;
            $viewData = view('admin.product._partials.base_trash', compact('trashProduct'))->render();
            return response()->json([
                'messages' => 'Xóa sản phẩm thành công !',
                'data' => $viewData,
                'success' => true
            ]);
        }
        return response()->json(['messages' => "Xóa thất bại, vui lòng thử lại !", 'success' => false], 422);
    }

    public function preview($id)
    {
        $product = $this->productRepo->find($id);
        if ($product) {
            return view("client.product.detail", compact('product'));
        }
        return abort(404);
    }

    protected function storeImage(Request $request, $productName) {
        $nameFile = Str::slug($productName . ' ' . now(), '-');
        $path = $request->file('image')->storeAs('public/images', $nameFile);
        return substr($path, strlen('public/'));
    }

    protected function formatDate($date, $currentFormat ,$format = 'Y-m-d') {
        $date = DateTime::createFromFormat($currentFormat, $date);
        return $date->format($format);
    }
}
