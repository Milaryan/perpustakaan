<div class="side-header-inner">
    <div class="header-wrap">
        <div class="header-top">
            <div class="branding">
                <a href="/dashboard">
                    <img src="{{ asset('img/logo/simple-dark-logo.png') }}" alt="logo images">
                </a>
            </div>
            <!-- Start MEnu -->
            <div id="popop-open-menu" class="popop-open-menu hamberger-trigger">
                <div class="menu-icon">
                    <i></i>
                </div>
            </div>
            <!-- End MEnu -->
        </div>
        <div class="header-center">
            <div class="header-social-neworks">
                <div class="inner">
                    @if ($menu == 'data-user')
                        <a href="/anggota" class="mayor"><span>Anggota</span></a>
                    @else
                        <a href="/anggota" class="minor"><span>Anggota</span></a>
                    @endif
                    @if ($menu == 'data-buku')
                        <a href="/buku" class="mayor"><span>Buku</span></a>
                    @else
                        <a href="/buku" class="minor"><span>Buku</span></a>
                    @endif
                    @if ($menu == 'data-kategori')
                        <a href="/kategori" class="mayor"><span>Kategori</span></a>
                    @else
                        <a href="/kategori" class="minor"><span>Kategori</span></a>
                    @endif
                    @if ($menu == 'data-transaksi')
                        <a href="/transaksi" class="mayor"><span>Transaksi</span></a>
                    @else
                        <a href="/transaksi" class="minor"><span>Transaksi</span></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <!-- Start Hamberger -->
            <div class="manu-hamber popup-mobile-click d-block d-xl-none gray-version d-block d-xl-none">
                <div>
                    <i></i>
                </div>
            </div>
            <!-- End Hamberger -->
        </div>
    </div>
</div>