@extends('admin.layouts.frame')
@section('pagename')
Sản phẩm
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.product.index')}}
@endsection
@section('content')
<a href="{{ route('admin.product.create') }}">
    <button type="button" class="btn btn-primary">Thêm</button>
</a> 
<form action="{{route('admin.product.index')}}" method="GET">
    <div class="row" style="margin-top: 20px">
            <div class="form-group col-md-4">
                <input name="search_query" type="text" class="form-control" placeholder="Tên" value="{{$search_query}}">
            </div>
            <div class="form-group col-md-1">
                <button type="submit" class="btn btn-success form-control">Tìm kiếm</button>
            </div>
    </div>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng tồn</th>
        <th scope="col">Liên kết</th>
        <th scope="col">Trạng thái bán hàng</th>
        <th scope="col">Trạng thái kho</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @php
            $isOpen = true;
            use App\Helper\StorageHelper;
        @endphp
        @if(!empty($products))
            @foreach ($products as $key => $product)
            @php 
                $isOpenSell = ($product->status_sell==1) ? true : false; 
                $isOpenStorage = ($product->status_storage==1) ? true : false; 
            @endphp
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <a href="{{ route('admin.product.update', ['id' => $product->id])}}">
                        {{$product->name}}
                    </a>
                </td>
                <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                <td>{{ StorageHelper::Quantity($product->id) }}</td>
                <td>
                    <a href="{{route('admin.sale.index').'?product_name='.$product->name}}">Khuyến mãi</a>-
                    <a href="{{route('admin.review.index').'?product_id='.$product->id}}">Đánh giá</a>-
                    <a href="{{route('admin.storage.input.index', ['product_id'=>$product->id])}}">Nhập kho</a>-
                    <a href="{{route('admin.storage.output.index', ['product_id'=>$product->id])}}">Xuất kho</a>
                </td>
                <td class="text-center">
                    @if($isOpenSell)
                        <button type="button" class="btn btn-primary">Mở</button>
                    @else
                        <button type="button" class="btn btn-secondary">Đóng</button>
                    @endif
                </td>
                <td class="text-center">
                    @if($isOpenStorage)
                        <button type="button" class="btn btn-primary">Mở</button>
                    @else
                        <button type="button" class="btn btn-secondary">Đóng</button>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.product.update', ['id' => $product->id])}}">
                        <button type="button" class="btn btn-success">Sửa</button>
                    </a>
                    
                        <div type="button" class="btn btn-danger btnDelete" data-link="{{ route('admin.product.delete', ['id' => $product->id])}}" data-title="Xóa sản phẩm {{$product->name}}" data-body="Bạn có chắc muốn xóa ?">Xóa</div>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="col-md-12">
    {{ $products->links() }}
  </div>
@endsection