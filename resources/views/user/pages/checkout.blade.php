@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Checkout Start -->
<form action="{{route('user.checkout.submit')}}" method="POST">
    @csrf
    @if(Auth::check())
        <input type="hidden" name="delete_cart" value="true">
    @endif
@php
    use Illuminate\Support\Facades\Auth;
    $first_name = '';
    $last_name = '';
    $email = '';
    $tel = '';
    $shipping_address = '';
    $shipping_address2 = '';
    $note = '';

    if(Auth::check()){
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $email = Auth::user()->email;
        $tel = Auth::user()->tel;
        $shipping_address = Auth::user()->address;
    }
    if(!empty(old('first_name'))){
        $first_name = old('first_name');
        $last_name = old('last_name');
        $email = old('email');
        $tel = old('tel');
        $shipping_address = old('shipping_address');
        $shipping_address2 = old('shipping_address2');
        $note = old('note');
    }
@endphp
<div class="container-fluid pt-5">
    @include('alert')
    <div class="row px-xl-5">
        <div class="col-lg-6">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Thông tin khách hàng</h4>
                <label style="color: red">(*) : Bắt buộc nhập</label>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Họ</label><span style="color: red">(*)</span>
                        <input class="form-control" type="text" placeholder="Nguyên Văn" name="first_name" required value="{{$first_name}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Tên</label><span style="color: red">(*)</span>
                        <input class="form-control" type="text" placeholder="A" name="last_name" required value="{{$last_name}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Email</label>@if(!Auth::check()){!!'<span style="color: red">(*)</span>'!!}@endif
                        <input class="form-control" type="email" placeholder="example@gmail.com" name="email" @if(Auth::check()){{'readonly'}}@endif required value="{{$email}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Số điện thoại</label><span style="color: red">(*)</span>
                        <input class="form-control" type="number" placeholder="+123 456 789" name="tel" required value="{{$tel}}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Địa chỉ</label><span style="color: red">(*)</span>
                        <input class="form-control" type="text" placeholder="123 Đường A Tp HCM" name="shipping_address" required value="{{$shipping_address}}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Đia chỉ 2</label>
                        <input class="form-control" type="text" placeholder="123 Đường A Tp HCM" name="shipping_address2" value="{{$shipping_address2}}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Ghi chú thêm</label>
                        <textarea class="form-control" rows="5" placeholder="VD : Sản phẩm có nhiều đồ dễ vỡ" name="note">{{$note}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Thông tin đơn hàng</h4>
                </div>
                {{-- Products Checkout Start  --}}
                @php
                    use App\Models\Product;
                    use App\Helper\ProductHelper;
                    $total = 0;
                @endphp
                @if(!empty($product_id_arr) && !empty($quantity_arr))
                    @foreach ($product_id_arr as $key => $product_id)
                        @php
                            $product = (!empty($product_id_arr[$key])) ? Product::where('id',$product_id_arr[$key])->first() : '';
                            $name = '';
                            $originPrice = '';
                            $realPrice = '';
                            $isSaling = false;
                            if(!empty($product)){
                                $name = $product->name;
                                $isSaling = ProductHelper::IsSaling($product_id_arr[$key]);
                                $originPrice = ProductHelper::OriginPrice($product_id_arr[$key]);
                                if($isSaling)
                                    $realPrice = ProductHelper::RealPrice($product_id_arr[$key]);
                            }
                            if($isSaling)
                                $sum = $realPrice*$quantity_arr[$key];
                            else 
                                $sum = $originPrice*$quantity_arr[$key];
                            $total += $sum
                        @endphp
                        <input type="hidden" name="product_id[]" value="{{$product_id_arr[$key]}}">
                        <input type="hidden" name="price[]" id="price" value="@if($isSaling){{$realPrice}}@else{{$originPrice}}@endif">
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">{{$name}}</h5>
                            <div class="d-flex justify-content-between">
                                <p> Đơn giá : 
                                    @if($isSaling)
                                        {{number_format($realPrice,0,',','.').' đ'}} <del>{{number_format($originPrice,0,',','.').' đ'}}</del>
                                    @else
                                        {{number_format($originPrice,0,',', '.').' đ'}}
                                    @endif
                                </p>
                                <p>
                                    <div class="input-group quantity mr-3" style="width: 130px;">
                                        <input type="text" name="quantity[]" class="form-control bg-secondary text-center" value="{{$quantity_arr[$key]}}">
                                    </div>
                                </p>
                                <p>{{number_format($sum,0,',','.').' đ'}}</p>
                            </div>
                            <hr class="mt-0">
                        </div>
                    @endforeach
                @endif
                {{-- Products Checkout End  --}}
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng giá tiền</h5>
                        <h5 class="font-weight-bold">
                            {{number_format($total,0,',','.').' đ'}}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Hình thức thanh toán</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment_method" checked id="none" value="none">
                            <label class="custom-control-label" for="none">Trả sau</label>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment_method" id="paypal" value="paypal">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment_method" id="internet_banking" value="internet_banking">
                            <label class="custom-control-label" for="internet_banking">Internet Banking</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment_method" id="vnpay" value="vnpay">
                            <label class="custom-control-label" for="vnpay">VnPay</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment_method" id="momo" value="momo">
                            <label class="custom-control-label" for="momo">Momo</label>
                        </div>
                    </div> --}}
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Checkout End -->
@endsection