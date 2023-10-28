@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Về chúng tôi</span></h2>
    </div>
    @php
        use App\Models\Aboutus;
        $aboutus = Aboutus::orderBy('id','desc')->first();
    @endphp
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-10">
            @if(!empty($aboutus))
                {!!$aboutus->text!!}
            @endif
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection