<!-- Modal Show -->
<div class="modal fade" id="show{{ $us->id_buku }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Detail Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
                <div class="portfolio-details-list">

                    <div class="details-list">
                        <label>ID Buku</label>
                        <span>{{ $us->id_buku }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Judul</label>
                        <span>{{ $us->judul }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Pengarang</label>
                        <span>{{ $us->pengarang }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Penerbit</label>
                        <span>{{ $us->penerbit }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Tahun Terbit</label>
                        <span>{{ $us->thn_terbit }}</span>
                    </div>
                    <div class="details-list">
                        <label>Categori</label>
                        <span>{{ $us->kategori_buku->nama_kategori }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Stok</label>
                        <span>{{ $us->stok }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>PDF Name</label>
                        @if ($us->pdf_file)
                        <span>{{ $us->pdf_file }}</span>
                        @else
                        <span>Tidak Ada File</span>
                        @endif
                    </div>
                    
                    <div class="details-list">
                        <label>Sampul</label>
                        <span><img src="{{ 'img/sampul/' . $us->sampul }}" width="90" height="120" alt=""></span>
                    </div>
                    <div class="details-list">
                        <label></label>
                        <span></span>
                    </div>
                    
                    <div class="details-list">
                        <label>Sinopsis</label>
                    </div>
                    
                </div>
                <div class="container ml--10">
                    <div class="row">
                        <span>{{ $us->sinopsis }}</span>
                    </div>
                </div>
        </div>
        
        <div class="modal-footer">            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>
