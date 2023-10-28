@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Checkout Start -->
<form action="{{route('user.profile.edit')}}" method="POST">
    @csrf
    @php
        use Illuminate\Support\Facades\Auth;
        $first_name = '';
        $last_name = '';
        $gender = 0;
        $email = '';
        $tel = '';
        $address = '';
        if(Auth::check()){
            $user = Auth::user();
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $gender = $user->gender;
            $email = $user->email;
            $tel = $user->tel;
            $address = $user->address;
        }
        if(!empty(old('first_name'))){
            $first_name = old('first_name');
            $last_name = old('last_name');
            $gender = old('gender');
            $email = old('email');
            $tel = old('tel');
            $address = old('address');
        }
    @endphp
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            @include('alert')
            <div class="mb-4">
                <label style="color: red"><i>*Thông tin được cung cấp bên dưới sẽ tự động điền vào mỗi đơn đặt hàng</i></label>
                <label style="color: red">(*) : bắt buộc nhập</label>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Họ</label><span style="color: red">(*)</span>
                        <input class="form-control" type="text" placeholder="Nguyên Văn" name="first_name" value="{{$first_name}}" required>
                        @error('first_name')
                            <span style="color: red">*{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Tên</label><span style="color: red">(*)</span>
                        <input class="form-control" type="text" placeholder="A" name="last_name" value="{{$last_name}}" required>
                        @error('last_name')
                            <span style="color: red">*{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Giới tính</label>
                        <select name="gender" class="form-control" id="" name="gender">
                            <option value="0">Nam</option>
                            <option @if($gender=='1'){{'checked'}}@endif value="1">Nữ</option>
                        </select>
                        @error('gender')
                            <span style="color: red">*{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" placeholder="example@gmail.com" name="email" value="{{$email}}" required readonly>
                        @error('email')
                            <span style="color: red">*{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="number" placeholder="123 456 789" name="tel" value="{{$tel}}" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" placeholder="123 Đường A Tp HCM" name="address" value="{{$address}}" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Cập nhật</button>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
</form>
<!-- Checkout End -->
@endsection