<header class="br_header header-default  black-logo--version haeder-fixed-width haeder-fixed-150 headroom--sticky header-mega-menu clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header__wrapper mr--0">
                    <!-- Header Left -->
                    <div class="header-left">
                        <div class="logo">
                            <a href="{{ route('userpages') }}">
                                {{-- <img src="{{ asset('img/logo/dark-retina-logo.png') }}" alt="Brook Images"> --}}
                                <h3 class="heading heading-h3 line-height-1-42">Perpustakaan</h3>
                            </a>
                        </div>
                    </div>
                    <!-- Mainmenu Wrap -->
                    <div class="mainmenu-wrapper d-none d-lg-block">
                        <nav class="page_nav">
                            <ul class="mainmenu">
                                @if (Auth::check())
                                    @if (Auth::user()->level_user == 'anggota')
                                        <li class="lavel-1 with--drop slide-dropdown"><a href=""><span>Kategori</span></a>
                                            <!-- Start Dropdown Menu -->
                                            <ul class="dropdown__menu">
                                                @foreach ($kategori as $item)
                                                <li><a href="/kategori/{{ $item->nama_kategori }}"><span>{{ $item->nama_kategori }}</span></a></li>
                                                @endforeach
                                            </ul>
                                            <!-- End Dropdown Menu -->
                                        </li>

                                        <li class="lavel-1 slide--megamenu"><a href="{{ route('userpages') }}"><span>Home</span></a></li>

                                        <li class="lavel-1 slide--megamenu"><a href="{{ route('history') }}"><span>Daftar Peminjaman</span></a></li>

                                        <li class="lavel-1 slide--megamenu"><a href="{{ route('logout') }}"><span>Logout</span></a></li>
                                    @elseif (Auth::user()->level_user === 'admin')
                                        <li class="lavel-1 with--drop slide-dropdown"><a href=""><span>Kategori</span></a>
                                            <!-- Start Dropdown Menu -->
                                            <ul class="dropdown__menu">
                                                @foreach ($kategori as $item)
                                                <li><a href="/kategori/{{ $item->nama_kategori }}"><span>{{ $item->nama_kategori }}</span></a></li>
                                                @endforeach
                                            </ul>
                                            <!-- End Dropdown Menu -->
                                        </li>

                                        <li class="lavel-1 slide--megamenu"><a href="{{ route('userpages') }}"><span>Home</span></a></li>

                                        <li class="lavel-1 slide--megamenu"><a href="{{ route('history') }}"><span>Daftar Peminjaman</span></a></li>

                                        <li class="lavel-1 slide--megamenu"><a href="{{ route('dashboard') }}"><span>Admin Pages</span></a></li>

                                        <li class="lavel-1 slide--megamenu"><a href="{{ route('logout') }}"><span>Logout</span></a></li>
                                    @else
                                        <li class="lavel-1 slide--megamenu"><a href="{{ route('login') }}"><span>Login</span></a></li>
                                    @endif
                                @else
                                    <li class="lavel-1 with--drop slide-dropdown"><a href=""><span>Kategori</span></a>
                                        <!-- Start Dropdown Menu -->
                                        <ul class="dropdown__menu">
                                            @foreach ($kategori as $item)
                                            <li><a href="kategori/{{ $item->nama_kategori }}"><span>{{ $item->nama_kategori }}</span></a></li>
                                            @endforeach
                                        </ul>
                                        <!-- End Dropdown Menu -->
                                    </li>

                                    <li class="lavel-1 slide--megamenu"><a href="{{ route('userpages') }}"><span>Home</span></a></li>

                                    <li class="lavel-1 slide--megamenu"><a href="{{ route('login') }}"><span>Login</span></a></li>
                                @endif

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <!-- Start Minicart -->
                        <div class="mini-cart">
                            <div id="minicart-trigger" class="minicart-trigger mini-cart-button">
                                <button>Rak</button>
                            </div>
                            <div class="shopping-cart cart-box">
                                <div class="shop-inner">
                                    <div class="header">
                                        <ul class="product-list">
                                            @php
                                                $rak = DB::table('rak_user as r')
                                                ->where('user_id', Auth::id())
                                                ->join('buku as b', 'b.id_buku', 'r.buku_id')
                                                ->get();
                                            @endphp

                                            @if (count($rak))
                                                
                                            @foreach ($rak as $item)
                                            <!-- Start Single Product -->
                                            <li>
                                                <div class="thumb">
                                                    <a href="{{ route('detail', $item->id_buku) }}">
                                                        <img src="{{ asset('img/sampul/'.$item->sampul) }}" alt="Multipurpose template">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <div class="inner">
                                                        <h4 style="margin-top: 30px"><a href="{{ route('detail', $item->id_buku) }}">{{ $item->judul }}</a></h4>
                                                        <a href="{{ route('baca', $item->pdf_file) }}" class="btn btn-dark text-white">Baca</a>
                                                    </div>
                                                    <form action="{{ route('drop', $item->id_rak) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="delete-btn"><i class="fas fa-times"></i></button>
                                                    </form>
                                                </div>
                                            </li>
                                            @endforeach
                                            @else
                                                <p style="text-align: center">Belum Ada Buku di Rak</p>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Minicart -->
                        <!-- Start Popup Search Wrap -->
                        <div class="popup-search-wrap">
                            <a class="btn-search-click" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        
                        {{-- Flash Message --}}
                        <div class="col-lg-14 align-items-center" style="position: absolute">
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
                        <!-- End Popup Search Wrap -->
                         <!-- Start Hamberger -->
                         <div class="manu-hamber popup-mobile-click d-block d-lg-none black-version d-block d-xl-none">
                            <div>
                                <i></i>
                            </div>
                        </div>

                        <!-- Start Brook Search Popup -->
                        <div class="brook-search-popup">
                            <div class="inner">
                                <div class="search-header">
                                    <div class="logo">
                                    </div>
                                    <a href="#" class="search-close"></a>
                                </div>
                                <div class="search-content">
                                    <form action="{{ route('search') }}">
                                        <label>
                                            <input type="search" name="search" placeholder="Enter search keyword…" value="{{ isset($_GET['search']) ?$_GET['search'] : '' }}">
                                        </label>
                                        <button class="search-submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
<!-- End Brook Search Popup -->
                        <!-- End Hamberger -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>