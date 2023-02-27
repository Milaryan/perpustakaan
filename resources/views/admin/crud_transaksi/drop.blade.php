<!-- Modal Show -->
<div class="modal fade" id="drop{{ $us->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="drop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="drop">Delete Transaksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <h4 class="text-center">Apakah anda yakin ingin menghapus ? : ID = {{ $us->id_transaksi }}</h4>
            </div>
            <div class="modal-footer">
                <form action="/delete-transaksi/{{ $us->id_transaksi }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark text-white">Hapus!</button>
                </form>
            </div>
    </div>
</div>
