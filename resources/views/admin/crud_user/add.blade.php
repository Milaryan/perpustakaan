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
                            <form action="{{ route('userstore') }}" method="post">
                                @csrf
                                @include('admin.partial.flash_message')
                                <h1 class="heading heading-h1 font-reenie">{{ $judul }}</h1>
                                    <div class="mt-3 mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama Lengkap" value="{{ old('nama_user') }}" required autofocus>
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat Lengkap">{{ old('alamat') }}</textarea>
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="no_telp" class="form-label">No Telp</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp" value="{{ old('no_telp') }}" required maxlength="15">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                    <a href="/anggota" class="btn btn-secondary text-white">Kembali</a>
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