@extends('admin/partial/main')

@section('content')    
    <main class="page-content ml--100 ml_lg--0 ml_md--0 ml_sm--0">

        <!-- Start Photo Slider Area -->
        <div class="photo-slider-area pt--15 pb--25 pt_md--70 pt_sm--50 pb_md--10 pb_sm--10 pl--5 pr--15">

                    <!-- Start Single Slider -->
                    <div class="single-photo-slider-inner">
                        <div class="single-photo-slider">
                            <div class="text-wrapper">
                                <div class="text">
                                    <table class="table table-striped width-100%">
                                    @include('admin.partial.flash_message')
                                    <h1 class="heading heading-h1 font-reenie">{{ $judul }}</h1>
                                        <div class="card-body">
                                            <form action="{{ route('transaksi') }}" method="get">
                                                <div class="row mb--20" style="float: right">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" name="kode" id="kode" value="{{ isset($_GET['kode']) ?$_GET['kode'] : ''}}" placeholder="Masukkan Kode">
                                                    </div>
                                                    <div class="col-5">
                                                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i>Cari</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <thead>
                                            <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Kode Transaksi</th>
                                            <th scope="col">Nama User</th>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Denda</th>
                                            <th scope="col">Status</th>
                                            <th colspan="4" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trans as $item=>$us)
                                            <tr>
                                                <td>{{ $item+1 }}</td>
                                                <td>{{ $us->kode_transaksi }}</td>
                                                <td>{{ $us->user->nama_user }}</td>
                                                <td>{{ $us->buku->judul }}</td>
                                                @if ($us->status === 'Pinjam')
                                                    <td>-</td>
                                                @else
                                                <td>Rp. {{ number_format($us->denda, 0, ',', '.') }}</td>
                                                @endif
                                                <td>{{ $us->status }}</td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#show{{ $us->id_transaksi }}" data-bs-whatever="@getbootstrap">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                        @include('admin/crud_transaksi/show')
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#edit{{ $us->id_transaksi }}" data-bs-whatever="@getbootstrap">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                        @include('admin/crud_transaksi/edit')
                                                    {{-- <a href="{{ route('edittransaksi',$us->id_transaksi) }}"></a> --}}
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#drop{{ $us->id_transaksi }}" data-bs-whatever="@getbootstrap">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    @include('admin/crud_transaksi/drop')
                                                </td>
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