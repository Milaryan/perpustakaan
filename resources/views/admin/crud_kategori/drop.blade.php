<!-- Modal Show -->
<div class="modal fade" id="drop{{ $us->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="drop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="drop">Delete Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <h4 class="text-center">Apakah anda yakin ingin menghapus ? : {{ $us->nama_kategori }}</h4>
            </div>
            <div class="modal-footer">
                <form action="/delete-kategori/{{ $us->id_kategori }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark text-white">Hapus!</button>
                </form>
            </div>
    </div>
</div>
