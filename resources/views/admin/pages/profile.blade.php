@extends('admin.layouts.frame')
@section('pagename')
Thông tin cá nhân
@endsection
@section('action')
Cập nhật
@endsection
@section('linkpagename')
{{route('admin.profile.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
    @csrf
    @php
      $tel = Auth::user()->tel;
      $email = Auth::user()->email;
      $first_name = Auth::user()->first_name;
      $last_name = Auth::user()->last_name;
      $address = Auth::user()->address;
      $gender = Auth::user()->gender;
      if(!empty(old('tel'))){
        $tel = old('tel');
        $email = old('email');
        $first_name = old('first_name');
        $last_name = old('last_name');
        $address = old('address');
        $gender = old('gender');
      }
      $isMale = ($gender=='0') ? true : false;
    @endphp
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Số điện thoại</label><span style="color: red">(*)</span>
        <input name="tel" type="number" required class="form-control" placeholder="Tel" value="{{ $tel }}">
        @error('tel')
          <span style="color: red">*{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Email</label><span style="color: red">(*)</span>
        <input name="email" type="email" required class="form-control" placeholder="Email" value="{{ $email }}">
        @error('email')
          <span style="color: red">*{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Họ</label><span style="color: red">(*)</span>
        <input name="first_name" type="text" required class="form-control" required placeholder="Họ" value="{{ $first_name }}">
        @error('first_name')
          <span style="color: red">*{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Tên</label><span style="color: red">(*)</span>
        <input name="last_name" type="text" required class="form-control" required placeholder="Tên" value="{{ $last_name }}">
        @error('last_name')
          <span style="color: red">*{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-12">
        <label class="form-label" for="textAddress">Địa chỉ</label>
        <textarea name="address" class="form-control" rows="5">{{ $address }}</textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Ảnh đại diện</label>
        <input name="avatar" type="file" class="form-control" value="" accept="image/*">
        @error('avatar')
          <span style="color: red">*{{$message}}</span>
        @enderror
      </div>      
      <div class="form-group col-md-6">
        <label for="inputState">Giới tính</label>
        <select name="gender" id="inputState" class="form-control">
          <option value="0">Nam</option>
          <option @if(!$isMale) {!!'selected'!!} @endif value="1">Nữ</option>
        </select>
        @error('gender')
          <span style="color: red">*{{$message}}</span>
        @enderror
      </div>
      @if(!empty(Auth::user()->avatar))
      <div class="form-group col-md-6">
        <img src="{{Auth::user()->avatar}}" width="200" height="200" style="max-height: 200px" alt="Avatar" class="img-thumbnail">
      </div>
      @endif
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
    @include('alert')
    </div>
  </form>
@endsection