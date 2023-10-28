@extends('admin.layouts.frame')
@section('pagename')
Slide
@endsection
@section('action')
Thêm-Xóa
@endsection
@section('linkpagename')
{{route('admin.slide.index')}}
@endsection
@section('content')
<form method="POST" action="{{ route('admin.slide.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Ảnh</label><span style="color: red">(*)</span>
        <input name="slide" type="file" class="form-control" required accept="image/*">
        @error('slide')
          <span style="color: red">*{{$message}}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label>Link</label><span style="color: red">(*)</span>
        <input name="link" type="text" class="form-control" placeholder="http://example.com" required value="{{old('link')}}">
        @error('link')
          <span style="color: red">*{{$message}}</span>
        @enderror
      </div>      
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Thêm</button>
    </div>
</form>
  <div class="form-row" style="margin-top: 15px">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Link</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @php
            use App\Models\Slide;
            $slides = Slide::orderBy('id','desc')->paginate(env('ADMIN_PAGINATE_NUMBER'));
          @endphp
          @if($slides)
           @foreach ($slides as $key => $slide)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>
                  <img src="{{$slide->image}}" width="200" height="200" style="max-height: 200px" alt="Slide{{$key+1}}" class="img-thumbnail">
              </td>
              <td>
                  <form action="{{route('admin.slide.update', ['id'=>$slide->id])}}" method="POST">
                      @csrf
                  <input name="link" type="text" required class="form-control"placeholder="Link" value="{{$slide->link}}">
                  <button class="btn btn-primary">Cập nhật</button>
                  </form>
              </td>
              <td>
                  <button class="btn btn-danger btnDelete" data-link="{{route('admin.slide.delete', ['id'=>$slide->id])}}" data-title="Xóa slide" data-body="Bạn có chắc muốn xóa ?">Xóa</button>
              </td>
            </tr>
            @endforeach
          @endif
        </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-6">
      {{$slides->links()}}
    </div>
  </div>
@endsection