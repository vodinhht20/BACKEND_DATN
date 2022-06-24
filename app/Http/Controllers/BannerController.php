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
        // $ban = User::find();
        return view('admin.banner.add');
    }

    public function addBanner(Request $request){
        $banner = new Banner();
        $banner->admin_id = Auth::user()->id;
        $banner->fill($request->all());
        $banner-> save();
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
}
