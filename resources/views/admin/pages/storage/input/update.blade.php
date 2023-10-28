@extends('admin.layouts.frame')
@section('pagename')
Nhập kho
@endsection
@section('action')
Cập nhật
@endsection
@section('linkpagename')
{{route('admin.storage.input.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.storage.input.edit',['id'=>$inputStorage]) }}">
    @csrf
    @php
      $product = $Product->find($inputStorage->product_id);
      $search_product_name = $product->name;
      $product_id = $inputStorage->product_id;
      $origin_price = $product->price;
      $quantity = $inputStorage->quantity;
      $price = $inputStorage->price;
      if(!empty(old('search_product_name'))){
        $search_product_name = old('search_product_name');
        $product_id = old('product_id');
        $origin_price = old('origin_price');
        $quantity = old('quantity');
        $price = old('price');
      }

    @endphp
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Chọn sản phẩm</label><span style="color: red">(*)Nhập và chọn</span>
        <input name="search_product_name" id="search_product_name" type="text" autocomplete="off" class="form-control" placeholder="Tên sản phẩm" value="{{$search_product_name}}">
        <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}">
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
            <input name="origin_price" id="price" type="text" class="form-control" placeholder="Giá" readonly value="{{$origin_price}}">
            @error('origin_price')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
      <div class="form-group col-md-6">
        <label>Số lượng nhập</label>
        <input name="quantity" type="number" class="form-control" placeholder="Số lượng" required value="{{$quantity}}">
        @error('origin_price')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Giá nhập</label>
        <input name="price" type="number" class="form-control" placeholder="Giá nhập" required value="{{$price}}">
        @error('origin_price')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
    @include('alert')
    </div>
  </form>
@endsection