<!-- New Products Start -->
@php
    use App\Helper\ProductHelper;
    use App\Models\Product;
    $new_products = Product::orderBy('id','asc')->take(env(' USER_HOME_NEW_PRODUCT_NUMBER ',12))->get();
@endphp
@if(!empty($new_products) && count($new_products)>0)
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới ra mắt</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($new_products as $new_product)
                @php
                    
                    $isSaling = ProductHelper::IsSaling($new_product->id);
                    $originPrice = ProductHelper::OriginPrice($new_product->id);
                    $realPrice = ($isSaling) ? ProductHelper::RealPrice($new_product->id) : '';
                    $firstImage = ProductHelper::FirstImage($new_product->id);
                @endphp
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <a href="{{route('user.product.index',['slug'=>$new_product->slug])}}">
                                <img class="img-fluid w-100" src="{{$firstImage}}" alt="">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <a href="{{route('user.product.index',['slug'=>$new_product->slug])}}">
                                <h6 class="text-truncate mb-3">{{$new_product->name}}</h6>
                            </a>
                            <div class="d-flex justify-content-center">
                                @if($isSaling)
                                    <h6>{{number_format($realPrice,0,',','.').' đ'}}</h6><h6 class="text-muted ml-2"><del>{{number_format($originPrice,0,',','.').' đ'}}</del></h6>
                                @else
                                    <h6>{{number_format($originPrice,0,',','.').' đ'}}</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('user.product.index',['slug'=>$new_product->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                            <form action="{{route('user.cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{$new_product->id}}">
                                <button onclick="this.form.submit();" type="button" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                            </form>
                            {{-- <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<!-- New Products End -->