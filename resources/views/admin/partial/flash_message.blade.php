{{-- Flash Message --}}
<div class="col-lg-14 align-items-center" style="float: right;">
    @if (session()->has('status'))
        @if (session()->get('status') === 'success')
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @else
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    @endif
</div>