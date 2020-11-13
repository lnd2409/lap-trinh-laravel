<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
class TrangChuController extends Controller
{
    // if ($soLuong < 1) {
    //     # code...
    //     dd("Số lượng không được âm !");
    // }
    public function index()
    {
        //
        $sanPham = DB::table('sanpham')->get();
        $banner = DB::table('banner')->get();
        return view('client.index', compact('sanPham','banner'));
    }

    public function productDetail($idProduct)
    {
        $sanPham = DB::table('sanpham')->join('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
        return view('client.product-detail',compact('sanPham'));
    }

    public function addToCart($idProduct)
    {
        # đầu vào nhận vào id sản phẩm sau đó
        # dựa vào id tìm thông tin sản phẩm
        $product = DB::table('sanpham')->where('sp_id',$idProduct)->first();

        # sử dụng hàm add của thư viện
        Cart::add($product->sp_id, $product->sp_ten, $product->sp_gia,1);
        $soLuong = Cart::getTotalQuantity();
        $json = [
            'soLuong' => $soLuong,
            'thongBao' => 'Thêm thành công'
        ];
        return response()->json($json, 200);
    }

    public function addMoreProductToCart(Request $request, $idProduct)
    {
        $soLuong = $request->get('soLuong');
        $product = DB::table('sanpham')->where('sp_id',$idProduct)->first();
        Cart::add($product->sp_id, $product->sp_ten, $product->sp_gia, $soLuong);
        return redirect()->back();
    }

    public function cart()
    {
        # lấy nội dung của giỏ hàng
        $cartCollection = Cart::getContent();
        // dd($cartCollection);
        return view('client.cart',compact('cartCollection'));
    }

    #xóa giỏ hàng
    public function clearCart()
    {
        Cart::clear();
        return response()->json("Đã xóa sản phẩm trong giỏ hàng !", 200);;
    }


    #xóa 1 sản phẩm trong giỏ hàng
    public function clearOneProduct($idProduct)
    {
        #xóa 1 sản phẩm có id truyền vào
        Cart::remove($idProduct);
        return redirect()->back();
    }



    public function getProductInCategory($idCategory)
    {
        $product = DB::table('sanpham')->where('l_id',$idCategory)->get();
        dd($product);
    }
}
