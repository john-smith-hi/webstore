@extends('admin.layouts.frame')
@section('pagename')
Biến toàn cục
@endsection
@section('action')
Thêm
@endsection
@section('linkpagename')
{{route('admin.global_var.index')}}
@endsection
@section('content')
@include('alert')
<form method="POST" action="{{ route('admin.global_var.store') }}">
    @csrf
    @php
        $name = '';
        $value = '';
        $note = '';
        if(!empty(old('name'))){
          $name = old('name');
          $value = old('value');
          $note = old('note');
        }
    @endphp
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Tên biến</label><span style="color: red">(*)</span>
        <input name="name" type="text" class="form-control" placeholder="ADMIN_PAGE_SITE" required value="{{$name}}">
      </div>
      <div class="form-group col-md-6">
        <label>Giá trị</label><span style="color: red">(*)</span>
        <input name="value" type="text" class="form-control" placeholder="0" required value="{{$value}}">
      </div>
      <div class="form-group col-md-12">
        <label>Ghi chú</label><span style="color: red">(*)</span>
        <input name="note" type="text" class="form-control" placeholder="0:Đóng/1:Mở" required value="{{$note}}">        
      </div>
      <div class="form-group col-md-12">
        <button class="btn btn-primary">Thêm</button>
      </div>
    </div>
</form>
@endsection