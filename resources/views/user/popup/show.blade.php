<!-- Modal Show -->
<div class="modal fade" id="show{{ $item->kode_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Detail Peminjaman</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
                <div class="portfolio-details-list">

                    <div class="details-list">
                        <label>Kode Transaksi</label>
                        <span>{{ $item->kode_transaksi }}</span>
                    </div>

                    <div class="details-list">
                        <label>Nama Anggota</label>
                        <span>{{ $item->user->nama_user }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Judul Buku</label>
                        <span>{{ $item->buku->judul }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Tanggal Pinjam</label>
                        <span>{{ $item->tgl_pinjam }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Batas Pengembalian</label>
                        <span>{{ $item->bts_kembali }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Tanggal Pengembalian</label>
                        <span>{{ $item->tgl_kembali }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Denda</label>
                        @if ($item->status === 'Pinjam')
                        <span>-</span>
                        @else
                        <span>Rp. {{ number_format($item->denda, 0, ',', '.') }}</span>
                        @endif
                    </div>
                    
                    <div class="details-list">
                        <label>Status</label>
                        <span>{{ $item->status }}</span>
                    </div>

                </div>
        </div>
        
        <div class="modal-footer">            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>
