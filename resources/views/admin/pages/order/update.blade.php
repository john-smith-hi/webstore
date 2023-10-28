@extends('admin.layouts.frame')
@section('pagename')
Đơn hàng
@endsection
@section('action')
Chi tiết-Sửa
@endsection
@section('linkpagename')
{{route('admin.order.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.order.edit', ['id'=>$order->id]) }}" enctype="multipart/form-data">
    @csrf
    @php
      $name = $order->first_name.' '.$order->last_name;
      $email = $order->email;
      $tel = $order->tel;
      $order_date = $order->order_date;
      $delivery_date = $order->delivery_date;
      $receive_date = $order->receive_date;
      $shipping_address = $order->shipping_address;
      $shipping_address2 = $order->shipping_address2;
      $note = $order->note;
      $status = $order->status;

      if(!empty(old('name'))){
        $name = old('name');
        $email = old('email');
        $tel = old('tel');
        $order_date = old('order_date');
        $delivery_date = old('delivery_date');
        $receive_date = old('receive_date');
        $shipping_address = old('shipping_address');
        $shipping_address2 = old('shipping_address2');
        $note = old('note');
        $status = old('status');
      }

    @endphp
    <div class="form-row">
      <div class="form-group col-md-4">
        @if($order->user_id)
        <label>Tên khách hàng</label><span style="color: red">*Click xem thông tin tài khoản</span>
        <a href="{{route('admin.account.update',['id'=>$order->user_id])}}" target="_blank">
            <input name="name" type="text" class="form-control" placeholder="Tên khách hàng" readonly value="{{$name}}" style="cursor: pointer">
        </a>
        @else
        <label>Tên khách hàng</label>
        <input name="name" type="text" class="form-control" placeholder="Tên khách hàng" readonly value="{{$name}}" style="cursor: pointer">
        @endif
      </div>
      <div class="form-group col-md-4">
        <label>Email</label>
        <input name="email" type="text" class="form-control" placeholder="Email" readonly value="{{$email}}">
      </div>
      <div class="form-group col-md-4">
        <label>Số điện thoại</label>
        <input name="tel" type="number" class="form-control" placeholder="Số điện thoại" readonly value="{{$tel}}">
      </div>
      <div class="form-group col-md-4">
        <label>Ngày đặt</label>
        <input name="order_date" type="date" class="form-control" placeholder="Ngày đặt" readonly value="{{$order_date}}">        
      </div>
      <div class="form-group col-md-4">
        <label>Ngày giao</label>
        <input name="delivery_date" type="date" class="form-control" placeholder="Ngày đặt" value="{{$delivery_date}}">
        @error('delivery_date')
            <span style="color: red">{{$message}}</span>
        @enderror        
      </div>
      <div class="form-group col-md-4">
        <label>Ngày nhận</label>
        <input name="receive_date" type="date" class="form-control" placeholder="Ngày nhận" value="{{$receive_date}}">
        @error('receive_date')
            <span style="color: red">{{$message}}</span>
        @enderror        
      </div>
      <div class="form-group col-md-12">
        <label>Địa chỉ giao hàng 1</label>
        <textarea name="shipping_address" class="form-control" rows="5">{{$shipping_address}}</textarea>
      </div>
      <div class="form-group col-md-12">
        <label>Địa chỉ giao hàng 2</label>
        <textarea name="shipping_address2" class="form-control" rows="5">{{$shipping_address2}}</textarea>
      </div>
      <div class="form-group col-md-12">
        <label>Ghi chú</label>
        <textarea name="note" class="form-control" rows="5">{{$note}}</textarea>
      </div>
      <div class="col-md-4">
        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="0">Chờ xử lý</option>
            <option @if($status=='1'){!!'selected'!!}@endif value="1">Đang giao hàng</option>
            <option @if($status=='2'){!!'selected'!!}@endif value="2">Đã giao hàng</option>
            <option @if($status=='3'){!!'selected'!!}@endif value="3">Hoàn thành</option>
            <option @if($status=='4'){!!'selected'!!}@endif value="4">Hủy</option>
        </select>
        @error('status')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
    <div class="col-md-12" style="margin-top: 20px">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá gốc</th>
                    <th scope="col">Khuyến mãi</th>
                    <th scope="col">Giá sau khuyến mãi</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            @if(!empty($orderProducts))
            <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($orderProducts as $key => $orderProduct)
                        @php
                            $product = new App\Models\Product();
                            $product = $product->find($orderProduct->product_id)->first();
                            $sum = $orderProduct->quantity*$orderProduct->final_price;
                            $total += $sum;
                        @endphp
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <a href="{{route('admin.product.update',['id'=>$orderProduct->product_id])}}">
                                    {{$product->name}}
                                </a>
                            </td>
                            <td>{{number_format($orderProduct->origin_price, 0, ',', '.')}} đ</td>
                            <td>
                              <a href="{{route('admin.sale.update',['id'=>$orderProduct->sale_id])}}">Click để xem chi tiết</a>
                            </td>
                            <td>{{number_format($orderProduct->final_price, 0, ',', '.')}} đ</td>
                            <td>{{$orderProduct->quantity}}</td>
                            <td>{{number_format($sum, 0, ',', '.')}} đ</td>
                        </tr>
                    @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-center"><strong>Tổng</strong></td>
                    <td>{{number_format($total, 0, ',', '.')}} đ</td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
    @include('alert')
    </div>
  </form>
@endsection