<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Cart;
use Carbon\Carbon;
class KhachHangController extends Controller
{
    public function loginCus(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password
        ];
        // dd($arr);
        if (Auth::guard('khachhang')->attempt($arr)) {
            # code...
            // dd('Đăng nhập thành công');
            return redirect()->back();
        }
        else{
            dd('login fail');
        }

        // $taikhoan = $request->username;
        // $matKhau = $request->password;

        // $soSanh = DB::table('khachhang')->where('username',$taikhoan)->where('password',$matKhau)->first();
        // if ($soSach) {
        //     # code...
        //     Session::push('login',$soSanh);
        //     return redirect()->back();
        // }
    }

    public function logoutCus()
    {
        Auth::guard('khachhang')->logout();
        return redirect()->back();
    }

    public function thanhToan()
    {
        if (Auth::guard('khachhang')->check()) {
            # code...
            // dd("Được thanh toán");
            $cartCollection = Cart::getContent();
            return view('client.thanh-toan', compact('cartCollection'));
        }
        else
        {
            dd("Đăng nhập rồi mới được thanh toán");
            // return redirect()->route('trang-chu');
        }
    }

    public function datHang(Request $request)
    {
        $idKhachHang = Auth::guard('khachhang')->id();
        $donHang = DB::table('donhang')->insertGetId(
            [
                'dh_nguoinhan' => $request->nguoiNhan,
                'dh_sdt' => $request->sdt,
                'dh_diachi' => $request->diaChi,
                'dh_tongtien' => Cart::getSubTotal(),
                'dh_trangthai' => 1,
                'created_at' => Carbon::now(), //lấy giá trị hiện tại
                'kh_id' => $idKhachHang
            ]
        );

        $cartCollection = Cart::getContent();

        // $dichVu = DB::table('chitietdichvu')->join('dichvu','dichvu.dv_id','chitietdichvu.dv_id')->leftJoin('ngay','ngay.n_id','chitietdichvu.n_id')->get();

        foreach ($cartCollection as $value) {
            # code...
            $soLuongHienTai = DB::table('sanpham')->where('sp_id',$value->id)->first();

            $soLuongGiam = DB::table('sanpham')->where('sp_id',$value->id)->update(
                [
                    'sp_soluong' => $soLuongHienTai->sp_soluong - $value->quantity
                ]
            );

            $chiTietDonHang = DB::table('chitietdonhang')->insert(
                [
                    'dh_id' => $donHang,
                    'sp_id' => $value->id,
                    'ctdh_giatien' => $value->price,
                    'ctdh_soluong' => $value->quantity
                ]
            );
        }
        Cart::clear();

        return redirect()->route('trang-chu');
        // dd($cartCollection);
    }


    public function getCus()
    {
        $khachHang = DB::table('khachhang')->get();
        return view('admin.khachhang.index', compact('khachHang'));
    }
}


































