@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Loại sản phẩm</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Loại sản phẩm</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="row">
        <div class="col-8">
            <h2 class="text-center">Danh sách sản phẩm</h2>
            <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Loại</th>
                    <th>Hình ảnh</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sanPham as $item)
                        <tr>
                            <td>{{ $item->sp_id }}</td>
                            <td>{{ $item->sp_ten }}</td>
                            <td>{{ number_format($item->sp_gia) }}</td>
                            <td>@if ($item->sp_soluong != 0)
                                {{ $item->sp_soluong }}
                                @else
                                Hết hàng
                                @endif
                            </td>
                            <td>{{ $item->l_ten }}</td>
                            <td>
                                @if ($item->sp_hinhanh == null)
                                    Chưa có ảnh sản phẩm
                                @else
                                    <img src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" style="width:180px; height: 200px;" alt="">
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary">Chi tiết</a>
                                <a href="{{ route('sua-san-pham', ['id'=>$item->sp_id]) }}" class="btn btn-success">Sửa</a>
                                <a href="#" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <h2 class="text-center">Thêm sản phẩm</h2>
            <form action="{{ route('xu-ly-them-san-pham') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Tên sản phẩm</label>
                  <input type="text"  name="tenSanPham" class="form-control"  placeholder="Nhập tên sản phẩm . . .">
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="number"  name="gia" class="form-control"  placeholder="Nhập giá sản phẩm . . .">
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="number"  name="soLuong" class="form-control"  placeholder="Nhập số lượng sản phẩm . . .">
                </div>
                <div class="form-group">
                    <label >Mô tả</label>
                    <textarea id="summernote"></textarea>
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select name="tenLoai" id="" class="form-control">

                        @foreach ($loaiSanPham as $item)
                            <option value="{{ $item->l_id }}">{{ $item->l_ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhAnh" class="form-control"  placeholder="Nhập tên loại sản phẩm . . .">
                  </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
              </form>
        </div>
    </div>
@endsection
