<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class DonHangController extends Controller
{
    public function donHang()
    {
        $donHang = DB::table('donhang')->get();
        $chiTietDonHang = array();
        foreach ($donHang as $value) {
            # code...
            $chiTietDonHang[$value->dh_id] = DB::table('chitietdonhang')->where('dh_id',$value->dh_id)->get();
        }
        return view('admin.donhang.index',compact('donHang','chiTietDonHang'));
    }

    public function chiTietDonHang($idDonHang)
    {
        //Lấy thông tin đơn hàng
        $donHang = DB::table('donhang')->where('dh_id',$idDonHang)->first();

        //Lấy thông tin sản phẩm trong đơn hàng
        $sanPhamDonHang = DB::table('chitietdonhang')
            ->join('sanpham','sanpham.sp_id','chitietdonhang.sp_id')
            ->where('chitietdonhang.dh_id',$idDonHang)
            ->get();

        //Trả về view
        return view('admin.donhang.detail', compact('donHang','sanPhamDonHang'));
    }



    public function timKiem(Request $request)
    {
        switch ($request->get('thuocTinh')) {
            case 'donHang':
                # code...
                $search = DB::table('donhang')->where('dh_id',$request->get('tuKhoa'))->first();
                dd($search);
            break;

            case 'tenKhachHang':
                #code
                $search = DB::table('donhang')->where('dh_nguoinhan','like','%'.$request->get('tuKhoa').'%')->get();
                dd($search);
            break;

            default:
                # code...
            break;
        }
    }




    public function getOrderByCus($idCus)
    {
        $order = DB::table('donhang')->where('kh_id',$idCus)->get();
        dd($order);
        // return view();
    }

    public function capNhatTrangThai($idDonHang, Request $request)
    {
        $donHang = DB::table('donhang')->where('dh_id',$idDonHang)->update([
            'dh_trangthai' => $request->get('trangThai')
        ]);
        return redirect()->back();
    }
}
