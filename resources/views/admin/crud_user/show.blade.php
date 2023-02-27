<!-- Modal Show -->
<div class="modal fade" id="show{{ $us->id_user }}" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="show">Detail User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
                <div class="portfolio-details-list">

                    <div class="details-list">
                        <label>ID</label>
                        <span>{{ $us->id_user }}</span>
                    </div>
                   
                    <div class="details-list">
                        <label>Nama</label>
                        <span>{{ $us->nama_user }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Email</label>
                        <span>{{ $us->email }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Nomor Telephone</label>
                        <span>{{ $us->no_telp }}</span>
                    </div>
                    
                    <div class="details-list">
                        <label>Alamat Lengkap</label>
                        <span>{{ $us->alamat }}</span>
                    </div>

                </div>
        </div>
        
        <div class="modal-footer">            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>
