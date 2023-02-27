<!-- Modal Show -->
<div class="modal fade" id="edit{{ $us->id_user }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Edit Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <div class="text-wrapper">
                <div class="text">
                    <form action="{{ route('userupdate',$us->id_user) }}" method="post">
                        @csrf
                        <div class="mt-3 mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama_user" placeholder="Nama Lengkap" value="{{ old('nama_user') ? old('nama_user') : $us->nama_user  }}" required autofocus>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="{{ old('email') ? old('email') : $us->email  }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat Lengkap">{{  old('alamat') ? old('alamat') : $us->alamat   }}</textarea>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp" value="{{ old('no_telp') ? old('no_telp') : $us->no_telp  }}" required maxlength="15">
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Jika Ingin Menggantinya">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
