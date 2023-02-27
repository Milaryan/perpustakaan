@extends('user.partial.main')

    @section('content')
    <main class="page-content">

        <!-- Start Portfolio Details -->
        <div class="brook-portfolio-details bg_color--1">
            <div class="row row--0 pt--90 pt_md--30 pt_sm--30 pb--60">
                <!-- Portfolio Left -->
                <div class="col-lg-5 col-12">
                    <div class="portfolio-right portfolio-details-gallery text-end pl_md--40 pr_md--40 pl_sm--40 pr_sm--40">

                        <!-- Start Portfolio Image -->
                        <div class="portfolio-image mb--50">
                            <img src="{{ asset('img/sampul/'.$buku->sampul) }}" alt="portfolio" width="50%" height="50%">
                        </div>
                        <!-- End Portfolio Image -->

                    </div>
                </div>

                <!-- Portfolio Right -->
                <div class="col-lg-6 col-12 mt_md--40 mt_sm--40">
                    <div class="portfolio-left bk-portfolio-details max-width-350 ml--130 ml_lg--50 ml_md--40 ml_sm--40 pr_sm--25">
                        <div class="portfolio-main-info">
                            <h3 class="heading heading-h3 line-height-1-42">{{ $buku->judul }}</h3>
                            <h5><a href="/kategori/{{ $buku->kategori_buku->nama_kategori }}">{{ $buku->kategori_buku->nama_kategori }}</a></h5>
                            <div class="portfolio-content mt--35 mb--75 mt_md--40 mb_md--40 mt_sm--40 mb_sm--40">
                                <h6 class="heading heading-h6">Sinopsis</h6>
                                <div class="desc mt--20">
                                    <p class="bk_pra">{{ $buku->sinopsis }}</p>
                                </div>
                            </div>
                            <!-- Start Details List -->
                            <div class="portfolio-details-list">

                                <div class="details-list">
                                    <label>Pengarang</label>
                                    <span>{{ $buku->pengarang }}</span>
                                </div>

                                <div class="details-list">
                                    <label>Penerbit</label>
                                    <span>{{ $buku->penerbit }}</span>
                                </div>

                                <div class="details-list">
                                    <label>Tahun Terbit</label>
                                    <span>{{ $buku->thn_terbit }}</span>
                                </div>

                                <div class="details-list">
                                    <label>Stok Tersedia</label>
                                    <span>{{ $buku->stok }}</span>
                                </div>
                                @if ($buku->pdf_file)
                                    <div class="details-list">
                                        <a href="{{ route('baca', $buku->pdf_file) }}" class="btn btn-secondary text-white">Baca</a>
                                    </div>
                                @else
                                    <div class="details-list">
                                        <p>Tidak Ada File</p>
                                    </div>
                                @endif
                                
                                @if (Auth::check())
                                    @if ($buku->stok > 0)
                                    <div class="details-list">
                                        <a data-bs-toggle="modal" data-bs-target="#pinjam" data-bs-whatever="@getbootstrap">
                                            <button type="submit" class="btn btn-dark text-white">Pinjam</button>
                                        </a>
                                            @include('user.popup.pinjam')
                                    </div>
                                    @else
                                        <p>Buku Tidak Dapat Di-Pinjam</p> 
                                    @endif
                                @else
                                    <p>Silahakan Login Jika Ingin Meminjam Buku</p>
                                @endif
                                

                            </div>
                            <!-- End Details List -->
                            <!-- Start Portfolio Share -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Portfolio Details -->

    </main>
    @endsection