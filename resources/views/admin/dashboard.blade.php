@extends('admin/partial/main')
@section('content')
<main class="page-content ml--100 ml_lg--0 ml_md--0 ml_sm--0">

    <!-- Start Photo Slider Area -->
    <div class="photo-slider-area pt--100 pb--100 pt_md--70 pt_sm--50 pb_md--10 pb_sm--10 pl--100 pr_lg--0 pl_lg--0 pr_md--0 pl_md--0 pr_sm--0 pl_sm--0">
        <div class="photo-slide-wrapper">
            <div class="brook-element-carousel slick-dot-vertical-center button-gray" data-slick-options='{
                "spaceBetween": 0, 
                "slidesToShow": 1, 
                "slidesToScroll": 1, 
                "arrows": false, 
                "dots": true, 
                "infinite": true
            }'
                data-slick-responsive='[
                {"breakpoint":768, "settings": {"slidesToShow": 1}}
            ]'>

                <!-- Start Single Slider -->
                <div class="single-photo-slider-inner">
                    <div class="single-photo-slider">
                        <div class="image-wrapper">
                            <a href="{{ route('user') }}">
                                <img class="w-100" src="img/slider/photo-slide/photo-slide-1.jpg" alt="Multipurpose">

                            </a>
                        </div>
                        <div class="text-wrapper">
                            <div class="text">
                                <h1 class="heading heading-h1 font-reenie">Data Anggota</h1>
                                <h4 class="heading heading-h1 font-reenie">Total Anggota : {{ $user }}</h4>
                                <a class="btn btn-dark text-white" href="{{ route('user') }}" style="margin-top: 10px"> Lihat <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slider -->

                <!-- Start Single Slider -->
                <div class="single-photo-slider-inner">
                    <div class="single-photo-slider">
                        <div class="image-wrapper">
                            <a href="{{ route('buku') }}">
                                <img class="w-100" src="img/slider/photo-slide/photo-slide-3.jpg" alt="Multipurpose">
                            </a>
                        </div>
                        <div class="text-wrapper">
                            <div class="text">
                                <h1 class="heading heading-h1 font-reenie"> Data Buku</h1>
                                <h4 class="heading heading-h1 font-reenie">Total Buku : {{ $buku }}</h4>
                                <a class="btn btn-dark text-white" href="{{ route('buku') }}" style="margin-top: 10px">Lihat <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slider -->

                <!-- Start Single Slider -->
                <div class="single-photo-slider-inner">
                    <div class="single-photo-slider">
                        <div class="image-wrapper">
                            <a href="{{ route('kategori') }}">
                                <img class="w-100" src="img/slider/photo-slide/kategori.jpg" alt="Multipurpose">
                            </a>
                        </div>
                        <div class="text-wrapper">
                            <div class="text">
                                <h1 class="heading heading-h1 font-reenie"> Data Kategori</h1>
                                <h4 class="heading heading-h1 font-reenie">Total Kategori : {{ $kategori }}</h4>
                                <a class="btn btn-dark text-white" href="{{ route('kategori') }}" style="margin-top: 10px">lihat <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slider -->

                <div class="single-photo-slider-inner">
                    <div class="single-photo-slider">
                        <div class="image-wrapper">
                            <a href="{{ route('transaksi') }}">
                                <img class="w-100" src="img/slider/photo-slide/transaksi.jpg" alt="Multipurpose">
                            </a>
                        </div>
                        <div class="text-wrapper">
                            <div class="text">
                                <h1 class="heading heading-h1 font-reenie"> Data Transaksi</h1>
                                <h4 class="heading heading-h1 font-reenie">Total Transaksi :</h4>
                                <h4 class="heading heading-h1 font-reenie">Pending = {{ $pending }}</h4>
                                <h4 class="heading heading-h1 font-reenie">Peminjaman = {{ $pinjam }}</h4>
                                <h4 class="heading heading-h1 font-reenie">Pengembalian = {{ $kembali }}</h4>
                                <a class="btn btn-dark text-white" href="{{ route('transaksi') }}" style="margin-top: 10px">lihat <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slider -->

            </div>
        </div>
    </div>
    <!-- End Photo Slider Area -->

    <!-- Start Footer Area -->
    {{-- <footer class="bk-footer-area plr--100">
        <div class="copyright-area pb--45">
            <div class="copyright-right text-center text-md-end">
                <p class="bk_pra heading-font2 color-dark">© 2019 Brook. All Rights Reserved.</p>
            </div>
        </div>
    </footer> --}}
    <!-- End Footer Area -->

</main>
@endsection