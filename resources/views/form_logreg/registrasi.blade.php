<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/brook/brook/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 12:13:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registrasi || Perpustakaan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/icon.png">

    <!-- CSS
	============================================ -->
    <!-- Plugins -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/revoulation.css">
    <link rel="stylesheet" href="css/plugins.css"> -->

    <!-- Style Css -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- Custom Styles -->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/revoulation.css">
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.min.css">
</head>

<body class="template-color-1 template-font-1">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Start PReloader -->
    <div id="page-preloader" class="page-loading clearfix">
        <div class="page-load-inner">
            <div class="preloader-wrap">
                <div class="wrap-2">
                    <div><img src="img/icons/brook-preloader.gif" alt="Brook Preloader"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End PReloader -->

    <!-- Wrapper -->
    <div id="wrapper" class="wrapper brown-3">

        <!-- Page Conttent -->
        <main class="page-content">
            <!-- My Account Page -->
            <div class="my-account-area pt--70 pb--150 bg_color--1">
                <div class="container">
                    <div class="row">

                        <!-- Register Form -->
                        <div class="login-form-wrapper">
                            @include('admin.partial.flash_message')
                            <h1 style="margin-left: 300px; margin-bottom: 50px;">Form Registrasi</h1>
                            <form action="{{ route('regispost') }}" method="POST" class="sn-form sn-form-boxed">
                                @csrf
                                <div class="sn-form-inner">
                                    <div class="single-input">
                                        <label for="nama_user">Nama Lengkap</label>
                                        <input type="text" name="nama_user" id="nama_user" placeholder="Nama Lengkap" value="{{ old('nama_user') }}" required autofocus>
                                    </div>
                                    <div class="single-input">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" id="email" placeholder="email@example.com" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="single-input">
                                        <label for="no_telp">Nomor Telepon</label>
                                        <input type="text" name="no_telp" id="no_telp" placeholder="Nomor Telepon" value="{{ old('no_telp') }}" required>
                                    </div>
                                    <div class="single-input">
                                        <label for="alamat">Alamat Lengkap</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="5" placeholder="Masukkan Alamat Lengkap">{{ old('alamat') }}</textarea>
                                    </div>
                                    <div class="single-input">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" placeholder="********" required>
                                    </div>
                                    <input type="hidden" name="level_user" value="user">
                                    <div class="single-input">
                                        <button type="submit">
                                            <span>Register</span>
                                        </button>
                                    </div>
                                    <div class="single-input">
                                        <label for="text">Sudah Punya Akun ?<a href="{{ route('login') }}"> Login</a></label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--// Register Form -->
                    </div>
                </div>
            </div>
            <!--// My Account Page -->

        </main>
        <!--// Page Conttent -->

    </div>


    <!--// Wrapper -->

    <!-- Js Files -->
    <!-- <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script> -->

    <!-- REVOLUTION JS FILES -->
    <!-- <script src="js/jquery.themepunch.tools.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script> -->

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <!-- <script src="js/revolution.extension.actions.min.js"></script>
    <script src="js/revolution.extension.carousel.min.js"></script>
    <script src="js/revolution.extension.kenburn.min.js"></script>
    <script src="js/revolution.extension.layeranimation.min.js"></script>
    <script src="js/revolution.extension.migration.min.js"></script>
    <script src="js/revolution.extension.navigation.min.js"></script>
    <script src="js/revolution.extension.parallax.min.js"></script>
    <script src="js/revolution.extension.slideanims.min.js"></script>
    <script src="js/revolution.extension.video.min.js"></script> -->



    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="js/vendor/vendor.min.js"></script>
    <script src="js/plugins.min.js"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="js/revolution.tools.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="js/revolution.extension.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/revoulation.js"></script>

</body>


<!-- Mirrored from htmldemo.net/brook/brook/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 12:13:51 GMT -->
</html>