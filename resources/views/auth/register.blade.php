
<!DOCTYPE html>
<html lang="en">
<head>
  @include('share.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    NKC
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h3 class="text-center mb-4">{{$title}}</h3>
      @include('share.error')
      <form action="/user/register" method="post">
        <div class="input-group mb-3">
          <input name="name" class="form-control" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="mb-2">
          <button type="submit" class="btn btn-primary btn-block">{{$title}}</button>
        </div>
        @csrf
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="login">Đã có tài khoản đăng nhập</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('share.footer')
</body>
</html>
