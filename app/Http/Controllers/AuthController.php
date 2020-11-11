<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use App\NhanVienModel;
class AuthController extends Controller
{
    public function viewDangNhap()
    {
        if(Auth::guard('nhanvien')->check())
        {
            return redirect()->route('thong-ke');
        }
        return view('admin.login');
    }

    public function xuLyDangNhap(Request $request)
    {
        //2 request này nhận vào từ bên name của ô input
        $username = $request->username;
        $password = $request->password;

        //2 chữ username và password trong dấu nháy
        //tương ứng với 2 cột username và password trong bảng nhanvien của các bạn
        $arr = [
            'username' => $username,
            'password' => $password
        ];

        //Hàm attempt dùng để kiểm tra xem đăng nhập đúng hay không
        //hàm này có giá trị true hoặc false
        if (Auth::guard('nhanvien')->attempt($arr)) {
            //Nếu đăng nhập thành công thì cho vào trang sản phẩm
            return redirect()->route('thong-ke');
        } else {
            //Nếu sai tài khoản hoặc mật khẩu thì thông báo
            //Ở đây các bạn có thể sửa lại thành Session::flash
            //để thông báo ở ngoài giao diện cho ĐẸP
            dd('Tài khoản và mật khẩu chưa chính xác');
        }
    }

    public function dangXuat(Request $request)
    {
        if(Auth::guard('nhanvien')->check()){
            $logout = Auth::guard('nhanvien')->logout();
            return redirect()->route('login-admin');
        }
    }

    public function viewDangKy()
    {
        return view('admin.register');
    }

    public function xuLyDangKy(Request $request)
    {
        $hoTen = $request->hoTen;
        $email = $request->email;
        $tenDangNhap = $request->tenDangNhap;
        $matKhau1 = $request->matKhau1;
        $matKhau2 = $request->matKhau2;

        if($matKhau1 != $matKhau2)
        {
            Session::flash('alert-password','Mật khẩu không trùng khớp');
            return redirect()->back();
        }
        else
        {
            $user = new NhanVienModel();
            $user->nv_ten = $hoTen;
            $user->nv_email = $email;
            $user->username = $tenDangNhap;
            $user->password = Hash::make($matKhau1);
            //Save lai
            $user->save();
            return redirect()->route('login-admin');
        }
    }
}
