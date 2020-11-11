@extends('client.template.master')
@section('content')
<h3 class="text-center">{{ $sanPham->sp_ten }}</h3>
<div class="row">
    <div class="col-5">
        <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinhanh }}" alt="gold" style="width: 100%;">
    </div>
    <div class="col-7">
        <form action="{{ route('gio-hang.them-nhieu-san-pham', ['idProduct'=>$sanPham->sp_id]) }}" method="get">
            <ul class="list-group mt-5">
                <li class="list-group-item border-none"><b>Thông tin sản phẩm</b></li>
                <li class="list-group-item border-none">Giá: {{ number_format($sanPham->sp_gia) }}</li>
                <li class="list-group-item border-none">
                    Số lượng: <input type="number" name="soLuong" value="1">
                </li>
                <li class="list-group-item border-none">Loại: {{ $sanPham->l_ten }}</li>
                <li class="list-group-item border-none"><button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button></li>
            </ul>
        </form>
    </div>
    <div class="fb-like mt-5" data-href="{{ Request::url() }}" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>

    <div class="row">
        <div class="col-md-12">
            <p>Bình luận</p>
        </div>
        <div class="col-md-12">
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width=""></div>
        </div>
    </div>
</div>
@endsection
