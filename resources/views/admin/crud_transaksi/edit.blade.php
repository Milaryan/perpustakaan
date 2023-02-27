<!-- Modal Show -->
<div class="modal fade" id="edit{{ $us->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Edit Transaksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <div class="text-wrapper">
                <div class="text">
                    <form action="{{ route('transaksiupdate',$us->id_transaksi) }}" method="post">
                        @csrf
                            <input type="hidden" name="id_buku" value="{{ $us->buku_id }}">
                            <div class="mt-3 mb-3">
                                <label for="nama" class="form-label">ID User</label>
                                <input type="text" class="form-control" id="nama" name="user_id" placeholder="Masukkan ID User" value="{{ old('user_id') ? old('user_id') : $us->user_id }}" required autofocus>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="email" class="form-label">ID Buku</label>
                                <input type="text" class="form-control" id="email" name="buku_id" placeholder="Masukkan ID Buku" value="{{ old('buku_id') ? old('buku_id') : $us->buku_id }}" required>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="email" class="form-label">Tanggal Pinjam</label>
                                <input type="text" class="form-control" id="email" name="tgl_pinjam" placeholder="Masukkan Tanggal" value="{{ old('tgl_pinjam') ? old('tgl_pinjam') : $us->tgl_pinjam }}" required>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="email" class="form-label">Batas Pengembalian</label>
                                <input type="text" class="form-control" id="email" name="bts_kembali" placeholder="Masukkan Tanggal" value="{{ old('tgl_kembali') ? old('tgl_kembali') : $us->bts_kembali }}" required>
                            </div>
                            <input type="hidden" name="status" value="{{ old('status') ? old('status') : $us->status }}">
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
