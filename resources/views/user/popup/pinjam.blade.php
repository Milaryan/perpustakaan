<!-- Modal Show -->
<div class="modal fade" id="pinjam" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Detail User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <div class="portfolio-details-list">
                <div class="detail-list">
                    <label>Nama</label>
                    <span>{{ Auth::user()->nama_user }}</span>
                    
                </div>
                <div class="detail-list">
                    <label>Judul</label>
                    <span>{{ $buku->judul }}</span>
                </div>
                <div class="detail-list">
                    <label>Tanggal Pinjam</label>
                    <span>{{ date('d-m-Y') }}</span>
                </div>
                <div class="detail-list">
                    <label>Tenggat Pengembalian</label>
                    <span>{{ date('d')+3 . date('-m-Y') }}</span>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="{{ route('Pinjam') }}" method="post">
                @csrf
                <input type="hidden" name="buku_id" value="{{ $buku->id_buku }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id_user }}">
                <input type="hidden" name="tgl_pinjam" placeholder="Masukkan Tanggal" value="{{ date('d-m-Y') }}">
                <input type="hidden" name="bts_kembali" placeholder="Masukkan Tanggal" value="{{ date('d')+3 . date('-m-Y') }}">
                <input type="hidden" name="status" value="Pending">
                <button type="submit" class="btn btn-dark text-white">Pinjam</button>
            </form>
        </div>

    </div>
</div>
