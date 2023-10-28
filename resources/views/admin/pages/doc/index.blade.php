@extends('admin.layouts.frame')
@section('pagename')
Tài liệu
@endsection
@section('action')
Thêm-Xóa
@endsection
@section('linkpagename')
{{route('admin.doc.index')}}
@endsection
@section('content')
@include('alert')
<form method="POST" action="{{route('admin.doc.store')}}" enctype="multipart/form-data">
    @csrf   
    <div class="form-row">
      <div class="form-group col-md-4">
        <span style="color: red">(*)Chỉ upload file pdf</span>
        <input name="file" type="file" class="form-control" required="">
      </div>
      <div class="form-group col-md-1">
        <span> .</span>
        <button type="submit" class="btn btn-primary form-control">Thêm</button>
      </div>
    </div>
</form>  
    <form action="{{route('admin.doc.index')}}" method="GET">
      <div class="row" style="margin-top: 20px">
              <div class="form-group col-md-4">
              <input name="search_query" type="text" class="form-control" placeholder="Tên" value="{{$search_query}}">
              </div>
              <div class="form-group col-md-4">
                  <button type="submit" class="btn btn-success">Tìm kiếm</button>
              </div>
      </div>
    </form>    
  <div class="form-row" style="margin-top: 15px">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Tải về</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
            @php
                use App\Models\Document;
                $docs = Document::orderBy('id','desc')
                                ->where('name','like','%'.$search_query.'%')
                                ->paginate(env('ADMIN_PAGINATE_NUMBER',5));
            @endphp
            @foreach ($docs as $key => $doc)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$doc->name}}</td>
                    <td>
                        <a href="{{route('admin.doc.download',['id'=>$doc->id])}}">Tải về</a>
                    </td>
                    <td>
                        <button class="btn btn-danger btnDelete" data-link="{{route('admin.doc.delete',['id'=>$doc->id])}}" data-body="Bạn có chắc muốn xóa ?" data-title="Xóa tài liệu .{{$doc->name}}">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-6">
      {{$docs->links()}}
    </div>
  </div>
@endsection