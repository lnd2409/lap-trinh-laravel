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
            <h2 class="text-center">Sửa loại sản phẩm {{ $loaiSanPham->l_ten }}</h2>
            <form action="{{ route('xu-ly-sua-loai', ['id'=> $loaiSanPham->l_id]) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên loại</label>
                  <input type="text" autocomplete="off" value="{{ $loaiSanPham->l_ten }}" name="tenLoai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên loại sản phẩm . . .">
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
              </form>
        </div>
    </div>
@endsection
