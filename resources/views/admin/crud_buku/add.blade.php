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
                            <form action="{{ route('bukustore') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.partial.flash_message')
                                <h1 class="heading heading-h1 font-reenie">{{ $judul }}</h1>
                                <div class="mt-3 mb-3">
                                    <label for="nama" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" value="{{ old('judul') }}" required>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="kategori" class="form-label">Kategori Buku</label>
                                    <select name="kategori_id" id="kategori" class="form-control">
                                        <option selected>Pilih Kategori</option>
                                        @foreach ($kategori as $item => $kat)
                                        <option value="{{ $kat->id_kategori }}" {{ old('kategori_id') == $kat->id_kategori ? 'selected' : '' }}> {{ $kat->nama_kategori }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="pengarang" class="form-label">Pengarang Buku</label>
                                    <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang Buku" value="{{ old('pengarang') }}" required>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="penerbit" class="form-label">Penerbit Buku</label>
                                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit Buku" value="{{ old('penerbit') }}" required>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="thn_terbit" class="form-label">Tahun Terbit Buku</label>
                                    <input type="text" class="form-control" id="thn_terbit" name="thn_terbit" placeholder="Tahun Terbit Buku" value="{{ old('thn_terbit') }}" required>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="stok" class="form-label">Stok Buku</label>
                                    <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Buku" value="{{ old('stok') }}" required maxlength="4">
                                </div>
                                <div class="mb-3">
                                    <label for="sinopsis" class="form-label">Sinopsis Buku</label>
                                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" placeholder="Sinopsis Buku">{{ old('sinopsis') }}</textarea>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="nama" class="form-label">Foto Sampul</label> <sup>*format .jpg, .jpeg, .png</sup>
                                    <input type="file" class="form-control" id="sampul" name="sampul" placeholder="Sampul Foto" value="{{ old('sampul') }}" required>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="pdf" class="form-label">File PDF Buku</label> <sup>*format .pdf, .doc</sup>
                                    <input type="file" class="form-control" id="pdf" name="pdf_file" placeholder="Jika Ada PDF-nya" value="{{ old('pdf_file') }}" >
                                </div>
                                <a href="/buku" class="btn btn-secondary text-white">Kembali</a>
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