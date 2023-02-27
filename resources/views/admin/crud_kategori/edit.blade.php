<!-- Modal Show -->
<div class="modal fade" id="edit{{ $us->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Edit Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <div class="text-wrapper">
                <div class="text">
                    <form action="{{ route('kategoriupdate',$us->id_kategori) }}" method="post">
                        @csrf
                        <div class="mt-3 mb-3">
                            <label for="nama" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama_kategori" placeholder="Nama Lengkap" value="{{ old('nama_kategori') ? old('nama_kategori') : $us->nama_kategori  }}" required autofocus>
                        </div>
                        <input type="hidden" name="level_user" value="user">
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
