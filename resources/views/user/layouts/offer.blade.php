<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        @php
            use App\Models\SaleProduct;
            use App\Models\Product;
            use Illuminate\Support\Carbon;
            $now = Carbon::now();
            $sales = SaleProduct::join('products','sale_products.product_id','products.id')->where('sale_products.start_date', '<=', $now)->where('sale_products.finish_date', '>=', $now);
        @endphp
        @if($sales->count()>=2)
            @php
                $sales = $sales->get();
            @endphp
            @foreach ($sales as $sale)
                @php
                    $sale_product = ($sale->sale_price!='0') ? number_format($sale->sale_price,0,',','.').' đ' : $sale->sale_percent.' %';
                @endphp
                <div class="col-md-6 pb-4">
                    <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                        <div class="position-relative" style="z-index: 1;">
                            <h5 class="text-uppercase text-primary mb-3">Giảm giá {{$sale_product}}</h5>
                            <h1 class="mb-4 font-weight-semi-bold">{{$sale->name}}</h1>
                            <a href="#" class="btn btn-outline-primary py-md-2 px-md-3">Mua ngay</a>
                        </div>
                    </div>
                </div> 
            @endforeach
        @endif
    </div>
</div>
<!-- Offer End -->