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
        {{-- <div class="col-8">
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
                    <th scope="col">STT</th>
                    <th>ID</th>
                    <th scope="col">Tên loại sản phẩm</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($danhSachLoai as $item)
                    <tr>
                        <th>{{ $i++ }}</th>
                        <th scope="row">{{ $item->l_id }}</th>
                        <td>{{ $item->l_ten }}</td>
                        <td>
                            <a href="{{ route('sua-loai-san-pham', ['id' => $item->l_id]) }}" class="btn btn-success">Sửa</a>
                            <a href="{{ route('xoa-loai-san-pham', ['id'=> $item->l_id]) }}" class="btn btn-danger" onclick="return xoa()">Xóa</a>
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
            <form action="{{ route('xu-ly-them-loai') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên loại</label>
                  <input type="text" name="tenLoai" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên loại sản phẩm . . .">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
              </form>
        </div> --}}
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Lê Ngọc Đức</h3>
                <h5 class="widget-user-desc">Khách VIP</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('admin-template') }}/dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Lê Ngọc Đức</h3>
                <h5 class="widget-user-desc">Khách VIP</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('admin-template') }}/dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Lê Ngọc Đức</h3>
                <h5 class="widget-user-desc">Khách VIP</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('admin-template') }}/dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
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
