@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-9 table-responsive mb-5">
        <form action="{{route('user.cart.editmulti')}}" method="POST">
            @csrf
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        use App\Helper\ProductHelper;
                        use App\Models\Product;
                        $sum = 0;
                    @endphp
                    @if(!empty($carts))
                        @if($carts->count() !== 0)
                            @foreach($carts as $key => $cart)
                                <input type="hidden" name="product_id[]" id="" value="{{$cart->product_id}}">
                                @php
                                    $isSaling = (ProductHelper::IsSaling($cart->product_id));
                                    $originPrice = ProductHelper::OriginPrice($cart->product_id);
                                    $total = $cart->quantity*$originPrice;
                                    if($isSaling){
                                        $realPrice = ProductHelper::RealPrice($cart->product_id); 
                                        $total = $cart->quantity*$realPrice;
                                    }
                                    $sum += $total;
                                    $firstImage = ProductHelper::FirstImage($cart->product_id);
                                    $product = Product::find($cart->product_id);
                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class="align-middle">
                                        <a href="{{route('user.product.index',['slug'=>$product->slug])}}">
                                            <img src="{{$firstImage}}" alt="" style="width: 50px;"> {{$product->name}}
                                        </a>
                                    </td>
                                    @if($isSaling)
                                        <td class="align-middle">{{number_format($realPrice,0,',','.').' đ'}} <br><del>{{number_format($originPrice,0,',','.').' đ'}}</del></td>
                                    @else
                                        <td class="align-middle">{{number_format($originPrice,0,',','.').' đ'}}</td>
                                    @endif
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            {{-- <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus" >
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div> --}}
                                            <input type="number" name="quantity[]" data-key={{$key}} class="form-control form-control-sm bg-secondary text-center quantity_input" value="{{$cart->quantity}}">
                                            {{-- <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div> --}}
                                        </div>
                                    </td>
                                    <td class="align-middle">{{number_format($total,0,',','.').' đ'}}</td>
                                    <td class="align-middle">
                                        <form action="{{route('user.cart.delete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id_delete" value="{{$cart->product_id}}">
                                            <button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button>
                                        </form> 
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="align-middle" colspan="6">
                                    <button class="btn btn-primary">Cập nhật thay đổi số lượng</button>
                                </td>
                            </tr>
                        @else
                            <tr><td class="align-middle" colspan="6"><h3>Chưa có sản phẩm</h3></td></tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </form>
        </div>
        <div class="col-lg-3">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Giỏ hàng</h4>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold">{{number_format($sum,0,',','.').' đ'}}</h5>
                    </div>
                    @if($sum!==0)
                        <a href="{{route('user.checkout.allcart')}}">
                            <button class="btn btn-block btn-primary my-3 py-3">Đặt hàng</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection