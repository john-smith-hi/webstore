@extends('admin.layouts.frame')
@section('pagename')
Bình luận
@endsection
@section('action')
Sửa
@endsection
@section('linkpagename')
{{route('admin.comment.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.comment.edit', ['id'=>$comment->id]) }}" enctype="multipart/form-data">
    @csrf
    @php
        $first_name = $comment->first_name;
        $last_name = $comment->last_name;
        $name = $first_name.' '.$last_name;
        $email = $comment->email;
        $tel = $comment->tel;
        $created_at = $DateHelper->ChangeTodmY($comment->created_at);
        $comment1 = $comment->comment;
        if(!empty(old('name'))){
          $name = old('name');
          $email = old('email');
          $tel = old('tel');
          $created_at = old('created_at');
          $comment1 = old('comment');
        }
    @endphp
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Tên khách hàng</label><span style="color: red">*Click xem thông tin tài khoản</span>
        <a href="{{route('admin.account.update',['id'=>$user->id])}}" target="_blank">
            <input name="name" type="text" class="form-control" placeholder="Tên khách hàng" readonly value="{{$name}}" style="cursor: pointer">
        </a>
      </div>
      <div class="form-group col-md-4">
        <label>Email</label>
        <input name="email" type="text" class="form-control" placeholder="Email" readonly value="{{$email}}">
      </div>
      <div class="form-group col-md-4">
        <label>Số điện thoại</label>
        <input name="tel" type="number" class="form-control" placeholder="Số điện thoại" readonly value="{{$tel}}">
      </div>
      <div class="form-group col-md-4">
        <label>Thời gian bình luận</label>
        <input name="created_at" type="text" class="form-control" placeholder="Thời gian bình luận" readonly value="{{$created_at}}">        
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Bình luận</label>
            <textarea name="comment" class="form-control" rows="5">{{$comment1}}</textarea>
            @error('comment')
              <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-primary">Cập nhật</button>
        </div>
    </div>
  </form>
@endsection