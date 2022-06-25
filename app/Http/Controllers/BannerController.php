<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;


class BannerController extends Controller
{
    public function info(Request $request){
        $banner = Banner::OrderBy('id', 'asc')->paginate(10);
        return view('admin.banner.info', compact('banner'));
    }

    public function addBannerForm(){
        return view('admin.banner.add');
    }

    public function addBanner(Request $request){
        $banner = new Banner();
        $banner->admin_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $urlImage = $this->storeImage($request, 'image');
            $banner->image = $urlImage;
            $banner->type = 0;
        }
        $banner->fill($request->all());
        $banner->save();
        return redirect('banner/info');
    }

    public function updateBannerForm($id){
        $banner = Banner::find($id);
        return view('admin.banner/update', compact('banner'));
    }

    public function updateBanner(Request $request, $id){
        $banner = Banner::find($id);
        $banner->fill($request->all());
        $banner-> save();
        return redirect('banner/info');
    }

    public function delete($id){
        Banner::find($id)->delete();
        return redirect('banner/info');
    }

    protected function storeImage(Request $request, $name = 'image')
    {
        $path = $request->file($name)->store('public/images');
        return substr($path, strlen('public/'));
    }
}
