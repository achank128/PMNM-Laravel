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
        <div class="card">
            <div class="card-body login-card-body">
                <h3 class="text-center mb-4">{{ $title }}</h3>
                @include('share.error')
                <form action="/loginsv" method="post">
                    <div class="input-group mb-3">
                        <input name="username" class="form-control"
                            placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <button type="submit"
                            class="btn btn-primary btn-block">{{ $title }}</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @include('share.footer')
</body>

</html>
