@extends('admin.layouts.frame')
@section('pagename')
Trang giới thiệu
@endsection
@section('action')
Cập nhật
@endsection
@section('linkpagename')
{{route('admin.aboutus.index')}}
@endsection
@section('content')
@include('alert')
@error('text')
  <span style="color: red">*{{$message}}</span>
@enderror
<form method="POST" action="{{ route('admin.aboutus.edit') }}" enctype="multipart/form-data">
    @csrf
    @php
      use App\Models\Aboutus;
      $aboutus = Aboutus::orderBy('id','desc')->first();
      $text = (!empty(old('text'))) ? old('text') : $aboutus->text;
    @endphp
    <div class="form-row">
      <div class="form-group col-md-12">
        <label class="form-label">Văn bản trang giới thiệu</label>
        <textarea name="text" class="form-control" rows="5" id="ckeditor">
            @if(!empty($aboutus))
                {{$text}}
            @endif
        </textarea>
      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
  </form>
@endsection