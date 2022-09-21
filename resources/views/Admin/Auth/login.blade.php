<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin | Login</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>
<style>
    .position {
        margin-top: 130px;
        zoom: 1.2;
    }

    .color {
        color: #16a34a !important;
        text-shadow: 0px 2px 2px black;
        font-family: inherit;
    }

    .shadow {
        box-shadow: 0px 2px 13px 3px #343a40 !important;
    }

    .bg-login {
        height:89vh;
        background: url('{{ asset('assets/img/background-img.svg') }}') no-repeat 50%,50%;
        background-size: cover;
        padding: 58px;
    }

    /* img {
        width: 100%;
        -webkit-box-reflect: below 0 linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1));
    } */
</style>

<body class="bg-login">
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-6 position">
                        <img src="{{ asset('assets/img/login-logo.png') }}">
                    </div>

                    <div class="offset-md-2 col-md-4 ">
                        <div class="card card-primary shadow my-5">
                            <div class="card-header">
                                <div class="row">
                                    <div class=" col-md-12 ">

                                        <h3 class="text-center color"><b>
                                                ADMIN LOGIN</b></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::get('errors'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>{{ Session::get('errors')->first() }}</strong>
                                    </div>
                                    {!! Session::forget('errors') !!}
                                @endif
                                @if (Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>{{ Session::get('success') }}</strong>
                                    </div>
                                    {!! Session::forget('success') !!}
                                @endif
                                <form method="POST" action="{{ route('admin.attempt') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
