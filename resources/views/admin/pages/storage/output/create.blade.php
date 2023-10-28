@extends('admin.layouts.frame')
@section('pagename')
Xuất kho
@endsection
@section('action')
Thêm
@endsection
@section('linkpagename')
{{route('admin.storage.output.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.storage.output.store') }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Chọn sản phẩm</label><span style="color: red">(*)Nhập và chọn</span>
        <input name="search_product_name" id="search_product_name" type="text" autocomplete="off" class="form-control" placeholder="Tên sản phẩm" value="{{old('search_product_name')}}">
        <input type="hidden" name="product_id" id="product_id" value="{{old('product_id')}}">
        <div class="search-ajax-result">
            {{-- <div class="media">
                <div class="media-body">
                    <div>
                        Test
                    </div>
                </div>
            </div> --}}
        </div>
        @error('product_id')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
        <div class="form-group col-md-6">
            <label>Giá sản phẩm</label>
            <input name="origin_price" id="price" type="text" class="form-control" placeholder="Giá" readonly value="@if(!empty(old('origin_price'))){{old('origin_price')}}@else{!!'0'!!}@endif">
            @error('origin_price')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
      <div class="form-group col-md-6">
        <label>Số lượng xuất</label><span style="color: red">(*)</span>
        <input name="quantity" type="number" class="form-control" placeholder="Số lượng" required value="@if(!empty(old('quantity'))){{old('quantity')}}@else{!!'0'!!}@endif">
        @error('quantity')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Giá xuất</label><span style="color: red">(*)</span>
        <input name="price" type="number" class="form-control" placeholder="Giá xuất" required value="@if(!empty(old('price'))){{old('price')}} @else{!!'0'!!}@endif">
        @error('price')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
    
    @include('alert')
    </div>
  </form>
@endsection