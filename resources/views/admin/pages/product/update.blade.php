@extends('admin.layouts.frame')
@section('pagename')
Sản phẩm
@endsection
@section('action')
Cập nhật
@endsection
@section('linkpagename')
{{route('admin.product.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.product.edit', ['id'=>$product->id]) }}" enctype="multipart/form-data">
    @csrf
    @php
      //tags
      $tagText = '';
          foreach ($tags as $tag) {
            $tagText .= '#'.$tag->tag.' ';
          }

      $name = (!empty($product->name)) ? $product->name : '';
      $price = (!empty($product->price)) ? $product->price : 0;
      $summary = (!empty($product->summary)) ? $product->summary : 0;
      $description = (!empty($product->description)) ? $product->description : '';
      $information = (!empty($product->information)) ? $product->information : 0;
      $status_storage = (!empty($product->status_storage)) ? $product->status_storage : 0;
      $status_sell = (!empty($product->status_sell)) ? $product->status_sell : 0;

      if(!empty(old('name'))){
        $name = old('name');
        $price = old('price');
        $description = old('description');
        $tagText = old('tags');
        $status_storage = old('status_storage');
        $status_sell = old('status_sell');
      }

    @endphp
    <input type="hidden" value="{{$product->id}}" name="id">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Tên</label><span style="color: red">(*)</span>
        <input name="name" type="text" class="form-control" placeholder="Tên" required value="{{$name}}">
        @error('name')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Giá</label><span style="color: red">(*) đ</span>
        <input name="price" type="number" class="form-control" placeholder="Giá" required value="{{$price}}">
        @error('name')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-12">
        <label>Tổng quan</label>
        <textarea name="summary" class="form-control" rows="10" id="ckeditor1">{!!$summary!!}</textarea>
      </div>
      <div class="form-group col-md-12">
        <label>Mô tả</label>
        <textarea name="description" class="form-control" rows="10" id="ckeditor2">{!!$description!!}</textarea>
      </div>
      <div class="form-group col-md-12">
        <label>Thông tin chi tiết</label>
        <textarea name="information" class="form-control" rows="10" id="ckeditor3">{!!$information!!}</textarea>
      </div>
      <div class="form-group col-md-4">
        <label>Số lượng</label>
        <input name="quantity" type="number" class="form-control" placeholder="Số lượng tồn" readonly value="{{$quantity}}">        
      </div>
      <div class="form-group col-md-4">
        <label>Danh mục</label><span style="color: red">(*)</span>
        <select name="category_id" class="form-control">
            <option value="0">Chưa chọn</option>
            @if(!empty($categories))
                @foreach($categories as $category)
                    <option 
                    @if(!empty(old('category_id')))
                      @if(old('category_id')==$category->id)
                        {!!'selected'!!}
                      @endif
                    @else
                      @if($product->category_id==$category->id) 
                        {!!'selected'!!} 
                      @endif
                    @endif 
                    value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            @endif
        </select>
        @error('category_id')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-4">
        <label>Thương hiệu</label><span style="color: red">(*)</span>
        <select name="brand_id" class="form-control">
            <option value="0">Chưa chọn</option>
            @if(!empty($brands))
                @foreach($brands as $brand)
                    <option
                    @if(!empty(old('brand_id')))
                      @if(old('brand_id')==$category->id)
                        {!!'selected'!!}
                      @endif
                    @else
                      @if($product->brand_id==$brand->id) 
                        {!!'selected'!!} 
                      @endif
                    @endif
                    value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            @endif
        </select>
        @error('brand_id')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-3">
        <label>Kho</label><span style="color: red"> *Đóng : không cho nhập xuất kho</span>
        <select name="status_storage" class="form-control">
            <option value="0">Đóng</option>
            <option @if($status_storage == 1) {!!'selected'!!} @endif value="1">Mở</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Bán hàng</label><span style="color: red">  *Đóng : không bán</span>
        <select name="status_sell" class="form-control">
            <option value="0">Đóng</option>
            <option @if($status_sell == 1) {!!'selected'!!} @endif value="1">Mở</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control" placeholder="Ex: #quần #áo #giường #chiếu" value="{{$tagText}}">
      </div>
      <div class="form-group col-md-12">
        <label>Ảnh minh họa</label><span style="color: red">*Có thể chọn nhiều file</span>
        <input name="images[]" type="file" class="form-control" multiple="">
      </div>
      @foreach($images as $key => $image)
        <div class="form-group col-md-4">
          <img src="{{$image->image}}" alt="" width="300px" style="height: 200px">
            <div class="btn btn-danger btnDelete" data-link="{{route('admin.product.delete.image',['id'=>$image->id])}}" data-title="Xóa ảnh" data-body="Bạn có chắc muốn xóa ?">Xóa</div>
        </div>
      @endforeach
    <div class="col-md-12" style="margin-top: 20px">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
    @include('alert')
    </div>
  </form>
@endsection