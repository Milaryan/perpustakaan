@extends('user.partial.main')

@section('content')

<div class="brook-hero-nav-slider-area">
    <div class="brook-element-carousel slick-arrow-center slick-arrow-rounded lr-0"
        data-slick-options='{ 
        "slidesToShow": 1, 
        "slidesToScroll": 1, 
        "arrows": true, 
        "infinite": true,
        "dots": false,
        "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "ion ion-ios-arrow-back" },
        "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "ion ion-ios-arrow-forward" }
        }'>

    <!--Hero Item start-->
    <div class="hero-item bg-image" data-bg="{{ asset('img/valentine/wall.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--Hero Content start-->
                    @if (Auth::check())
                    <div class="hero-content-3 center">
                        <h3 class="fw-600">Selamat Datang {{ Auth::user()->nama_user }} !</h3>
                    </div>
                    @else
                    <div class="hero-content-3 center">
                        <h3 class="fw-600">Selamat Datang GUEST{{ date('is') }} !</h3>
                    </div>
                    @endif
                    <!--Hero Content end-->

                </div>
            </div>
        </div>
    </div>
    <!--Hero Item end-->

</div>
</div>

<main class="page-content">

    <!-- Start Product Area -->
    <div class="brook-product-area ptb--150 ptb-md--80 ptb-sm--60 bg_color--1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brook-section-title text-center">
                        <h3 class="heading heading-h3">Buku Terbaru</h3>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all">
                    <div class="row mt--30">

                        <!-- Start Single Product -->
                        @foreach ($buku as $item)
                        @if ( count($buku) )
                        <div class="col-lg-2 col-md-4 col-sm-6 col-10">
                            <div class="product mt--30">
                                <div class="product-thumbnail">
                                    <div class="thumbnail">
                                        <div class="product-main-image">
                                            <a href="{{ route('detail', $item->judul) }}">
                                                <img src="{{ asset('img/sampul/'.$item->sampul) }}" alt="Multipurpose" width="120" height="257">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-action">
                                        <ul class="action-list text-center tooltip-layout">
                                            <li class="single-action addto-cart">
                                                <form action="{{ route('addrak') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="buku_id" value="{{ $item->id_buku }}">
                                                    <a class="link hint--bounce hint--top hint--dark" aria-label="Tambahkan Ke Rak">
                                                        <button type="submit" style="border: 0"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                                                    </a>
                                                </form>
                                            </li>

                                            {{-- <li class="single-action wishlist"><a href="wishlist.html" class="link hint--bounce hint--top hint--dark"
                                                    aria-label="Add to Wishlist"><i class="far fa-heart"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h5 class="heading heading-h5"><a href="{{ route('detail', $item->judul) }}">{{ $item->judul }}</a></h5>
                                    {{-- <ul class="rating">
                                        
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                        @else
                            Tidak Ada Buku
                        @endif
                        @endforeach
                        <!-- End Single Product -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Product Area -->

    @foreach ($kategori as $item)
        @if (count($item->buku))
            <div class="brook-product-area ptb--25 ptb-md--80 ptb-sm--60 bg_color--1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="brook-section-title text-center">
                                <h3 class="heading heading-h3">{{ $item->nama_kategori }}</h3> <a href="/kategori/{{ $item->nama_kategori }}" class="mt--10 btn btn-dark text-white">More <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt--15">

                        <!-- Start Single Product -->
                            @foreach ($item->buku->take(6) as $item)
                                <div class="col-lg-2 col-md-4 col-sm-6 col-10">
                                    <div class="product mt--30">
                                        <div class="product-thumbnail">
                                            <div class="thumbnail">
                                                <div class="product-main-image">
                                                    <a href="{{ route('detail', $item->judul) }}">
                                                        <img src="{{ asset('img/sampul/'.$item->sampul) }}" alt="Multipurpose" width="120" height="257">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-action">
                                                <ul class="action-list text-center tooltip-layout">
                                                    <li class="single-action addto-cart">
                                                        <form action="{{ route('addrak') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="buku_id" value="{{ $item->id_buku }}">
                                                            <a class="link hint--bounce hint--top hint--dark" aria-label="Tambahkan Ke Rak">
                                                                <button type="submit" style="border: 0"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                                                            </a>
                                                        </form>
                                                    </li>

                                                    {{-- <li class="single-action wishlist"><a href="wishlist.html" class="link hint--bounce hint--top hint--dark"
                                                            aria-label="Add to Wishlist"><i class="far fa-heart"></i></a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="heading heading-h5"><a href="{{ route('detail', $item->judul) }}">{{ $item->judul }}</a></h5>
                                            {{-- <ul class="rating">
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Product -->
                            
                        </div>
                    </div>
                </div>
        @endif
    @endforeach
    <!-- End Product Area -->

</main>
@endsection