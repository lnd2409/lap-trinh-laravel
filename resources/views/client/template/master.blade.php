<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - bán vàng</title>
    {{-- css --}}
    @include('client.template.css')
</head>
<body>
    <div class="container ">
        {{-- header --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('trang-chu') }}">TP-24k</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('trang-chu') }}">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục sản phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($loaiSanPham as $item)
                                <a class="dropdown-item" href="{{ route('trang-chu.san-pham-theo-loai', ['idCategory'=>$item->l_id]) }}">{{ $item->l_ten }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm vàng . . " aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="{{ route('gio-hang') }}" class="btn btn-default"><i class="fas fa-shopping-cart"></i> <span class="soLuong">{{ Cart::getTotalQuantity() }}</span></a>
                <a href="{{ route('xoa-gio-hang') }}" class="btn btn-default clear-cart"><i class="fas fa-trash"></i></a>
            </div>
        </nav>
        {{-- content --}}
        <div class="row mt-2">
            <div class="col-3 ">
                <ul class="list-group normal-border">
                    <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Danh mục sản phẩm</b></li>
                    @foreach ($loaiSanPham as $item)
                        <li class="list-group-item normal-border"><a href="{{ route('trang-chu.san-pham-theo-loai', ['idCategory'=>$item->l_id]) }}">{{ $item->l_ten }}</a></li>
                    @endforeach
                </ul>
                <br>
                @if (Auth::guard('khachhang')->check())
                <div>
                    <ul class="list-group normal-border">
                        <li class="list-group-item normal-border">Xin chào, <b>{{ Auth::guard('khachhang')->user()->username }}</b></li>
                        <li class="list-group-item normal-border" ><a href="{{ route('khach-hang.don-hang', ['idCus'=>Auth::guard('khachhang')->id()]) }}" style="color: red;">Đơn hàng</a></li>
                        <li class="list-group-item normal-border"><a href="{{ route('khach-hang.dang-xuat') }}">Đăng xuất</a></li>
                    </ul>
                </div>
                @else
                    <form action="{{ route('khach-hang.dang-nhap') }}" method="POST">
                        @csrf
                        <ul class="list-group normal-border mt-4">
                            <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Đăng nhập</b></li>
                            <li class="list-group-item normal-border">
                                <label for=""><b>Tên đăng nhập</b></label>
                                <input type="text" name="username">
                            </li>
                            <li class="list-group-item normal-border">
                                <label for=""><b>Mật khẩu</b></label>
                                <input type="password" name="password">
                            </li>
                            <li class="list-group-item normal-border">
                                <button type="submit" class="btn btn-success">Đăng nhập</button>
                                <a href="#" class="btn btn-primary">Đăng ký</a>
                            </li>
                        </ul>
                    </form>
                @endif
                {{-- {{ asset('/') }} --}}
            </div>
            <div class="col-9 ">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- javácript --}}
    @include('client.template.js')
    <script>
        $(document).ready(function () {
            $('.add-to-cart').click(function (e) {
                e.preventDefault();
                var idProduct = $(this).attr("data-id");
                // console.log(idProduct);
                $.ajax({
                    type: "GET",
                    url: "{{ asset('') }}"+"them-gio-hang/" + idProduct,
                    // data: "data",
                    dataType: "json",
                    success: function (response) {
                        $(".soLuong").empty();
                        $(".soLuong").html(response.soLuong);
                        alert(response.thongBao);
                    }
                });
            });
            $('.clear-cart').click(function (e) {
                e.preventDefault();
                var soLuong = $('.soLuong').text();;
                console.log(soLuong);
                if (soLuong == 0) {
                    alert("Giỏ hàng trống !");
                }else{
                    $.ajax({
                        type: "GET",
                        url: "{{ asset('') }}"+"/xoa-gio-hang",
                        dataType: "json",
                        success: function (response) {
                            $(".soLuong").empty();
                            alert(response);
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>
