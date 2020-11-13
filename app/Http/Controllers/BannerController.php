<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BannerController extends Controller
{
    public function index()
    {
        $banner = DB::table('banner')->get();
        return view('admin.banner.index', compact('banner'));
    }

    public function store(Request $request)
    {
        $hinhAnh = $request->hinhAnhBanner;
        $noiDung = $request->noiDungBanner;
        //Lấy tên của file upload lên
        if($hinhAnh != null){
            $tenHinhAnh = $hinhAnh->getClientOriginalName();
            $hinhAnh->move('banner', $tenHinhAnh);
            $addBanner = DB::table('banner')->insert([
                'bn_noidung' => $noiDung,
                'bn_hinhanh' => $tenHinhAnh,
            ]);
        }else{
            $addSanPham = DB::table('banner')->insert([
                'bn_noidung' => $noiDung,
            ]);
        }
        return redirect()->route('get-banner');
    }
}
