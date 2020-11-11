@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Đơn hàng</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Đơn hàng</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Danh sách đơn hàng</h2>
            <form action="{{ route('tim-kiem-don-hang') }}" method="get">
                <div class="row">
                    <input type="text" class="form-control col-md-8" name="tuKhoa" placeholder="Tìm kiếm theo . . .">
                    <select name="thuocTinh" id="">
                        <option value="donHang">Đơn hàng</option>
                        <option value="tenKhachHang">Tên khách hàng</option>
                    </select>
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
                        {{-- <th scope="col">STT</th> --}}
                        <th>Mã đơn</th>
                        <th scope="col">Người nhận</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Trạng thái</th>
                        {{-- <th>Số hàng trong hóa đơn</th> --}}
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donHang as $item)
                        <tr>
                            <td>{{ $item->dh_id }}</td>
                            <td>{{ $item->dh_nguoinhan }}</td>
                            <td>{{ $item->dh_diachi }}</td>
                            <td>{{ $item->dh_sdt }}</td>
                            <td>
                                @if ($item->dh_trangthai == 1)
                                    <span class="badge badge-secondary">Đang duyệt</span>
                                @endif
                                @if ($item->dh_trangthai == 2)
                                    <span class="badge badge-info">Đã duyệt</span>
                                @endif
                                @if ($item->dh_trangthai == 3)
                                    <span class="badge badge-warning">Đang vận chuyển</span>
                                @endif
                                @if ($item->dh_trangthai == 4)
                                    <span class="badge badge-success">Đã nhận</span>
                                @endif
                            </td>
                            {{-- <td>{{ $chiTietDonHang[$item->dh_id] }}</td> --}}
                            <td>
                                <a href="{{ route('chi-tiet-don-hang', ['idDonHang'=> $item->dh_id]) }}" class="btn btn-primary">Chi tiết đơn</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
