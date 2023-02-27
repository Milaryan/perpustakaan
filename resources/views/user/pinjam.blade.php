@extends('user.partial.main')

@section('content')
<main class="page-content">

    <h1 class="text-center">Daftar Peminjaman</h1>
    <!-- Cart Page Start -->
    <div class="wishlist_area pt--70 pb--150">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="cart-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">
                                            Kode
                                            <a data-bs-toggle="modal" data-bs-target="#kode" data-bs-whatever="@getbootstrap">
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </a>
                                                @include('user.popup.kode')
                                        </th>
                                        <th class="pro-thumbnail">Sampul</th>
                                        <th class="pro-title">Judul</th>
                                        <th class="pro-quantity">Batas Kembali</th>
                                        <th class="pro-remove">Denda</th>
                                        <th class="pro-price">Status</th>
                                        <th class="pro-price" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $item)
                                        <tr>
                                            <td class="pro-price"><span>{{ $item->kode_transaksi }}</td>
                                            <td class="pro-thumbnail"><a href="{{ route('detail', $item->buku->judul) }}"><img src="{{ asset('img/sampul/'.$item->buku->sampul) }}"
                                                        alt="Product"></a></td>
                                            <td class="pro-title"><a href="{{ route('detail', $item->buku->judul) }}">{{ $item->buku->judul }}</a></td>
                                            <td class="pro-price"><span>{{ $item->bts_kembali }}</span></td>
                                            <td class="pro-price"><span>Rp. {{ number_format($item->denda, 0, ',', '.') }}</span></td>
                                            <td class="pro-price"><span>{{ $item->status }}</span></td>
                                            <td class="pro-price">
                                                <span>
                                                    <a data-bs-toggle="modal" data-bs-target="#show{{ $item->kode_transaksi }}" data-bs-whatever="@getbootstrap" class="btn btn-dark text-white">
                                                        Lihat
                                                    </a>
                                                    @include('user.popup.show')
                                                </span>
                                                @if ($item->status == 'Pending')
                                                    <span>
                                                        <td> <a data-bs-toggle="modal" data-bs-target="#confirm{{ $item->kode_transaksi }}" data-bs-whatever="@getbootstrap" class="btn btn-dark text-white">Batal</a>
                                                            @include('user.popup.batalconfirm')
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->


</main>
@endsection