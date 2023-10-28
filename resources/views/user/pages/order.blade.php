@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Giá gốc</th>
                        <th>Giá khuyến mãi</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        use App\Helper\ProductHelper;
                    @endphp
                    @if(!empty($products))
                        @if($products->count() !== 0)
                            @foreach($products as $key => $product)
                                @php
                                    $total_row = $product->final_price*$product->quantity;
                                @endphp
                                <tr>
                                    <td class="align-center">{{$key+1}}</td>
                                    <td>
                                        <a href="{{route('user.product.index',['slug'=>$product->slug])}}">
                                            <img src="{{ProductHelper::FirstImage($product->id)}}" alt="" style="width:50px">
                                            {{$product->name}}
                                        </a>
                                    </td>
                                    <td class="align-center">{{number_format($product->origin_price,0,',','.').' đ'}}</td>
                                    <td class="align-center">{{number_format($product->final_price,0,',','.').' đ'}}</td>
                                    <td class="align-center">{{$product->quantity}}</td>
                                    <td class="align-center">{{number_format($total_row,0,',','.').' đ'}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="align-center" colspan="6"><h3>Tổng tiền đơn hàng : {{number_format($total,0,',','.').' đ'}}</h3></td>
                            </tr>
                        @else
                            <tr><td class="align-middle" colspan="6"><h3>Chưa có đơn hàng nào</h3></td></tr>
                        @endif
                    @endif
                </tbody>
            </table>
        {{$products->links()}}
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection