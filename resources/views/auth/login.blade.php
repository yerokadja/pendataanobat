<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/assets/login/css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <title>{{ $title }}</title>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../assets/login/images/undraw_remotely_2j6y.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-5  text-center">
                            <img src="../assets/login/images/undraw_remotely_2j6y.png" width="75px" height="20px"
                                alt="Image" class="img-fluid text-center">
                        </div>
                        <div class="col-md-8 text-center">
                            <div class="mb-4">
                                <h3>Login Administrator</h3>
                                <p class="mb-4">Aplikasi Pendataan Obat PKM Bakunase</p>
                            </div>
                            <form class="mb-3" action="/login" method="POST">

                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    @csrf
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Masukan username" value="{{ old('username') }}" autofocus />
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        class="form-control" aria-describedby="Masukan password" id="password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>  -->
                                </div>
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @if ($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}',
            });
        </script>
    @endif

    <script src="../assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/login/js/popper.min.js"></script>
    <script src="../assets/login/js/bootstrap.min.js"></script>
    <script src="../assets/login/js/main.js"></script>
</body>

</html>
