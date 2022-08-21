<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Image;

class BannerController extends Controller
{
    public function __construct (BannerRepository $bannerRepo){
        $this->bannerRepo = $bannerRepo;
    }
    public function info(Request $request){
        $banners = $this->bannerRepo->getBannerPaginate();
        return view('admin.banner.info', compact('banners'));
    }

    public function addBannerForm(){
        return view('admin.banner.add');
    }

    public function addBanner(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'from_at' => 'required',
            'to_at' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'Name không được để trống !',
            'from_at.required' => 'Ngày bắt đầu không được để trống !',
            'to_at.required' => 'Ngày kết thúc không được để trống !',
            'image.required' => 'Không tìm thấy file ảnh !',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        $option = [
            'admin_id' => Auth::user()->id,
            'name' => $request->name,
            'links' => $request->links,
            'from_at' => $request->from_at,
            'to_at' => $request->to_at,
            'image' => $request->image,
            'type' => 0
        ];

        $this->bannerRepo->create($option);
        return redirect()->route('setting.banner.info')->with('message.success', 'Thêm banner thành công');
    }

    public function updateBannerForm($id){
        $banner = $this->bannerRepo->find($id);
        return view('admin.banner/update', compact('banner'));
    }

    public function updateBanner(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'from_at' => 'required',
            'to_at' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'Name không được để trống !',
            'from_at.required' => 'Ngày bắt đầu không được để trống !',
            'to_at.required' => 'Ngày kết thúc không được để trống !',
            'image.required' => 'Không tìm thấy file ảnh !',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        $option = [
            'name' => $request->name,
            'links' => $request->links,
            'from_at' => $request->from_at,
            'to_at' => $request->to_at,
            'image' => $request->image,
            'type' => 0
        ];
        $this->bannerRepo->update($id, $option);
        return redirect()->route('setting.banner.info');
    }

    public function delete(Request $request)
    {
        if (empty($request->id)) {
            return response()->json([
                "status" => "failed",
                "message" => "Không tìm thấy banner này !"
            ], 422);
        }
       $result =  $this->bannerRepo->delete($request->id);
       if ($result) {
            return response()->json([
                "status" => "success"
            ], 200);
       }
        return response()->json([
            "status" => "failed",
            "message" => "Không thể xóa banner vào lúc này !"
        ], 422);
    }

    protected function storeImage(Request $request, $name = 'image')
    {
        $path = $request->file($name)->store('public/images');
        $storagePath = substr($path, strlen('public/'));
        Image::make(public_path("storage/" . $storagePath))->resize(975, 325)->save();
        return $storagePath;
    }
}
