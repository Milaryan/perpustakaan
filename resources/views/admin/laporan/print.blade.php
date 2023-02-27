<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="{{ csrf_token() }}">
    <title>Admin | {{ $judul }}</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
  <link rel="stylesheet" href= "{{ asset('plugins/fontawesome-free/css/all.min.css') }}" >
  {{-- Toastr --}}
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href= "{{ asset('dist/css/adminlte.min.css') }}" >
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body>
  <h1 style="text-align: center" class="mb-5">TABEL LAPORAN</h1>
  <h1 style="text-align: center" class="mb-5">PERPUSTAKAAN ONLINE</h1>
  @if ($tgl_awal && $tgl_akhir)
    <h3 style="text-align: center">Tanggal {{ $tgl_awal }} - {{ $tgl_akhir }}</h3>
  @else       
  @endif
  
    <table id="tabel-data" class="table table-bordered table-stripped table-responsive">
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
        @foreach($laporan as $item => $us)
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
</body>

<script>
    window.print()
    window.onfocus=function(){window.close()}
</script>

</html>