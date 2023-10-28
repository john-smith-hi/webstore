@extends('admin.layouts.frame')
@section('pagename')
Đơn hàng
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.order.index')}}
@endsection
@section('content')
<form action="{{route('admin.order.index')}}" method="GET">
<div class="row" style="margin-top: 20px">
        <div class="form-group col-md-4">
            <input name="search_query" type="text" class="form-control" placeholder="Tên, số điện thoại, email" value="@if(!empty($search_query)){{$search_query}}@endif">
        </div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Tìm kiếm</button>
        </div>
</div>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên khách hàng</th>
        <th scope="col">Email</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Ngày đặt</th>
        <th scope="col">Ngày giao</th>
        <th scope="col">Ngày nhận</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @php
            use App\Helper\DateHelper;
            use App\Helper\OrderHelper;
        @endphp
        @if(!empty($orders))
            @foreach ($orders as $key => $order)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        @if($order->user_id)
                            <a href="{{route('admin.account.update',['id'=>$order->user_id])}}">
                                {{$order->first_name.' '.$order->last_name}}
                            </a>
                        @else
                            {{$order->first_name.' '.$order->last_name}}
                        @endif
                    </td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->tel}}</td>
                    <td>{{number_format($order->total, 0, ',', '.')}} đ</td>
                    <td>{{DateHelper::ChangeTodmY2($order->order_date)}}</td>
                    <td>
                        @if(empty($order->delivery_date))
                            {!!''!!}
                        @else
                        {{DateHelper::ChangeTodmY2($order->delivery_date)}}
                        @endif
                    </td>
                    <td>
                        @if(empty($order->receive_date))
                            {!!''!!}
                        @else
                        {{DateHelper::ChangeTodmY2($order->receive_date)}}
                        @endif
                    </td>
                    <td>
                        {{OrderHelper::StatusName($order->status)}}
                    </td>
                    <td>
                        <a href="{{route('admin.order.update',['id'=>$order->id])}}">
                            <button class="btn btn-success">Sửa</button>
                        </a>
                        <button class="btn btn-danger btnDelete" data-link="{{route('admin.order.delete',['id'=>$order->id])}}" data-title="Xóa đơn hàng" data-body="Bạn có chắc muốn xóa ?">Xóa</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
<div class="col-md-6">
    {{$orders->links()}}
</div>
@endsection