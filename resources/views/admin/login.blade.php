<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('admin.template.css')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
        <p>Đăng nhập</p>
        <form action="{{ route('xu-ly-dang-nhap') }}" method="post">
            @csrf
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Mật khẩu"  name="password"">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="">
                <button class="btn btn-primary" type="submit">Đăng nhập</button>
            </div>
        </form>
        <p class="mb-1">
            <a href="{{ route('register-admin') }}">Đăng ký</a>
        </p>
        <p class="mb-1">
            <a href="forgot-password.html">Quên mật khẩu</a>
        </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('admin.template.js')

</body>
</html>
