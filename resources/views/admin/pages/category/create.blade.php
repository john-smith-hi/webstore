@extends('admin.layouts.frame')
@section('pagename')
Danh mục
@endsection
@section('action')
Thêm
@endsection
@section('linkpagename')
{{route('admin.category.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.category.store') }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Tên</label><span style="color: red">(*)</span>
        <input name="name" type="text" class="form-control" placeholder="Tên" required value="{{old('name')}}">
        @error('name')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Danh mục cha</label><span style="color: red">(*)</span>
        <select name="parent_id" class="form-control">
            @if(!empty($categoriesParent))
              @if(count($categoriesParent)==0)
                <option selected value="0">Không có</option>
              @else
                <option selected value="0">Không chọn danh mục cha</option>
                @foreach($categoriesParent as $category)
                    <option @if(!empty(old('parent_id')))
                      @if(old('parent_id')==$category->id)
                        {!!'selected'!!}
                      @endif
                    @endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              @endif
            @endif
        </select>
        @error('parent_id')
            <span style="color: red">{{$message}}</span>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
    @include('alert')
    </div>
  </form>
@endsection