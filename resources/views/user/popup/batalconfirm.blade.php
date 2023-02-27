<!-- Modal Show -->
<div class="modal fade" id="confirm{{ $item->kode_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="drop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="drop">Delete User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <h4 class="text-center">Apakah anda yakin ingin membatalkan peminjaman buku {{ $item->buku->judul }} ?</h4>
            </div>
            <div class="modal-footer">
                <a href="{{ route('bataltransaksi', $item->kode_transaksi) }}" class="btn btn-dark text-white">Batalkan!</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
    </div>
</div>
