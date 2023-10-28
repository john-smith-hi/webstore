<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">@if(!empty($pagename)){{$pagename}}@endif</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{route('user.home')}}">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">@if(!empty($pagename)){{$pagename}}@endif</p>
        </div>
    </div>
</div>
<!-- Page Header End -->