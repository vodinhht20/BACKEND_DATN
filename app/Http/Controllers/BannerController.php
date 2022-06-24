<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;
use Illuminate\Support\Facades\Auth;


class BannerController extends Controller
{
    public function info(Request $request){
        $banner = Banners::OrderBy('id', 'asc')->paginate(99);
        return view('admin.banner.info', compact('banner'));
    }

    public function addbanner(){
        // $ban = User::find();
        return view('admin.banner.add');
    }

    public function addbanner1(Request $request){
        $banner = new Banners();
        $banner->admin_id = Auth::user()->fullname;
        $banner->fill($request->all());
        $banner-> save();
        return redirect('banner/info');
    }

    public function updatebanner($id){
        $banner = Banners::find($id);
        return view('admin.banner/update', compact('banner'));
    }

    public function updatebanner1(Request $request, $id){
        $banner = Banners::find($id);
        $banner->fill($request->all());
        $banner-> save();
        return redirect('banner/info');
    }

    public function delete($id){
        Banners::find($id)->delete();
        return redirect('banner/info');
    }
}
