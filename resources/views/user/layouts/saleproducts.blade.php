<!-- Sale Products Start -->
@php
    use App\Helper\ProductHelper;
    use App\Models\Product;
    use Illuminate\Support\Carbon;
    $sale_products = Product::join('sale_products', 'products.id','sale_products.product_id')
                                ->where('sale_products.start_date','<=',Carbon::now())
                                ->where('sale_products.finish_date','>=',Carbon::now())
                                ->select('products.*')
                                ->inRandomOrder()->take(env('USER_HOME_SALE_PRODUCT_NUMBER',12))->get();
@endphp
@if(!empty($sale_products) && count($sale_products)>0)
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm đang khuyến mãi</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($sale_products as $sale_product)
                @php
                    
                    $isSaling = ProductHelper::IsSaling($sale_product->id);
                    $originPrice = ProductHelper::OriginPrice($sale_product->id);
                    $realPrice = ($isSaling) ? ProductHelper::RealPrice($sale_product->id) : '';
                    $firstImage = ProductHelper::FirstImage($sale_product->id);
                @endphp
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{$firstImage}}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$sale_product->name}}</h6>
                            <div class="d-flex justify-content-center">
                                @if($isSaling)
                                    <h6>{{number_format($realPrice,0,',','.').' đ'}}</h6><h6 class="text-muted ml-2"><del>{{number_format($originPrice,0,',','.').' đ'}}</del></h6>
                                @else
                                    <h6>{{number_format($originPrice,0,',','.').' đ'}}</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('user.product.index',['slug'=>$sale_product->slug])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                            <form action="{{route('user.cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{$sale_product->id}}">
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
<!-- Sale Products End -->