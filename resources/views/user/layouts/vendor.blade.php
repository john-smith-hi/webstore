<!-- Vendor Start -->
@php
    use App\Models\Brand;
    $brands = Brand::orderBy('id','desc')->get();
@endphp
@if(!empty($brands) && count($brands)>0)
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Các thương hiệu sản phẩm</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                
                    @foreach($brands as $brand)
                        <div class="vendor-item border p-4">
                            <a href="{{route('user.brand.detail',['slug'=>$brand->slug])}}">
                                <img src="{{$brand->image}}" alt="{{$brand->name}}" class="w-100">
                            </a>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!-- Vendor End -->