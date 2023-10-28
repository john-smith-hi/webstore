@extends('admin.layouts.frame')
@section('pagename')
Thương hiệu
@endsection
@section('action')
Cập nhật
@endsection
@section('linkpagename')
{{route('admin.brand.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.brand.edit', ['id'=>$brand->id]) }}" enctype="multipart/form-data">
    @csrf
    @php
      $name = '';
      $email = '';
      $tel = '';
      $description = '';
      $address = '';
      $image = '';
      if(!empty($brand->name)){
        $name = $brand->name;
        $email = $brand->email;
        $tel = $brand->tel;
        $description = $brand->description;
        $address = $brand->address;
        $image = $brand->image;
      }
      if(!empty(old('name'))){
        $name = old('name');
        $email = old('email');
        $tel = old('tel');
        $description = old('description');
        $address = old('address');
      }
    @endphp
    <div class="form-row">
      <input type="hidden" value="{{$brand->id}}" name="id">
      <div class="form-group col-md-4">
        <label>Tên</label><span style="color: red">(*)</span>
        <input name="name" type="text" class="form-control" placeholder="Tên" required value="{{$name}}">
        @error('name')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label >Email</label>
        <input name="email" type="email" class="form-control" placeholder="Email" value="{{$email}}">
        @error('email')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label >Số điện thoại</label>
        <input name="tel" type="number" class="form-control" placeholder="Số điện thoại" value="{{$tel}}">
        @error('tel')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-12">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control" rows="5" id="ckeditor">{{$description}}</textarea>
      </div>
      <div class="form-group col-md-12">
        <label >Địa chỉ</label>
        <input name="address" type="text" class="form-control" placeholder="Địa chỉ" value="{{$address}}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Ảnh đại diện</label>
        <input name="image" type="file" class="form-control">
      </div>
      @error('image')
        <span style="color: red">{{$message}}</span>
      @enderror
    </div>
    @if(!empty($brand->image))
      <div class="form-group col-md-6">
        <img src="{{$image}}" width="200" height="200" style="max-height: 200px" alt="Avatar" class="img-thumbnail">
      </div>
    @endif
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
  </form>
@endsection