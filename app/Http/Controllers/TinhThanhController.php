<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class TinhThanhController extends Controller
{
    public function index()
    {
        $thanhPho = DB::table('tinhthanhpho')->get();
        return view('test.index', compact('thanhPho'));
    }

    public function getTinh($id)
    {
        $quanHuyen = DB::table('quan')->where('t_id', $id)->get();
        return response()->json($quanHuyen, 200);
    }

    public function getPhuong($id)
    {
        $phuongXa = DB::table('phuong')->where('q_id',$id)->get();
        return response()->json($phuongXa, 200);
    }
}
