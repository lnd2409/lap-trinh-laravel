@extends('client.template.master')
@section('content')
<div class="col-9 ">
    <h1 class="text-center">Giỏ hàng</h1>
    <table class="table">
        <tr>
          <th>#</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Đơn giá</th>
          <th>Giá</th>
          <th></th>
        </tr>
        @php
            $stt = 1;
        @endphp
        @foreach ($cartCollection as $item)
            <tr class="sanpham">
                <td>{{ $stt++ }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    {{ $item->quantity }}
                    {{-- <input type="number" value="{{ $item->quantity }}"> --}}
                </td>
                <td>
                <p id="donGia">{{ number_format($item->price) }}</p>
                </td>
                <td>
                    <p>
                        {{ number_format($item->getPriceSum()) }}
                    </p>
                </td>
                <td>
                    <a href="{{ route('gio-hang.xoa-san-pham', ['idProduct'=>$item->id]) }}" class="btn btn-danger">X</a>
                </td>
            </tr>
        @endforeach

            <tr>
                <td colspan="4"><b>Tổng tiền:</b> {{ number_format(Cart::getSubTotal()) }} </td>
                <td colspan="1"><a class="btn btn-primary" href="#">Cập nhật</a></td>
            </tr>
            <tr>
                <td colspan="5"><a href="{{ route('thanh-toan') }}" class="btn btn-success">Thanh toán</a></td>
            </tr>
    </table>
  </div>
  @push('gio-hang')

  @endpush
@endsection
