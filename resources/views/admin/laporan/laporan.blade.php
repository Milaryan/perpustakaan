@extends('admin/partial/main')

@section('content')

<style>
    tr td {
        text-align: center;
    }
    th{
        text-align: center
    }
</style>
    <main class="page-content ml--100 ml_lg--0 ml_md--0 ml_sm--0">

        <!-- Start Photo Slider Area -->
        <div class="photo-slider-area pt--15 pb--25 pt_md--70 pt_sm--50 pb_md--10 pb_sm--10 pl--5 pr--15">

                    <!-- Start Single Slider -->
                    <div class="single-photo-slider-inner">
                        <div class="single-photo-slider">
                            <div class="text-wrapper">
                                <div class="text">
                                    <table class="table table-striped width-100%">
                                        <h1 class="heading heading-h1 font-reenie">{{ $judul }}</h1>
                                        <div class="card-body">
                                            <form action="{{ route('laporan') }}" method="GET">
                                                <div class="row mb--20" style="float: right">
                                                    Range Tanggal
                                                <div class="col-3">
                                                    <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" value="{{ isset($_GET['tanggal_awal']) ?$_GET['tanggal_awal'] : date('y-m-d') }}">
                                                </div>_
                                                <div class="col-3">
                                                    <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="{{ isset($_GET['tanggal_akhir']) ?$_GET['tanggal_akhir'] : date('y-m-d') }}">
                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i>Cari</button>
                                                    <a class="btn btn-dark" onclick="print()"><i class="fa fa-print"></i>Print</a>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th scope="col">Kode Transaksi</th>
                                                <th scope="col">Judul Buku</th>
                                                <th scope="col">Peminjam</th>
                                                <th scope="col">Tanggal Pinjam</th>
                                                <th scope="col">Tanggal Kembali</th>
                                                <th scope="col">Denda</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laporan as $item=>$us)
                                            <tr>
                                                <td>{{ $item+1 }}</td>
                                                <td>{{ $us->kode_transaksi }}</td>
                                                <td>{{ $us->buku->judul }}</td>
                                                <td>{{ $us->user->nama_user }}</td>
                                                <td>{{ $us->tgl_pinjam }}</td>
                                                <td>{{ $us->tgl_kembali }}</td>
                                                @if ($us->denda)
                                                    <td>Rp. {{ number_format($us->denda,0,',','.') }}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                <td>{{ $us->status }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Slider -->
        </div>
        <!-- End Photo Slider Area -->

    </main>
@endsection

@section('script')
<script>
    $("#tabel-data").DataTable();

    function print(){
      var tanggal_awal = $("#tanggal_awal").val()
      var tanggal_akhir = $("#tanggal_akhir").val()

      window.open(`{{ route('laporanPrint') }}?tanggal_awal=${tanggal_awal}&tanggal_akhir=${tanggal_akhir}`,`_blank`)
    }
</script>
@endsection