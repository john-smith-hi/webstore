@extends('admin.layouts.frame')
@section('pagename')
Thương hiệu
@endsection
@section('action')
Thêm
@endsection
@section('linkpagename')
{{route('admin.brand.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Tên</label><span style="color: red">(*)</span>
        <input name="name" type="text" class="form-control" placeholder="Tên" required value="{{old('name')}}">
        @error('name')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label >Email</label>
        <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
        @error('email')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label >Số điện thoại</label>
        <input name="tel" type="number" class="form-control" placeholder="Số điện thoại" value="{{old('tel')}}">
        @error('tel')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-12">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control" rows="5" id="ckeditor">{{old('description')}}</textarea>
      </div>
      <div class="form-group col-md-12">
        <label >Địa chỉ</label>
        <input name="address" type="text" class="form-control" placeholder="Địa chỉ" value="{{old('address')}}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Ảnh đại diện</label>
        <input name="image" type="file" class="form-control" accept="image/*">
      </div>
      @error('image')
        <span style="color: red">{{$message}}</span>
      @enderror
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
  </form>
@endsection