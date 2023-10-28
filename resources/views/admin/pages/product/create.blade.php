@extends('admin.layouts.frame')
@section('pagename')
Sản phẩm
@endsection
@section('action')
Thêm
@endsection
@section('linkpagename')
{{route('admin.product.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Tên</label><span style="color: red">(*)</span>
        <input name="name" type="text" class="form-control" placeholder="Tên" required value="{{old('name')}}">
        @error('name')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Giá</label><span style="color: red">(*) đ</span>
        <input name="price" type="number" class="form-control" placeholder="Giá" required value="{{ old('price')}}">
        @error('price')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-12">
        <label>Tổng quan</label>
        <textarea name="summary" class="form-control" rows="10" id="ckeditor1"></textarea>
      </div>
      <div class="form-group col-md-12">
        <label>Mô tả</label>
        <textarea name="description" class="form-control" rows="10" id="ckeditor2"></textarea>
      </div>
      <div class="form-group col-md-12">
        <label>Thông tin chi tiết</label>
        <textarea name="information" class="form-control" rows="10" id="ckeditor3"></textarea>
      </div>
      <div class="col-md-4">
        <label>Số lượng</label>
        <input name="quantity" type="number" class="form-control" placeholder="Số lượng" readonly value="0">
      </div>
      <div class="form-group col-md-4">
        <label>Danh mục</label><span style="color: red">(*)</span>
        <select name="category_id" class="form-control">
            <option value="0">Chưa chọn</option>
            @if(!empty($categories))
                @foreach($categories as $category)
                    <option 
                    @if(!empty(old('category_id')))
                      @if(old('category_id') == $category->id)
                        {!!'selected'!!}
                      @endif
                    @endif
                    value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            @endif
        </select>
        @error('price')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label>Thương hiệu</label><span style="color: red">(*)</span>
        <select name="brand_id" class="form-control">
          <option value="0">Chưa chọn</option>
            @if(!empty($brands))
                @foreach($brands as $brand)
                    <option
                    @if(!empty(old('brand_id')))
                      @if(old('brand_id') == $brand->id)
                        {!!'selected'!!}
                      @endif
                    @endif
                    value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            @endif
        </select>
        @error('price')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-3">
        <label>Kho</label><span style="color: red"> *Đóng : không cho nhập xuất kho</span>
        <select name="status_storage" class="form-control">
            <option value="0">Đóng</option>
            <option @if(old('status_storage') == 1) {!!'selected'!!} @endif value="1">Mở</option>
        </select>
        @error('price')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-3">
        <label>Bán hàng</label><span style="color: red"> *Đóng : không bán</span>
        <select name="status_sell" class="form-control">
            <option value="0">Đóng</option>
            <option @if(old('status_sell') == 1) {!!'selected'!!} @endif value="1">Mở</option>
        </select>
        @error('price')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
          <label>Ảnh minh họa</label><span style="color: red">*Có thể chọn nhiều file</span>
          <input name="images[]" type="file" class="form-control" multiple>
        </div>
      </div>
      <div class="form-group col-md-12">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control" placeholder="Ex: #quần #áo #giường #chiếu" value="{{old('tags')}}">
      </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
  </form>
@endsection