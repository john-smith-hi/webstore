@extends('admin.layouts.frame')
@section('pagename')
Đánh giá
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.product.index')}}
@endsection
@section('content')
<form action="{{route('admin.rating.index')}}" method="GET">
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
        <th scope="col">Đánh giá</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @if(!empty($ratings))
            @foreach ($ratings as $key => $rating)
            @php
                $user = $User->find($rating->user_id);
                $product = $Product->find($rating->product_id);
            @endphp
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        <a href="{{route('admin.account.update',['id'=>$rating->user_id])}}">
                            {{$user->first_name.' '.$user->last_name}}
                        </a>
                    </td>
                    <td>{{$user->tel}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('admin.product.update',['id'=>$rating->product_id])}}">
                            {{$product->name}}
                        </a>
                    </td>
                    <td>
                        <div class="stars">
                            <form action="{{route('admin.rating.edit',['id'=>$rating->id])}}" method="POST">
                              @csrf
                              <input @if($rating->rating==5) {{'checked'}} @endif class="star star-5" id="star-5-{{$key}}" type="radio" name="rating" value="5"/>
                              <label class="star star-5" for="star-5-{{$key}}"></label>
                              <input @if($rating->rating==4) {{'checked'}} @endif class="star star-4" id="star-4-{{$key}}" type="radio" name="rating" value="4"/>
                              <label class="star star-4" for="star-4-{{$key}}"></label>
                              <input @if($rating->rating==3) {{'checked'}} @endif class="star star-3" id="star-3-{{$key}}" type="radio" name="rating" value="3"/>
                              <label class="star star-3" for="star-3-{{$key}}"></label>
                              <input @if($rating->rating==2) {{'checked'}} @endif class="star star-2" id="star-2-{{$key}}" type="radio" name="rating" value="2"/>
                              <label class="star star-2" for="star-2-{{$key}}"></label>
                              <input @if($rating->rating==1) {{'checked'}} @endif class="star star-1" id="star-1-{{$key}}" type="radio" name="rating" value="1"/>
                              <label class="star star-1" for="star-1-{{$key}}"></label>
                                <button class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
                    </td>
                    <td>{{$DateHelper->ChangeTodmY($rating->created_at)}}</td>
                    <td>
                        <button class="btn btn-danger btnDelete" data-link="{{route('admin.rating.delete',['id'=>$rating->id])}}" data-title="Xóa đánh giá" data-body="Bạn có chắc muốn xóa ?">Xóa</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="col-md-12">
    {{ $ratings->links() }}
  </div>
@endsection