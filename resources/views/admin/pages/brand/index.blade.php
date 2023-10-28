@extends('admin.layouts.frame')
@section('pagename')
Thương hiệu
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.brand.index')}}
@endsection
@section('content')
<a href="{{ route('admin.brand.create') }}">
    <button type="button" class="btn btn-primary">Thêm</button>
</a> 
<form action="{{route('admin.brand.index')}}" method="GET">
<div class="row" style="margin-top: 20px">
        <div class="form-group col-md-4">
        <input name="search_query" type="text" class="form-control" placeholder="Tên, email, sđt, địa chỉ, mô tả" value="{{$search_query}}">
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
        <th scope="col">Địa chỉ</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @php
            use App\Helper\StringHelper;
        @endphp
        @if(!empty($brands))
            @foreach ($brands as $key => $brand)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <a href="{{ route('admin.brand.update', ['id' => $brand->id])}}">
                        {{ $brand->name}}
                    </a>
                </td>
                <td>{{ $brand->email }}</td>
                <td>{{ $brand->tel }}</td>
                <td>{{ StringHelper::DeleteFinalChars($brand->address, 10) }}</td>
                <td>{{ StringHelper::DeleteFinalChars($brand->description, 10)}}</td>
                <td>
                    <a href="{{ route('admin.brand.update', ['id' => $brand->id])}}">
                        <button type="button" class="btn btn-success">Sửa</button>
                    </a>
                    <button type="button" class="btn btn-danger btnDelete" data-link="{{route('admin.brand.delete',['id'=>$brand->id])}}" data-title="Xóa thương hiệu {{$brand->name}}" data-body="Bạn có chắc muốn xóa ?">Xóa</button>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
  </table>
<div class="col-md-6">
    {{$brands->links()}}
</div>
@endsection