<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class ThongKeController extends Controller
{
    public function index()
    {
        $thongKeDonHang = array();
        for ($i=1; $i <= 12 ; $i++) {
            # code...
            $donHangTheoThang = DB::table('donhang')->whereMonth('created_at',$i)->count();
            array_push($thongKeDonHang, $donHangTheoThang);
        }


        $thongKeDoanhThu = array();
        for ($i=1; $i <= 12 ; $i++) {
            # code...
            $doanhThuTheoThang = DB::table('donhang')->whereMonth('created_at',$i)->where('dh_trangthai',4)->sum('dh_tongtien');
            array_push($thongKeDoanhThu, $doanhThuTheoThang);
        }



        #Đơn hàng mới
        $donHangMoi = DB::table('donhang')->where('dh_trangthai', 1)->count();

        #Doanh thu tháng hiện tại
        $tongDoanhThuThang = DB::table('donhang')->where('dh_trangthai',4)
                            ->whereMonth('created_at',Carbon::now()->month)
                            ->sum('dh_tongtien');

        #Khách hàng mới
        $khachHangMoi = DB::table('khachhang')
                        ->whereMonth('created_at',Carbon::now()->month)
                        ->count();

        #Don hang da nhan
        $donHangDaNhan = DB::table('donhang')->where('dh_trangthai',4)->count();

        return view('admin.thongke.index', compact('thongKeDonHang', 'thongKeDoanhThu', 'donHangMoi','tongDoanhThuThang','khachHangMoi','donHangDaNhan'));
    }
}
