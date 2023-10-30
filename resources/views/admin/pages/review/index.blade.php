@extends('admin.layouts.frame')
@section('pagename')
Đánh giá
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.review.index')}}
@endsection
@section('content')
<form action="{{route('admin.review.index')}}" method="GET">
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
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Đánh giá</th>
        <th scope="col">Bình luận</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
        @php
            use App\Helper\RatingHelper;
        @endphp
        @if(!empty($reviews))
            @foreach ($reviews as $key => $review)
            @php
                $user = $User->find($review->user_id);
                $product = $Product->find($review->product_id);
            @endphp
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        <a href="{{route('admin.account.update',['id'=>$review->user_id])}}">
                            {{$user->first_name.' '.$user->last_name}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.product.update',['id'=>$review->product_id])}}">
                            {{$product->name}}
                        </a>
                    </td>
                    <td>
                        {{RatingHelper::printt($review->rating)}}
                    </td>
                    <td>{{$DateHelper->ChangeTodmY($review->created_at)}}</td>
                    <td>
                        <a href="{{route('admin.review.update',['id'=>$review->id])}}">
                            <button class="btn btn-success">Sửa</button>
                        </a>
                        <button class="btn btn-danger btnDelete" data-link="{{route('admin.review.delete',['id'=>$review->id])}}" data-title="Xóa đánh giá" data-body="Bạn có chắc muốn xóa ?">Xóa</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="col-md-12">
    {{ $reviews->links() }}
  </div>
@endsection