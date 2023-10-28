@extends('admin.layouts.frame')
@section('pagename')
Khuyến mãi
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.sale.index')}}
@endsection
@section('content')
<a href="{{ route('admin.sale.create') }}">
    <button type="button" class="btn btn-primary">Thêm</button>
</a> 
<span style="color: red">Tại 1 thời điểm, 1 sản phẩm có nhiều khuyến mãi sẽ chọn khuyến mãi mới nhất</span>
<form action="{{route('admin.sale.index')}}" method="GET">
    <div class="row" style="margin-top: 20px">
            <div class="form-group col-md-4">
                <label>Tên sản phẩm</label>
                <input name="product_name" type="text" class="form-control" placeholder="Tên" value="@if(!empty($product_name)){{$product_name}} @endif">
            </div>
            <div class="form-group col-md-4">
                <label>Ngày bắt đầu</label><span style="color: red">*Bé hơn hoặc bằng ngày cần tìm</span>
                <input name="start_date" type="date" class="form-control" value="@if(!empty($start_date)){{$start_date}}@endif">
            </div>
            <div class="form-group col-md-4">
                <label>Ngày kết thúc</label><span style="color: red">*Lớn hơn hoặc bằng ngày cần tìm</span>
                <input name="finish_date" type="date" class="form-control" value="@if(!empty($finish_date)){{$finish_date}}@endif">
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
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Giá sản phẩm</th>
        <th scope="col">Giảm phần trăm</th>
        <th scope="col">Giảm giá tiền</th>
        <th scope="col">Ngày bắt đầu</th>
        <th scope="col">Ngày kết thúc</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @if(!empty($sales))
           @foreach ($sales as $key => $sale)
                @php
                    $product = $Product->find($sale->product_id)->first();
                @endphp
               <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$sale->name}}</td>
                    <td>{{number_format($sale->price,0,',','.')}} đ</td>
                    <td>
                        @if($sale->sale_percent != '0')
                            {{number_format($sale->price*(1-$sale->sale_percent/100), 0, ',','.')}} đ(- {{$sale->sale_percent}} %) 
                        @endif
                    </td>
                    <td>
                        @if($sale->sale_price != '0')
                            {{number_format($product->price - $sale->sale_price, 0, ',','.')}} đ (- {{number_format($sale->sale_price,0,',','.')}} đ)
                        @endif
                    </td>
                    <td>{{$DateHelper->ChangeTodmY2($sale->start_date)}}</td>
                    <td>{{$DateHelper->ChangeTodmY2($sale->finish_date)}}</td>
                    <td>
                        @if($sale->status == '1')
                            <button class="btn btn-primary">Mở</button>
                        @else
                            <button class="btn btn-secondary">Đóng</button>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.sale.update',['id'=>$sale->id])}}">
                            <button class="btn btn-success">Sửa</button>
                        </a>
                        <div type="button" class="btn btn-danger btnDelete" data-link="{{route('admin.sale.delete',['id'=>$sale->id])}}" data-title="Xóa khuyến mãi" data-body="Bạn có chắc muốn xóa ?">Xóa</div>
                    </td>
               </tr>
           @endforeach
        @endif
    </tbody>
  </table>
  <div class="col-md-12">
    {{ $sales->links() }}
  </div>
@endsection