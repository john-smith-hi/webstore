@extends('admin.layouts.frame')
@section('pagename')
Nhập kho
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.storage.input.index')}}
@endsection
@section('content')
<div class="form-row">
    <div class="form-group">
        <a href="{{ route('admin.storage.input.create') }}">
            <button type="button" class="btn btn-primary">Thêm</button>
        </a>
    </div>
</div>
<form action="{{route('admin.storage.input.index')}}" method="GET">
    <div class="row" style="margin-top: 20px">
            <div class="form-group col-md-4">
                <label>Tên sản phẩm</label>
                <input name="product_name" type="text" class="form-control" placeholder="Tên" value="@if(!empty($product_name)){{$product_name}} @endif">
            </div>
            <div class="form-group col-md-4">
                <label>Ngày nhập từ ngày</label>
                <input name="start_date" type="date" class="form-control" value="{{$start_date}}">
            </div>
            <div class="form-group col-md-4">
                <label>Đến ngày</label>
                <input name="finish_date" type="date" class="form-control" value="{{$finish_date}}">
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
        <th scope="col">Tên</th>
        <th scope="col">Giá nhập</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Ngày nhập</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @if(!empty($inputStorages))
            @foreach ($inputStorages as $key => $inputStorage)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <a href="{{route('admin.product.update',['id'=>$inputStorage->product_id])}}">
                        {{$Product->find($inputStorage->product_id)->name}}
                    </a>
                </td>
                <td>{{ number_format($inputStorage->price,0,',','.') }} đ</td>
                <td>{{ $inputStorage->quantity }}</td>
                <td>
                    {{ $DateHelper->ChangeTodmY($inputStorage->created_at) }}
                </td>
                <td>
                    <a href="{{ route('admin.storage.input.update', ['id' => $inputStorage->id])}}">
                        <button type="button" class="btn btn-success">Sửa</button>
                    </a>
                        <button type="button" class="btn btn-danger btnDelete" data-link="{{route('admin.storage.input.delete', ['id' => $inputStorage->id])}}" data-title="Xóa nhập kho" data-body="Bạn có chắc muốn xóa ?">Xóa</button>
                    
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="col-md-12">
    {{ $inputStorages->links() }}
  </div>

@endsection