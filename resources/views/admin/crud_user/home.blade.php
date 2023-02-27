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
                                            <form action="{{ route('user') }}" method="get">
                                                <div class="row mb--20" style="float: right">
                                                    <div class="col-6">
                                                        <input type="text" class="form-control" name="id_user" id="id_user" value="{{ isset($_GET['id_user']) ?$_GET['id_user'] : '' }}" placeholder="Masukkan ID">
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
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">No Telp</th>
                                            <th colspan="3" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $item=>$us)
                                            <tr>
                                                <td>{{ $item+1 }}</td>
                                                <td>{{ $us->nama_user }}</td>
                                                <td>{{ $us->alamat }}</td>
                                                <td>{{ $us->email }}</td>
                                                <td>{{ $us->no_telp }}</td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#show{{ $us->id_user }}" data-bs-whatever="@getbootstrap">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                        @include('admin/crud_user/show')
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#edit{{ $us->id_user }}" data-bs-whatever="@getbootstrap">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                        @include('admin/crud_user/edit')
                                                    {{-- <a href="{{ route('edituser',$us->id_user) }}"></a> --}}
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#drop{{ $us->id_user }}" data-bs-whatever="@getbootstrap">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    @include('admin/crud_user/drop')
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