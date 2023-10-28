@extends('admin.layouts.frame')
@section('pagename')
Tài khoản
@endsection
@section('action')
Cập nhật
@endsection
@section('linkpagename')
{{route('admin.account.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.account.edit',['id'=>$user->id]) }}" enctype="multipart/form-data">
  <input type="hidden" name="id" value="{{$user->id}}">
    @csrf
    @php
        $tel = $user->tel;
        $email = $user->email;
        $first_name = $user->first_name;
        $last_name = $user->last_name;
        $address = $user->address;
        $avatar = $user->avatar;
        $gender = $user->gender;
        $role = $user->role;
        if(!empty(old('tel'))){
          $tel = old('tel');
          $email = old('email');
          $first_name = old('first_name');
          $last_name = old('last_name');
          $address = old('address');
          $gender = old('gender');
          $role = old('role');
        }
    @endphp
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Số điện thoại</label><span style="color: red">(*)</span>
        <input name="tel" type="number" required class="form-control" placeholder="Tel" value="{{$tel}}" required>
        @error('tel')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Email</label>
        <input name="email" type="email" required class="form-control" placeholder="Email" value="{{$email}}">
        @error('email')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Họ</label><span style="color: red">(*)</span>
        <input name="first_name" type="text" required class="form-control" placeholder="Họ" required value="{{$first_name}}">
        @error('first_name')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Tên</label><span style="color: red">(*)</span>
        <input name="last_name" type="text" required class="form-control" placeholder="Tên" required value="{{$last_name}}">
        @error('last_name')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-12">
        <label class="form-label" for="textAddress">Địa chỉ</label>
        <textarea name="address" class="form-control" rows="5">{{$address}}</textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Ảnh đại diện</label>
        <input name="avatar" type="file" class="form-control">
      </div>      
      <div class="form-group col-md-3">
        <label>Giới tính</label>
        <select name="gender" id="inputState" class="form-control">
          <option value="0">Nam</option>
          <option @if($gender == '1') {!!'selected'!!} @endif value="1">Nữ</option>
        </select>
        @error('gender')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-3">
        <label>Vai trò</label>
        <select name="role" id="inputState" class="form-control">
          <option value="0">Người dùng</option>
          <option @if($role == '2') {!!'selected'!!} @endif value="2">Nhân viên</option>
          <option @if($role == '1') {!!'selected'!!} @endif value="1">Quản trị viên</option>
        </select>
        @error('role')
          <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <img src="@if(!empty($avatar)) {{$avatar}} @endif" width="200" height="200" style="max-height: 200px" alt="Avatar" class="img-thumbnail">
      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
  </form>
@endsection