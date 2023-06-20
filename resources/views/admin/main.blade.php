<!DOCTYPE html>
<html lang="en">

<head>
    @include('Share.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"
                        role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        @include('Share.sidebar')

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ $title }}</small></h3>
                                </div>
                                @yield('content')
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    @include('Share.footer')
</body>

</html>
