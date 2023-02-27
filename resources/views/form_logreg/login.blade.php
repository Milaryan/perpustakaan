<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/brook/brook/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 12:13:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- login token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login || Perpustakaan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/icon.png">
    {{-- Toastr --}}
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

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
    <link rel="stylesheet" href="{{ asset('style.min.css') }}">
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
                        <!-- Login Form -->
                        <div class="login-form-wrapper">
                            <h1 style="margin-left: 400px; margin-bottom: 50px">Login Form</h1>
                            <div class="col-lg-14 align-items-center">
                                @if (session()->has('status'))
                                    @if (session()->get('status') === 'success')
                                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                        {{ session()->get('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @else
                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                        {{ session()->get('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                @endif
                            </div>
                            <form action="{{ route('loginPost') }}" method="POST" class="sn-form sn-form-boxed">
                                @csrf
                                <div class="sn-form-inner">
                                    <div class="single-input">
                                        <label for="email">Alamat Email *</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus>
                                    </div>
                                    <div class="single-input">
                                        <label for="password">Password *</label>
                                        <input type="password" name="password" id="password" placeholder="********">
                                    </div>
                                    <div class="single-input">
                                        <button type="submit" class="mr-3">
                                            <span>Login</span>
                                        </button>
                                        {{-- <div class="checkbox-input">
                                            <input type="checkbox" name="login-form-remember" id="login-form-remember">
                                            <label for="login-form-remember">Remember me</label>
                                        </div> --}}
                                    </div>
                                    <div class="single-input">
                                        <label for="text">Don't have any acounts?<a href="{{ route('regis') }}"> Registration</a></label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--// Login Form -->
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
    <script src="{{ asset('js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('js/plugins.min.js') }}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('js/revolution.tools.min.js') }}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{ asset('js/revolution.extension.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/revoulation.js') }}"></script>{{-- Toastr --}}
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <script> 
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        }); 
    
    //   @if(Session::has('status'))
    //     @if(Session::get('status')=='success')
    //       toastr.success("{{ Session::get('message') }}")
    //     @else
    //       toastr.error("{{ Session::get('message') }}")
    //     @endif
    //   @endif
    
    </script>

</body>


<!-- Mirrored from htmldemo.net/brook/brook/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 12:13:51 GMT -->
</html>