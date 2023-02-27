@extends('user.partial.main')

@section('content')

<main class="page-content">

    <!-- Start Product Area -->
    <div class="brook-product-area ptb--25 ptb-md--80 ptb-sm--60 bg_color--1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brook-section-title text-center">
                        <h3 class="heading heading-h3">Hasil Pencarian Dari {{ isset($_GET['search']) ?$_GET['search'] : '' }}</h3>
                    </div>
                </div>
            </div>
            <div class="row mt--15">

            <!-- Start Single Product -->
                @foreach ($buku as $item)
                    <div class="col-lg-2 col-md-4 col-sm-6 col-10">
                        <div class="product mt--30">
                            <div class="product-thumbnail">
                                <div class="thumbnail">
                                    <div class="product-main-image">
                                        <a href="{{ route('detail', $item->id_buku) }}">
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
                                <h5 class="heading heading-h5"><a href="{{ route('detail', $item->id_buku) }}">{{ $item->judul }}</a></h5>
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
    </div>
    <!-- End Product Area -->

</main>
@endsection