<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Tambahkan ini di bagian <head> layout/template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="sb-nav-fixed">
    @if ($level == 'Admin' || $level == 'admin')
        @include('template.Navbar_admin')
    @elseif ($level == 'Siswa' || $level == 'siswa')
        @include('template.Navbar_siswa')
    @endif
    <div id="layoutSidenav">
        @if ($level == 'Admin' || $level == 'admin')
            @include('template.Sidebar_admin')
        @elseif ($level == 'Siswa' || $level == 'siswa')
            @include('template.Sidebar_siswa')
        @endif
        <div id="layoutSidenav_content">
            <main>
                @yield("content")
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; haloooo saya teguhhhhhhhhhh ini wm biar tidak di curi</div>
                    </div>
                </div>
            </footer>    
        </div>
    </div>
</body>
</html>



