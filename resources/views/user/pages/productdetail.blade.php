@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    @php
                        use App\Helper\ProductHelper;
                        use App\Helper\RatingHelper;
                        use App\Models\Category;
                        use App\Models\Brand;
                        $category = Category::find($product->category_id);
                        $brand = Brand::find($product->brand_id);
                        $images = ProductHelper::AllImage($product->id);
                        $isSaling = ProductHelper::IsSaling($product->id);
                        $originPrice = ProductHelper::OriginPrice($product->id);
                        if($isSaling)
                            $realPrice = ProductHelper::RealPrice($product->id);

                        $ratingProduct = ProductHelper::Rating($product->id);
                    @endphp
                    @foreach($images as $key => $image)
                        <div class="carousel-item @if($key==0){{'active'}}@endif">
                            <img class="w-100" style="height:400px" src="{{$image->image}}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" style="background: white" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" style="background: white" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
            {{-- Rating --}}
            <div class="d-flex mb-3">
                {{-- <div class="text-primary mr-2">
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star"></span>
                    <span class="fas fa-star-half-alt"></span>
                    <span class="far fa-star"></span>
                </div> --}}
                {!!RatingHelper::printt($ratingProduct['rating'])!!}
                <span class="pt-1">{{number_format($ratingProduct['rating'],1,',','.')}} ({{$ratingProduct['count']}} Đánh giá)</span>
            </div>
            {{-- End rating  --}}
            @if($isSaling)
                <h3 class="font-weight-semi-bold mb-4">{{number_format($realPrice,0,'.',',').' đ'}}<del class="text-muted ml-2">{{number_format($originPrice,0,',','.').' đ'}}</del></h3>
            @else
                <h3 class="font-weight-semi-bold mb-4">{{number_format($originPrice,0,',','.').' đ'}}</h3>
            @endif
            <p>
                Danh mục : <a href="{{route('user.search').'?category[]='.$category->slug}}">{{$category->name}}</a>
                Thương hiệu : <a href="{{route('user.brand.detail',['slug'=>$brand->slug])}}">{{$brand->name}}</a>
            </p>
            <p class="mb-4">{!!$product->summary!!}</p>
            {{-- Size --}}
            {{-- <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                <form>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-1" name="size">
                        <label class="custom-control-label" for="size-1">XS</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-2" name="size">
                        <label class="custom-control-label" for="size-2">S</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-3" name="size">
                        <label class="custom-control-label" for="size-3">M</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-4" name="size">
                        <label class="custom-control-label" for="size-4">L</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-5" name="size">
                        <label class="custom-control-label" for="size-5">XL</label>
                    </div>
                </form>
            </div> --}}
            {{-- End size  --}}

            {{-- Color --}}
            {{-- <div class="d-flex mb-4">
                <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                <form>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-1" name="color">
                        <label class="custom-control-label" for="color-1">Black</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-2" name="color">
                        <label class="custom-control-label" for="color-2">White</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-3" name="color">
                        <label class="custom-control-label" for="color-3">Red</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-4" name="color">
                        <label class="custom-control-label" for="color-4">Blue</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-5" name="color">
                        <label class="custom-control-label" for="color-5">Green</label>
                    </div>
                </form>
            </div> --}}
            {{-- End color  --}}

            {{-- Cart --}}
            <form action="{{route('user.cart.add')}}" method="POST">
                @csrf
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="text" name="quantity" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng</button>
                </div>
            </form>
            {{-- End cart  --}}

            {{-- Buy Now Start --}}
            <a href="{{route('user.checkout.index').'?product_id[]='.$product->id.'&quantity[]=1'}}">
                <button class="btn btn-primary" style="background: #f9be0b"> Mua ngay</button>
            </a>
            {{-- Buy Now End  --}}

            {{-- Share  --}}
            {{-- <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div> --}}
            {{-- End share  --}}
        </div>
    </div>
    <div class="row px-xl-5">
        @php
            use App\Models\ProductReview;
            $productReviews = ProductReview::where('product_id',$product->id)->orderBy('id','desc');
        @endphp
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Thông tin</a>
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-3">Đánh giá ({{$productReviews->count()}})</a>
            </div>
            <div class="tab-content">
                {{-- Description  --}}
                <div class="tab-pane fade" id="tab-pane-1">
                    <h4 class="mb-3">Mô tả sản phẩm</h4>
                    <p>{!!$product->description!!}</p>
                </div>
                {{-- End Description --}}

                {{-- Info  --}}
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Thông tin chi tiết</h4>
                    <p>{!!$product->information!!}</p>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                </li>
                                <li class="list-group-item px-0">
                                    Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                </li>
                                <li class="list-group-item px-0">
                                    Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                </li>
                                <li class="list-group-item px-0">
                                    Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                </li>
                              </ul> 
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                </li>
                                <li class="list-group-item px-0">
                                    Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                </li>
                                <li class="list-group-item px-0">
                                    Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                </li>
                                <li class="list-group-item px-0">
                                    Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                </li>
                              </ul> 
                        </div>
                    </div> --}}
                </div>
                {{-- End Info  --}}

                {{-- Review  --}}
                <div class="tab-pane fade show active" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">{{$productReviews->count()}} phản hồi về "{{$product->name}}"</h4>
                            @php
                                $productReviews = $productReviews->paginate(env('USER_PAGINATE_PRODUCT_COMMENT_NUMBER'));
                                use App\Helper\DateHelper;
                                use App\Models\User;
                            @endphp
                            @foreach($productReviews as $productReview)
                                @php
                                    $user = User::find($productReview->user_id);
                                @endphp
                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6>{{$user->first_name.' '.$user->last_name}}<small> - <i>{{DateHelper::ChangeTodmY2($productReview->created_at)}}</i></small></h6>
                                        {{-- Rating  --}}
                                        {!!RatingHelper::printt($productReview->rating)!!}
                                        {{-- End rating  --}}
                                        <p>{{$productReview->comment}}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{$productReviews->links()}}
                        </div>
                        {{-- Submit review  --}}
                        
                            <div class="col-md-6">
                                <form method="POST" action="{{route('user.review.submit')}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <h4 class="mb-4">Đánh giá sản phẩm</h4>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Đánh giá </p><span style="color: red">(*)</span>
                                        <div class="stars">                              
                                              <input checked class="star star-5" id="star-5-0" type="radio" name="rating" value="5">
                                              <label class="star star-5" for="star-5-0"></label>
                                              <input class="star star-4" id="star-4-0" type="radio" name="rating" value="4">
                                              <label class="star star-4" for="star-4-0"></label>
                                              <input class="star star-3" id="star-3-0" type="radio" name="rating" value="3">
                                              <label class="star star-3" for="star-3-0"></label>
                                              <input class="star star-2" id="star-2-0" type="radio" name="rating" value="2">
                                              <label class="star star-2" for="star-2-0"></label>
                                              <input class="star star-1" id="star-1-0" type="radio" name="rating" value="1">
                                              <label class="star star-1" for="star-1-0"></label>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="message">Bình luận </label> <span style="color: red">(*)</span>
                                            @error('comment')
                                                <span style="color: red">{{$message}}</span>
                                            @enderror
                                            <textarea id="message" cols="30" rows="5" class="form-control" required name="comment"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Gửi" class="btn btn-primary px-3">
                                        </div>
                                </form>    
                            </div>
                        {{-- End submit review  --}}
                    </div>
                </div>
                {{-- End review  --}}
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->
{{-- Product Relative Start  --}}
@if(!empty($relativeProducts) && count($relativeProducts)>0)
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản phẩm liên quan</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach($relativeProducts as $relativeProduct)
            @php
                $image = ProductHelper::FirstImage($product->id);
                $isSaling = ProductHelper::IsSaling($relativeProduct->id);
                $originPrice = ProductHelper::OriginPrice($relativeProduct->id);
                if($isSaling)
                    $realPrice = ProductHelper::RealPrice($relativeProduct->id);
            @endphp
            <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="{{route('user.product.index',['slug'=>$relativeProduct->slug])}}">
                            <img class="img-fluid w-100" style="height: 200px" src="{{$image}}" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <a href="{{route('user.product.index',['slug'=>$relativeProduct->slug])}}">
                            <h6 class="text-truncate mb-3">{{$relativeProduct->name}}</h6>
                        </a>
                        <div class="d-flex justify-content-center">
                            @if($isSaling)
                                <h6>{{number_format($originPrice,0,',','.').' đ'}}</h6><h6 class="text-muted ml-2"></h6>
                            @else
                                <h6>{{number_format($realPrice,0,',','.').' đ'}}</h6><h6 class="text-muted ml-2"><del>{{number_format($originPrice,0,',','.').' đ'}}</del></h6>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{route('user.product.index',['slug'=>$relativeProduct->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <form action="{{route('user.cart.add')}}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="product_id" value="{{$relativeProduct->id}}">
                            <button onclick="this.form.submit();" type="button" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{$relativeProducts->links()}}
</div>
@endif
{{-- Product Relative End  --}}
@endsection