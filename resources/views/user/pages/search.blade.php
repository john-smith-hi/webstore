@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
    <form action="{{route('user.search')}}">
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Giá tiền</h5>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input"
                            @if(empty($price))
                                {{'checked'}}
                            @endif
                            id="price-all" name="price" value="">
                            <label class="custom-control-label" for="price-all">Tất cả</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input"
                            @if(!empty($price) && $price=='0-50000')
                                {{'checked'}}
                            @endif
                            id="price-1" name="price" value="0-50000">
                            <label class="custom-control-label" for="price-1">0 đ - 50.000 đ</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input"
                            @if(!empty($price) && $price=='50000-500000')
                                {{'checked'}}
                            @endif
                            id="price-2" name="price" value="50000-500000">
                            <label class="custom-control-label" for="price-2">50.000 đ - 500.000 đ</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input"
                            @if(!empty($price) && $price=='500000-1000000')
                                {{'checked'}}
                            @endif
                            id="price-3" name="price" value="500000-1000000">
                            <label class="custom-control-label" for="price-3">500.000 đ - 1.000.000 đ</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" 
                            @if(!empty($price) && $price=='1000000-5000000')
                                {{'checked'}}
                            @endif
                            id="price-4" name="price" value="1000000-5000000">
                            <label class="custom-control-label" for="price-4">1.000.000 đ - 5.000.000 đ</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="radio" class="custom-control-input" 
                            @if(!empty($price) && $price=='5000000-')
                                {{'checked'}}
                            @endif
                            id="price-5" name="price" value="5000000-">
                            <label class="custom-control-label" for="price-5">>=5.000.000 đ</label>
                        </div>
                </div>
                <!-- Price End -->
                
                <!-- Category Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Danh mục</h5>
                        @php
                            use App\Models\Category;
                            $categories = Category::orderBy('id','desc')->where('parent_id',0)->get();
                        @endphp
                        @foreach($categories as $category)
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox"
                                @if(!empty($categories_search))
                                    @foreach ($categories_search as $category_search)
                                        @if($category_search == $category->slug)
                                            {{'checked'}}
                                        @endif
                                    @endforeach
                                @endif
                                class="custom-control-input" id="{{$category->slug}}" name="category[]" value="{{$category->slug}}">
                                <label class="custom-control-label" for="{{$category->slug}}">{{$category->name}}</label>
                            </div>
                        @endforeach
                </div>
                <!-- Category End -->

                <!-- Brand Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Thương hiệu</h5>
                        @php
                            use App\Models\Brand;
                            $brands = Brand::orderBy('id','desc')->get();
                        @endphp
                        @foreach($brands as $brand)
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input"
                            @if(!empty($brands_search))
                                @foreach ($brands_search as $brand_search)
                                    @if($brand_search == $brand->slug)
                                        {{'checked'}}
                                    @endif
                                @endforeach
                            @endif
                            id="{{$brand->slug}}" name="brand[]" value="{{$brand->slug}}">
                            <label class="custom-control-label" for="{{$brand->slug}}">{{$brand->name}}</label>
                        </div>
                        @endforeach
                </div>
                <!-- Brand End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name" value="@if(!empty($name)){{$name}}@endif">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            {{-- <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sắp xếp
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Mới nhất</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <button class="btn btn-primary">Tìm kiếm</button>
                        </div>
                        </form>
                    </div>
                    @php
                        use App\Helper\ProductHelper;
                    @endphp
                    @foreach($products as $product)
                        @php
                            $originPrice = ProductHelper::OriginPrice($product->id);
                            $isSaling = ProductHelper::IsSaling($product->id);
                            $slug = ProductHelper::Slug($product->id);
                            if($isSaling){
                                $realPrice = ProductHelper::RealPrice($product->id);
                            }
                            if(!empty($price)){
                                $prices = explode('-',$price);
                                $start_price = $prices[0];
                                $end_price = ($prices[1]=='') ? 99999999999 : $prices[1];
                                if(!$isSaling){
                                    //Start Not Saling
                                    if($start_price <= $originPrice && $end_price >= $originPrice){ @endphp
                                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                            <div class="card product-item border-0 mb-4">
                                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                    <img class="img-fluid w-100" src="{{ProductHelper::FirstImage($product->id)}}" alt="{{$product->name}}">
                                                </div>
                                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                    <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                                    <div class="d-flex justify-content-center">
                                                        <h6>{{number_format($originPrice, 0, ',','.').' đ'}}</h6>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-light border">
                                                    <a href="{{route('user.product.index',['slug'=>$slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                                                    <form action="{{route('user.cart.add')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        <button type="button" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                            @php        
                                    }
                                    //End Not Saling
                                }else{
                                    //Start Saling
                                    if($start_price <= $realPrice && $end_price >= $realPrice) { @endphp
                                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                            <div class="card product-item border-0 mb-4">
                                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                    <img class="img-fluid w-100" src="{{ProductHelper::FirstImage($product->id)}}" alt="{{$product->name}}">
                                                </div>
                                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                    <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                                    <div class="d-flex justify-content-center">
                                                        <h6>{{number_format($realPrice, 0, ',','.').' đ'}}</h6><h6 class="text-muted ml-2"><del>{{number_format($originPrice,0,',','.').' đ'}}</del></h6>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-light border">
                                                    <a href="{{route('user.product.index',['slug'=>$slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                                                    <form action="{{route('user.cart.add')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        <button onclick="this.form.submit();" type="button" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                            @php    }
                                    //End Saling
                                }
                            }else {
                                //Start Empty Price
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                            <div class="card product-item border-0 mb-4">
                                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                    <img class="img-fluid w-100" src="{{ProductHelper::FirstImage($product->id)}}" alt="{{$product->name}}">
                                                </div>
                                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                    <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                                    <div class="d-flex justify-content-center">
                                                        @if($isSaling)
                                                            <h6>{{number_format($realPrice, 0, ',','.').' đ'}}</h6><h6 class="text-muted ml-2"><del>{{number_format($originPrice,0,',','.').' đ'}}</del></h6>
                                                        @else
                                                            <h6>{{number_format($originPrice, 0, ',','.').' đ'}}</h6>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between bg-light border">
                                                    <a href="{{route('user.product.index',['slug'=>$slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                                                    <form action="{{route('user.cart.add')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        <button onclick="this.form.submit();" type="button" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                                    </form>
                                                </div>
                                            </div>
                                </div>
                            @php
                                //End Empty Price
                            }
                            @endphp
                    
                    @endforeach
                </div>
                {{$products->links()}}
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection