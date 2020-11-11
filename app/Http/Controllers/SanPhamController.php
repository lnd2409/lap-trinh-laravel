<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Hiển thị trong ô select
        $loaiSanPham = DB::table('loaisanpham')->get();

        //Lấy danh sách sản phẩm có join với bảng Loại sản phẩm
        $sanPham = DB::table('sanpham')
                    ->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')
                    ->get();
        // dd($sanPham);
        return view('admin.sanpham.index', compact('loaiSanPham','sanPham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tenSanPham = $request->tenSanPham;
        $tenLoai = $request->tenLoai;
        $hinhAnh = $request->hinhAnh;
        $soLuong = $request->soLuong;
        $gia = $request->gia;

        //Lấy tên của file upload lên
        if($hinhAnh != null){
            $tenHinhAnh = $hinhAnh->getClientOriginalName();
            $hinhAnh->move('hinhanhsanpham', $tenHinhAnh);
            $addSanPham = DB::table('sanpham')->insert([
                'sp_ten' => $tenSanPham,
                'l_id' => $tenLoai,
                'sp_hinhanh' => $tenHinhAnh,
                'sp_soluong' => $soLuong,
                'sp_gia' => $gia
            ]);
        }else{
            $addSanPham = DB::table('sanpham')->insert([
                'sp_ten' => $tenSanPham,
                'l_id' => $tenLoai,
                'sp_soluong' => $soLuong,
                'sp_gia' => $gia
            ]);
        }
        return redirect()->route('san-pham');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $sanPham = DB::table('sanpham')->where('')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get thong tin san pham can chinh sua
        $sanPham = DB::table('sanpham')->where('sp_id', $id)->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
        //lay danh sach loai san pham ra
        $loaiSanPham = DB::table('loaisanpham')->get();
        //return
        return view('admin.sanpham.edit', compact('sanPham','loaiSanPham'));
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
        $hinhAnh = $request->hinhAnh;
        $tenSanPham = $request->tenSanPham;
        $loaiSanPham = $request->tenLoai;

        //Kiểm tra biến request hình ảnh nhận vào
        //hình ảnh rỗng
        if($hinhAnh == '')
        {
            $editSanPham = DB::table('sanpham')->where('sp_id',$id)->update([
                'sp_ten' => $tenSanPham,
                'l_id' => $loaiSanPham
            ]);
            return redirect()->route('san-pham');
        }
        //Có request hình ảnh
        else
        {
            $tenHinhAnh = $hinhAnh->getClientOriginalName();
            $hinhAnh->move('hinhanhsanpham', $tenHinhAnh);
            $editSanPham = DB::table('sanpham')->where('sp_id',$id)->update([
                'sp_ten' => $tenSanPham,
                'l_id' => $loaiSanPham,
                'sp_hinhanh' => $tenHinhAnh
            ]);
            return redirect()->route('san-pham');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
