<!-- Start Hamberger Menu -->
<div class="open-hamberger-wrapper d-none d-lg-block">
    <div class="page-close light-version"></div>

    <div class="header-default light-logo--version poss_relative">
        <div class="mainmenu-wrapper">
            <nav class="page_nav">
                <ul class="mainmenu">
                    @if (Auth::check())
                        <li class="lavel-1"><a href="/dashboard"><span>Dashboard</span></a></li>

                        <li class="lavel-1 with--drop slide-dropdown"><a href=""><span>Data</span></a>
                            
                            <!-- Start Dropdown Menu -->
                            <ul class="dropdown__menu">
                                <li><a href="{{ route('user') }}"><span>Data Anggota</span></a></li>
                                <li><a href="{{ route('buku') }}"><span>Data Buku</span></a></li>
                                <li><a href="{{ route('kategori') }}"><span>Data Kategori</span></a></li>
                                <li><a href="{{ route('transaksi') }}"><span>Data Transaksi</span></a></li>
                            </ul>
                            <!-- End Dropdown Menu -->
                        </li>
                        
                        <li class="lavel-1"><a href="{{ route('laporan') }}"><span>Laporan</span></a></li>
                        
                        <li class="lavel-1"><a href="/user-pages"><span>Halaman Anggota</span></a></li>
                        
                        <li class="lavel-1"><a href="{{ route('logout') }}"><span>Logout</span></a></li>
                    @else
                        <li class="lavel-1"><a href="/"><span>Dashboard</span></a></li>

                        <li class="lavel-1 with--drop slide-dropdown"><a href="#"><span>Data</span></a>
                            
                            <!-- Start Dropdown Menu -->
                            <ul class="dropdown__menu">
                                <li><a href="{{ route('user') }}"><span>Data User</span></a></li>
                                <li><a href="{{ route('buku') }}"><span>Data Buku</span></a></li>
                                <li><a href="{{ route('transaksi') }}"><span>Data Transaksi</span></a></li>
                            </ul>
                            <!-- End Dropdown Menu -->
                        </li>
                        
                        <li class="lavel-1"><a href="/regis"><span>Register User</span></a></li>
                        
                        <li class="lavel-1"><a href="/user-pages"><span>User Pages</span></a></li>
                        
                        <li class="lavel-1"><a href="/login"><span>Login</span></a></li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>

    <!-- Start Search -->
    <div class="row hamberger-search">
        <form action="#">
            <div class="input-box">
                <input type="text" placeholder="Enter search keyword…">
                <button>
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    {{-- <div class="offcanvas-extra-info mt--150">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="info">
                    <div class="bk-hover mb--40">
                        <h5 class="heading heading-h5 text-white">Connect</h5>
                        <div class="bkseparator--20"></div>
                        <p class="bk_pra font-16">2005 Stokes Isle Apt. 896, Vacaville 10010, USA</p>
                        <p class="bk_pra font-16"><a href="#">info@yourdomain.com</a></p>
                    </div>
                    <ul class="social-icon text-start tooltip-layout icon-size-large">
                        <li class="facebook"><a href="#" class="link hint--bounce hint--top hint--white"
                                aria-label="Facebook"><i class="fab fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#" class="link hint--bounce hint--top hint--white"
                                aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="instagram"><a href="#" class="link hint--bounce hint--top hint--white"
                                aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="copyright-right text-end">
                    <p class="bk_pra font-16">© 2019 Brook. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div> --}}

</div>
<!-- End Hamberger Menu -->

<!-- Start Popup Menu -->
<!-- End Popup Menu -->

<!-- Start Brook Search Popup -->
<div class="brook-search-popup">
    <div class="inner">
        <div class="search-header">
            <div class="logo">
                <a href="index.html">
                    <img src="img/logo/brook-black.png" alt="logo images">
                </a>
            </div>
            <a href="#" class="search-close"></a>
        </div>
        <div class="search-content">
            <form action="#">
                <label>
                    <input type="search" placeholder="Enter search keyword…">
                </label>
                <button class="search-submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>
<!-- End Brook Search Popup -->