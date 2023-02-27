<!-- Modal Show -->
<div class="modal fade" id="show{{ $us->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Detail Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
                <div class="portfolio-details-list">

                    <div class="details-list">
                        <label>ID</label>
                        <span>{{ $us->id_kategori }}</span>
                    </div>
                   
                    <div class="details-list">
                        <label>Nama Kategori</label>
                        <span>{{ $us->nama_kategori }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Daftar Buku</label>
                    </div>
                </div>
                @if (count($us->buku))
                    <div class="container ml--10">
                        <div class="row">
                            @foreach ($us->buku as $item)
                                <div class="col">
                                    {{ $item->judul }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="container ml--10">
                        <div class="row">
                            <p>Tidak ada buku</p>
                        </div>
                    </div>
                @endif
        </div>
        
        <div class="modal-footer">            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>
