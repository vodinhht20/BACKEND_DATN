<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use Illuminate\Support\Facades\Auth;
use Image;

class BannerController extends Controller
{
    public function __construct (BannerRepository $bannerRepo){
        $this->bannerRepo = $bannerRepo;
    }
    public function info(Request $request){
        $banner = $this->bannerRepo->getBannerPaginate();
        return view('admin.banner.info', compact('banner'));
    }

    public function addBannerForm(){
        return view('admin.banner.add');
    }
    // public $public_path = "/public/images";

    public function addBanner(Request $request){
        $request->validate([
            'name' => 'required',
            'from_at' => 'required',
            'to_at' => 'required',
        ],[
            'name.required' => 'Name không được để trống',
            'from_at.required' => 'Ngày bắt đầu không được để trống',
            'to_at.required' => 'Ngày kết thúc không được để trống',
        ]);
        $option = [
            'admin_id' => Auth::user()->id,
            'name' => $request->name,
            'links' => $request->links,
            'from_at' => $request->from_at,
            'to_at' => $request->to_at
        ];
        if ($request->hasFile('image')) {
            $urlImage = $this->storeImage($request, 'image');
            $option['image'] = $urlImage;
            $option['type'] = 0;
        }else{
            $request->validate([
                'image_link' => 'required',
            ],[
                'image_link.required' => 'Vui lòng upload ảnh hoặc để link ảnh online',
            ]);
            $option['image'] = $request->image_link;
            $option['type'] = 1;
        }
        $this->bannerRepo->create($option);
        return redirect()->route('setting.banner.info');
    }

    public function updateBannerForm($id){
        $banner = $this->bannerRepo->find($id);
        return view('admin.banner/update', compact('banner'));
    }

    public function updateBanner(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'from_at' => 'required',
            'to_at' => 'required',
        ],[
            'name.required' => 'Name không được để trống',
            'from_at.required' => 'Ngày bắt đầu không được để trống',
            'to_at.required' => 'Ngày kết thúc không được để trống',
        ]);
        $option = [
            'name' => $request->name,
            'links' => $request->links,
            'from_at' => $request->from_at,
            'to_at' => $request->to_at
        ];
        $this->bannerRepo->update($id, $option);
        return redirect()->route('setting.banner.info');
    }

    public function delete($id){
        $this->bannerRepo->delete($id);
        return redirect()->route('setting.banner.info');
    }

    protected function storeImage(Request $request, $name = 'image')
    {
        $path = $request->file($name)->store('public/images');
        $storagePath = substr($path, strlen('public/'));
        Image::make(public_path("storage/" . $storagePath))->resize(975, 325)->save();
        return $storagePath;
    }
}
