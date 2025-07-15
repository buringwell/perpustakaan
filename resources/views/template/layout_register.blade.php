<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin Perpustakaan</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .img-logo {
    width: 82px;
    margin: 24px auto;
    display: block;
}

@media only screen and (max-width: 576px) {
    .login-container {
        padding: 50px 30px;
    }
}

@media only screen and (min-width: 576px) {
    .login-container {
        padding: 50px 120px;
    }
}

@media only screen and (min-width: 768px) {
    .login-container {
        padding: 50px 200px;
    }
}

@media only screen and (min-width: 992px) {
    .login-container {
        padding: 50px 300px;
    }
}

@media only screen and (min-width: 1200px) {
    .login-container {
        padding: 50px 460px;
    }
}

        </style>
    </head>
    <body>

        @yield('content')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
