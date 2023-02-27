<!-- Modal Show -->
<div class="modal fade" id="edit{{ $us->id_buku }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Edit Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <div class="text-wrapper">
                <div class="text">
                    <form action="{{ route('bukuupdate',$us->id_buku) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3 mb-3">
                            <label for="nama" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" value="{{ old('judul') ? old('judul') : $us->judul  }}" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="kategori" class="form-label">Kategori Buku</label>
                            <select name="kategori_id" id="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item => $kat)
                                <option value="{{ $kat->id_kategori }}" {{($kat->id_kategori == $us->kategori_id) ? 'selected' : ''}}> {{ $kat->nama_kategori }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="pengarang" class="form-label">Pengarang Buku</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang Buku" value="{{ old('pengarang') ? old('pengarang') : $us->pengarang  }}" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="penerbit" class="form-label">Penerbit Buku</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit Buku" value="{{ old('penerbit') ? old('penerbit') : $us->penerbit  }}" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="thn_terbit" class="form-label">Tahun Terbit Buku</label>
                            <input type="text" class="form-control" id="thn_terbit" name="thn_terbit" placeholder="Tahun Terbit Buku" value="{{ old('thn_terbit') ? old('thn_terbit') : $us->thn_terbit  }}" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="stok" class="form-label">Stok Buku</label>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Buku" value="{{ old('stok') ? old('stok') : $us->stok  }}" required maxlength="4">
                        </div>
                        <div class="mb-3">
                            <label for="sinopsis" class="form-label">Sinopsis Buku</label>
                            <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" placeholder="Sinopsis Buku">{{ old('sinopsis') ? old('sinopsis') : $us->sinopsis  }}</textarea>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="nama" class="form-label">Foto Sampul</label>
                            <input type="file" class="form-control" id="sampul" name="sampul" placeholder="Sampul Foto" value="{{ old('sampul') ? old('sampul') : $us->sampul  }}">
                            <img src="{{ asset('img/sampul/'.$us->sampul) }}" height="85" width="55" style="margin-top: 10px" alt="">
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="pdf" class="form-label">File PDF Buku</label>
                            <input type="file" class="form-control" id="pdf" name="pdf_file" placeholder="Jika Ada PDF-nya" value="{{ old('pdf_file') ? old('pdf_file') : $us->pdf_file  }} >
                            <p style="margin-top: 7px">{{ old('pdf_file') ? old('pdf_file') : $us->pdf_file  }}</p>
                        </div>
                        <a href="/buku" class="btn btn-secondary text-white">Kembali</a>
                        <button type="submit" class="btn btn-dark text-white">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            {{-- <form action="{{ route('userupdate') }}" method="post">
            </form> --}}
        </div>

    </div>
</div>
