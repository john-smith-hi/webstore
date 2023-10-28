@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Brand List Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Danh sách các thương hiệu</span></h2>
    </div>
    @php
        use App\Models\Brand;
        $brands = Brand::orderBy('id','desc')->paginate(env('USER_SEARCH_RESULT_PRODUCT',10));
    @endphp
    <div class="row px-xl-5 pb-3">
        @if(!empty($brands))
            @foreach($brands as $brand)
            <a href="{{route('user.brand.detail',['slug'=>$brand->slug])}}">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="" src="{{$brand->image}}" alt="{{$brand->name}}" style="width:100%;height:200px">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$brand->name}}</h6>
                        </div>
                        <div class="card-footer text-center bg-light border">
                            <a href="{{route('user.brand.detail',['slug'=>$brand->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem thông tin</a>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        @endif
    </div>
    <div class="row col-md-12">
        {{$brands->links()}}
    </div>
</div>
<!-- Brand List End -->

@endsection