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
        <div class="col-12">
            <h2 class="text-center">Sửa {{ $sanPham->sp_ten }}</h2>
            <form action="{{ route('xu-ly-sua-san-pham', ['id'=>$sanPham->sp_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Tên sản phẩm</label>
                  <input type="text"  name="tenSanPham" value="{{ $sanPham->sp_ten }}" class="form-control" aria-describedby="emailHelp" placeholder="Nhập tên loại sản phẩm . . .">
                </div>

                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select name="tenLoai" id="" class="form-control">
                        @foreach ($loaiSanPham as $item)
                            <option value="{{ $item->l_id }}" {{ $sanPham->l_id == $item->l_id ? 'selected' : ''}}>{{ $item->l_ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinhanh }}" alt="">
                </div>
                <div class="form-group">
                    <label>Chỉnh sửa hình ảnh</label>
                    <input type="file" name="hinhAnh" class="form-control" aria-describedby="emailHelp" placeholder="Nhập tên loại sản phẩm . . .">
                  </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
              </form>
        </div>
    </div>
@endsection
