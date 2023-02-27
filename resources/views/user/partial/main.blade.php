<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/brook/brook/index-valentine.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 12:12:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $judul }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('img/icon.png') }}">
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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/revoulation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.min.css') }}">
    {{-- <link rel="stylesheet" href="style.min.css"> --}}
</head>

<style>
</style>

<body class="template-color-3 template-font-1">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Start Preloader  -->
    <div id="page-preloader" class="page-loading clearfix">
        <div class="page-load-inner">
            <div class="preloader-wrap">
                <div class="wrap-2">
                    <div class=""> <img src="{{ asset('img/icons/brook-preloader.gif') }}" alt="Brook Preloader"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader  -->

    <!-- Wrapper -->
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        @include('user.partial.header')
        <!--// Header -->

        <!-- Start Popup Menu -->
        <!-- End Brook Search Popup -->

            @yield('content')

        <!--// Page Conttent -->
        <!-- Footer -->
        @include('user.partial.footer')
        <!--// Footer -->

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
    <script src="{{ asset('js/revoulation.js') }}"></script>
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


<!-- Mirrored from htmldemo.net/brook/brook/index-valentine.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 12:12:55 GMT -->
</html>