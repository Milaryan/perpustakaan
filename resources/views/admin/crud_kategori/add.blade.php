@extends('admin/partial/main')

@section('content')    
    <main class="page-content ml--100 ml_lg--0 ml_md--0 ml_sm--0">

        <!-- Start Photo Slider Area -->
        <div class="photo-slider-area pt--15 pb--25 pt_md--70 pt_sm--50 pb_md--10 pb_sm--10 pl--100 pr--100">
            <!-- Start Single Slider -->
            <div class="single-photo-slider-inner">
                <div class="single-photo-slider">
                    <div class="text-wrapper">
                        <div class="text">
                            <form action="{{ route('kategoristore') }}" method="post">
                                @csrf
                                @include('admin.partial.flash_message')
                                <h1 class="heading heading-h1 font-reenie">{{ $judul }}</h1>
                                    <div class="mt-3 mb-3">
                                        <label for="nama" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="{{ old('nama_kategori') }}" autofocus required>
                                    </div>
                                    <a href="/kategori" class="btn btn-secondary text-white">Kembali</a>
                                    <button type="submit" class="btn btn-dark text-white">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slider -->
        </div>
        <!-- End Photo Slider Area -->

    </main>
@endsection