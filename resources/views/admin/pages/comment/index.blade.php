@extends('admin.layouts.frame')
@section('pagename')
Bình luận
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.comment.index')}}
@endsection
@section('content')
<form action="{{route('admin.comment.index')}}" method="GET">
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Chọn sản phẩm</label><span style="color: red">(*)Nhập và chọn</span>
        <input name="search_product_name" id="search_product_name" type="text" autocomplete="off" class="form-control" placeholder="Tên sản phẩm" value="{{$search_product_name}}">
        <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}">
        <div class="search-ajax-result">
            
        </div>
    </div>
    <div class="form-group col-md-1">
        <label>.</label>
        <button class="btn btn-success form-control">Tìm kiếm</button>
    </div>
</div>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên khách hàng</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Email</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Bình luận</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @if(!empty($comments))
            @foreach ($comments as $key => $comment)
                @php
                    $user = $User->find($comment->user_id);
                    $product = $Product->find($comment->product_id);
                @endphp
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        <a href="{{route('admin.account.update',['id'=>$comment->user_id])}}">
                            {{$comment->first_name.' '.$comment->last_name}}
                        </a>
                    </td>
                    <td>{{$comment->tel}}</td>
                    <td>{{$comment->email}}</td>
                    <td>
                        <a href="{{route('admin.product.update',['id'=>$comment->product_id])}}">
                            {{$product->name}}
                        </a>
                    </td>
                    <td>{{$StringHelper->DeleteFinalChars($comment->comment, 7)}}</td>
                    <td>{{$DateHelper->ChangeTodmY($comment->created_at)}}</td>
                    <td>
                        <a href="{{route('admin.comment.update',['id'=>$comment->id])}}">
                            <button class="btn btn-success">Sửa</button>
                        </a>
                        <button class="btn btn-danger btnDelete" data-link="{{route('admin.comment.delete',['id'=>$comment->id])}}" data-title="Xóa bình luận" data-body="Bạn có chắc muốn xóa ?">Xóa</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
<div class="col-md-6">
    {{$comments->links()}}
</div>
@endsection