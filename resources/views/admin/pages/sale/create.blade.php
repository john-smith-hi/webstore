@extends('admin.layouts.frame')
@section('pagename')
Khuyến mãi
@endsection
@section('action')
Thêm
@endsection
@section('linkpagename')
{{route('admin.sale.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.sale.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Chọn sản phẩm</label><span style="color: red">(*)Nhập và chọn</span>
            <input name="search_product_name" id="search_product_name" type="text" autocomplete="off" class="form-control" placeholder="Tên sản phẩm" value="{{old('search_product_name')}}">
            <input type="hidden" name="product_id" id="product_id" value="{{old('product_id')}}">
            <div class="search-ajax-result"></div>
            @error('product_id')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Giá sản phẩm</label>
            <input name="price" id="price" type="text" class="form-control" placeholder="Giá" readonly value="@if(!empty(old('price'))){{old('price')}} @else {!!'0'!!} @endif">
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            <label>Ngày bắt đầu khuyến mãi</label><span style="color: red">(*)</span>
            <input name="start_date" type="date" class="form-control" required value="{{old('start_date')}}">
            @error('start_date')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <label>Ngày kết thúc khuyến mãi</label><span style="color: red">(*)</span>
            <input name="finish_date" type="date" class="form-control" value="{{old('finish_date')}}">
            @error('finish_date')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-2 form-group">
            <label>Trạng thái</label>
            <select name="status" class="form-control">
                <option value="0">Đóng</option>
                <option @if(!empty(old('status')) && old('status')=='1') {!!'selected'!!} @endif value="1">Mở</option>
            </select>
            @error('status')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <h4>Giảm giá</h4><span style="color: red">*Chỉ được chọn 1 trong 2, cái còn lại sẽ là 0</span>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            <label>Giảm theo phần trăm giá sản phẩm</label>
            <input type="number" name="sale_percent" id="sale_percent" required value="0"><strong> %</strong>
            <label> - Giá tiền </label>
            <label id="total_percent"></label><strong> đ</strong>
            @error('sale_percent')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <label>Giảm theo giá tiền sản phẩm</label>
            <input type="number" name="sale_price" id="sale_price" required value="0"><strong> đ</strong>
            <label> - Giá tiền </label>
            <label id="total_price"></label><strong> đ</strong>
            @error('sale_price')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </div>
  </form>
@endsection