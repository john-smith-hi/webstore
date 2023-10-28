@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
        <label style="color: red"><i>*Các trạng thái giao hàng : Chờ xử lý->Đang giao hàng->Đã giao hàng->Hoàn thành/Hủy. Chỉ được hủy đơn hàng ở Chờ xử lý hoặc Đang giao hàng</i></label>
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tổng đơn hàng</th>
                        <th>Thanh toán</th>
                        <th>Ngày đặt hàng</th>
                        <th>Ngày nhận</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết sản phẩm</th>
                        <th>Hủy đơn</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        use App\Helper\OrderHelper;
                        use App\Helper\DateHelper;
                    @endphp
                    @if(!empty($orders))
                        @if($orders->count() !== 0)
                            @foreach($orders as $key => $order)
                                @php
                                    
                                @endphp
                                <tr>
                                    <td class="align-center">{{$key+1}}</td>
                                    <td class="align-center">{{$order->first_name.' '.$order->last_name}}</td>
                                    <td class="align-center">{{$order->email}}</td>
                                    <td class="align-center">{{$order->tel}}</td>
                                    <td class="align-center">{{number_format($order->total,0,',','.').' đ'}}</td>
                                    <td class="align-center">{{OrderHelper::PaymentStatusName($order->status_payment)}}</td>
                                    <td class="align-center">{{DateHelper::ChangeTodmY2($order->order_date)}}</td>
                                    <td class="align-center">
                                        @if($order->receive_date)
                                            {{DateHelper::ChangeTodmY2($order->order_date)}}
                                        @endif
                                    </td>
                                    <td class="align-center"><b>{{OrderHelper::StatusName($order->status)}}</b></td>
                                    <td>
                                        <a href="{{route('user.order.index',['id'=>$order->id])}}">
                                            <button class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Chi tiết</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('user.order.delete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$order->id}}"> 
                                            <button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td class="align-middle" colspan="11"><h3>Chưa có đơn hàng nào</h3></td></tr>
                        @endif
                    @endif
                </tbody>
            </table>
        {{$orders->links()}}
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection