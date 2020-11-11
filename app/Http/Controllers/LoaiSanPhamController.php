<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use Session;
class LoaiSanPhamController extends Controller
{

    public function seachCategory(Request $request)
    {
        // $result = DB::table('loaisanpham')->whereLike('l_ten',%.$request->tenLoai.%)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhSachLoai = DB::table('loaisanpham')->get();
        // $danhSachSP = User::all();
        // dd($danhSachSP);
        // select * from loaisanpham
        return view('admin.loaisanpham.index',compact('danhSachLoai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //code...
            $addLoai = DB::table('loaisanpham')->insert(
                [
                    'l_ten' => $request->tenLoai
                ]
            );
            Session::flash('alert', 'Thêm thành công');
            return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('alert-error', 'Có lỗi trong quá trình thêm');
            return redirect()->route('danh-sach-loai');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiSanPham = DB::table('loaisanpham')->where('l_id',$id)->first();
        return view('admin.loaisanpham.edit', compact('loaiSanPham'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateLSP = DB::table('loaisanpham')->where('l_id', $id)->update([
            'l_ten' => $request->tenLoai
        ]);
        dd("Sua thanh cong");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delLoaiSanPham = DB::table('loaisanpham')->where('l_id',$id)->delete();
        // Session::flash('alert-delete', 'Đã xóa thành công');
        return redirect()->route('danh-sach-loai');
        // try {
        //     //code...
        //     $delLoaiSanPham = DB::table('loaisanpham')->where('l_id',$id)->delete();
        //     Session::flash('alert-delete', 'Đã xóa thành công');
        //     return redirect()->route('danh-sach-loai');
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     Session::flash('alert-error-delete', 'Có lỗi trong quá trình thêm');
        //     return redirect()->route('danh-sach-loai');
        // }
    }

    public function timKiem(Request $request)
    {
        $tuKhoa = $request->get('tuKhoa');
        $loaiSanPhamTimDuoc = DB::table('loaisanpham')->where('l_ten','like','%'.$tuKhoa.'%')->get();
        // dd($loaiSanPhamTimDuoc);
        return view('admin.loaisanpham.loai-san-pham-tim-duoc',compact('loaiSanPhamTimDuoc','tuKhoa'));
    }
}
