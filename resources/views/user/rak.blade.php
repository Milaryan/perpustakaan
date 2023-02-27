@extends('user.partial.main')

@section('content')
<main class="page-content">

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
                                        <th class="pro-thumbnail">Sampul</th>
                                        <th class="pro-title">Judul</th>
                                        <th class="pro-title" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rak as $item)
                                        <tr>
                                            <td class="pro-thumbnail"><a href="{{ route('detail', $item->buku->id_buku) }}"><img src="{{ asset('img/sampul/'.$item->buku->sampul) }}"
                                                        alt="Product"></a></td>
                                            <td class="pro-title"><a href="{{ route('detail', $item->buku->id_buku) }}">{{ $item->buku->judul }}</a></td>
                                            @if ($item->buku->pdf_file)
                                            <td class="pro-addtocart"><button><a href="{{ route('baca', $item->buku->pdf_file) }}">Baca</a></button></td>
                                            @else
                                                <td class="pro-price">-</td>
                                            @endif
                                            <td>
                                                <form action="{{ route('drop', $item->id_rak) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="delete-btn"><i class="fas fa-times"></i></button>
                                                </form>
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