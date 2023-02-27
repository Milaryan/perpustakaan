<!-- Modal Show -->
<div class="modal fade" id="show{{ $us->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Detail Transaksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
                <div class="portfolio-details-list">

                    <div class="details-list">
                        <label>Kode Transaksi</label>
                        <span>{{ $us->kode_transaksi }}</span>
                    </div>

                    <div class="details-list">
                        <label>Nama User</label>
                        <span>{{ $us->user->nama_user }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Judul Buku</label>
                        <span>{{ $us->buku->judul }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Tanggal Pinjam</label>
                        <span>{{ $us->tgl_pinjam }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Batas Pengembalian</label>
                        <span>{{ $us->bts_kembali }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Tanggal Pengembalian</label>
                        <span>{{ $us->tgl_kembali }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Denda</label>
                        @if ($us->status === 'Pinjam')
                        <span>-</span>
                        @else
                        <span>Rp. {{ number_format($us->denda, 0, ',', '.') }}</span>
                        @endif
                    </div>
                    
                    <div class="details-list">
                        <label>Status</label>
                        <span>{{ $us->status }}</span>
                    </div>

                </div>
        </div>
        
        <div class="modal-footer">
            @if ( $us->status === 'Pending' )
                <form action="{{ route('pinjam', $us->id_transaksi) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-dark">Pinjam</button>
                </form>
                <form action="{{ route('batal', $us->kode_transaksi) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-dark">Batal</button>
                </form>
            @elseif( $us->status === 'Pinjam' )
                <form action="{{ route('kembali', $us->id_transaksi) }}" method="get">
                    @csrf
                    <input type="hidden" name="tgl_pengembalian" value="{{ date('d-m-Y') }}">
                    <button type="submit" class="btn btn-dark">Kembalikan</button>
                </form>
            @else
                
            @endif
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>
