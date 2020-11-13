@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Banner</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Banner</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="row">
        <div class="col-8">
            <h2 class="text-center">Danh sách loại sản phẩm</h2>
            <form action="{{ route('tim-kiem-loai-san-pham') }}" method="get">
                @csrf
                <div class="form-group">
                    <label for="">Tìm kiếm</label>
                    <input type="text" class="form-control" name="tuKhoa" placeholder="Tìm kiếm theo tên . . .">
                </div>
            </form>

            @if (Session::has('alert-delete'))
                <p style="color: green" class="text-center">
                    {{ Session::get('alert-delete') }}
                </p>
            @endif



            @if (Session::has('alert-error-delete'))
                <p style="color: red" class="text-center">
                    {{ Session::get('alert-error-delete') }}
                </p>
            @endif
            <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th scope="col">Hình ảnh</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($banner as $item)
                        <tr>
                            <th scope="row">{{ $item->bn_id }}</th>
                            <td>
                                <img src="{{ asset('banner') }}/{{ $item->bn_hinhanh }}" width="500" height="300">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <h2 class="text-center">Thêm loại sản phẩm</h2>

            @if (Session::has('alert'))
                <p style="color: green" class="text-center">
                    {{ Session::get('alert') }}
                </p>
            @endif


            @if (Session::has('alert-error'))
                <p style="color: red" class="text-center">
                    {{ Session::get('alert-error') }}
                </p>
            @endif
            <form action="{{ route('add-banner') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file" name="hinhAnhBanner" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea name="noiDungBanner" id="summernote"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
              </form>
        </div>
    </div>
    <script>
        function xoa() {
            const a = confirm("Bạn có muốn xóa loại này không ?");
            if(a == true){
                return true;
            }
            return false;
        }
    </script>
@endsection
