<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dinas Pendidikan</title>

    <!-- Custom fonts for this template-->
    <link href="/theme/docs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/theme/docs/css/sb-admin-2.min.css" rel="stylesheet">

    @toastr_css
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center" style="color:black">
                                        <h1 class="h4 text-gray-900 mb-4">Sistem Informasi Pengolahan Data Pegawai Dan
                                            Gaji</h1>
                                    </div>
                                    <form class="user" method="post" action="/login">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="text"
                                                placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="password"
                                                placeholder="Username" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button><br />
                                        <div class="text-center">
                                            <a class="small" href="#"><strong>REGYTA SARI AMELIYANI</strong></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/theme/docs/vendor/jquery/jquery.min.js"></script>
    <script src="/theme/docs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/theme/docs/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/theme/docs/js/sb-admin-2.min.js"></script>
    @toastr_js
    @toastr_render
</body>

</html>
{{--
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/theme/docs/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    @toastr_css
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Rifai</h1>
        </div>
        <div class="login-box">
            <form class="login-form" method="POST" action="/login">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control" type="username" placeholder="Username" name="username" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" placeholder="Password" name="password">
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="/theme/docs/js/jquery-3.3.1.min.js"></script>
    <script src="/theme/docs/js/popper.min.js"></script>
    <script src="/theme/docs/js/bootstrap.min.js"></script>
    <script src="/theme/docs/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="/theme/docs/js/plugins/pace.min.js"></script>

    <script type="text/javascript">
        // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
    @toastr_js
    @toastr_render
</body>

</html> --}}