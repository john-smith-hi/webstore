@extends('admin.layouts.frame')
@section('pagename')
Danh mục
@endsection
@section('action')
Cập nhật
@endsection
@section('linkpagename')
{{route('admin.category.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.category.edit', ['id'=>$category->id]) }}">
    @csrf
    @php
      $name = (!empty($category->name)) ? $category->name : '';
      if(!empty(old('name'))) $name = old('name');
    @endphp
    <input type="hidden" value="{{$category->id}}" name="id">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Tên</label>
        <input name="name" type="text" class="form-control" placeholder="Tên" required value="{{$name}}">
      </div>
      <div class="form-group col-md-6">
        <label>Danh mục cha</label>
        <select name="parent_id" class="form-control">
            @if(!empty($categoriesParent))
                @if(count($categoriesParent)==0)
                  <option value="0">Không có</option>
                @else
                  <option value="0">Không chọn danh mục cha</option>
                  @foreach($categoriesParent as $categoryParent)
                      @if($categoryParent->id !== $category->id)
                        <option @if($category->parent_id == $categoryParent->id) {!!'selected'!!} @endif value="{{$categoryParent->id}}">{{$categoryParent->name}}</option>
                      @endif
                  @endforeach
                @endif
            @endif
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <div type="button" class="btn btn-danger btnDelete" data-link="{{ route('admin.category.delete', ['id'=>$category->id]) }}" data-title="Xóa {{$category->name}}" data-body="Bạn có chắc muốn xóa ?">Xóa</div>
    @include('alert')
    </div>
  </form>
@endsection