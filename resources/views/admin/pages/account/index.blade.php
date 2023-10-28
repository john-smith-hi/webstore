@extends('admin.layouts.frame')
@section('pagename')
Tài khoản
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.account.index')}}
@endsection
@section('content')
<a href="{{ route('admin.account.create') }}">
    <button type="button" class="btn btn-primary">Thêm</button>
</a> 
<form action="{{route('admin.account.index')}}" method="GET">
<div class="row" style="margin-top: 20px">
        <div class="form-group col-md-4">
            <input name="search_query" type="text" class="form-control" placeholder="Tên, số điện thoại, email" value="@if(!empty($search_query)){{$search_query}}@endif">
        </div>
        <div class="col-md-4">
            <select name="role" class="form-control">
                <option value="">Tất cả vai trò</option>
                <option @if($role=='0'){!!'selected'!!}@endif value="0">Khách hàng</option>
                <option @if($role==1){!!'selected'!!}@endif value="1">Quản trị viên</option>
                <option @if($role==2){!!'selected'!!}@endif value="2">Nhân viên</option>
            </select>
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
        <th scope="col">Email</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Vai trò</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @if(!empty($users))
            @foreach ($users as $key => $user)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <a href="{{ route('admin.account.update', ['id' => $user->id])}}">
                        {{ $user->first_name.' '.$user->last_name}}
                    </a>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->tel }}</td>
                <td>
                    {{$AccountHelper->RoleName($user->role)}}
                </td>
                <td>
                    <a href="{{ route('admin.account.update', ['id' => $user->id])}}">
                        <button type="button" class="btn btn-success">Sửa</button>
                    </a>
                    <button type="button" class="btn btn-danger btnDelete" data-link="{{ route('admin.account.delete', ['id' => $user->id])}}" data-title="Xóa tài khoản {{$user->first_name.' '.$user->last_name}}" data-body="Bạn có chắc muốn xóa ?">Xóa</button>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
  </table>
<div class="col-md-6">
    {{$users->links()}}
</div>
@endsection