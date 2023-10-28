@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
{{-- Brand Start --}}
<div class="container pt-5">
    <div class="row">
        <div class="col-md-3">
            <img class="" src="{{$brand->image}}" alt="{{$brand->name}}" style="width:100%;height:auto">
        </div>
        <div class="col-md-9">
            <h3 class="font-weight-semi-bold">{{$brand->name}}</h3>
            @if(!empty($brand->address))<p class="mb-4">Địa chỉ : {{$brand->address}}</p>@endif
            @if(!empty($brand->email))<p class="mb-4">Email : {{$brand->email}}</p>@endif
            @if(!empty($brand->tel))<p class="mb-4">Số điện thoại : {{$brand->tel}}</p>@endif
            @if(!empty($brand->address))<p class="mb-4">{!!$brand->description!!}</p>@endif
        </div>
    </div>
</div>
@php
    use App\Helper\ProductHelper;
@endphp
@if(!empty($products))
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Các sản phẩm của {{$brand->name}}</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($products as $product)
            @php
                $image = (ProductHelper::FirstImage($product->id));
                $isSaling = (ProductHelper::IsSaling($product->id)) ? true : false;
                $originPrice = ProductHelper::originPrice($product->id);
                $realPrice = '';
                if($isSaling)
                    $realPrice = ProductHelper::RealPrice($product->id);
            @endphp
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{$image}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                        <div class="d-flex justify-content-center">
                            @if($isSaling)
                                <h6>{{number_format($realPrice,0,',','.').' đ'}}</h6><h6 class="text-muted ml-2"><del>{{number_format($originPrice, 0, ',', '.').' đ'}}</del></h6>
                            @else
                                <h6>{{number_format($originPrice,0,',','.').' đ'}}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{route('user.product.index',['slug'=>$product->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$products->links()}}
    </div>
@endif


{{-- Brand End --}}
@endsection