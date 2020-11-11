@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Chi tiết đơn hàng</h1>
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
            <h4><b>Người nhận:</b> {{ $donHang->dh_nguoinhan }}</h4>
            <h4><b>Số điện thoại:</b> {{ $donHang->dh_sdt }}</h4>
            <h4><b>Địa chỉ:</b> {{ $donHang->dh_diachi }}</h4>
            <h4><b>Ngày đặt:</b> {{ Carbon\Carbon::parse($donHang->created_at)->format('d/m/Y') }}</h4>
            <form action="{{ route('cap-nhat-trang-thai', ['idDonHang'=> $donHang->dh_id]) }}" method="get">
                <div class="form-group col-md-2"  style="padding-left: 0px;">
                    <h4><b>Trạng thái</b></h4>
                    <select class="form-control" name="trangThai">
                        <option value="1" {{ $donHang->dh_trangthai == '1' ? 'selected' : '' }}>Đang chờ duyệt</option>
                        <option value="2" {{ $donHang->dh_trangthai == '2' ? 'selected' : '' }}>Đã duyệt</option>
                        <option value="3" {{ $donHang->dh_trangthai == '3' ? 'selected' : '' }}>Đang vận chuyển</option>
                        <option value="4" {{ $donHang->dh_trangthai == '4' ? 'selected' : '' }}>Đã nhận</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Cập nhật trạng thái</button>
            </form>
            <br>
            @php
                $stt = 1;
            @endphp
            <table class="table">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                @foreach ($sanPhamDonHang as $item)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{ $item->sp_ten }}</td>
                    <td>
                        <img src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" style="width:180px; height: 200px;" alt="{{ $item->sp_ten }}">
                    </td>
                    <td>{{ number_format($item->sp_gia) }}</td>
                    <td>{{ $item->ctdh_soluong }}</td>
                    <td>{{ number_format($item->sp_gia * $item->ctdh_soluong) }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td colspan="1"><b>Tổng tiền:</b> </td>
                    <td colspan="1">{{ number_format($donHang->dh_tongtien) }}</td>
                </tr>
            </table>
      </div>
  </div>
@endsection
