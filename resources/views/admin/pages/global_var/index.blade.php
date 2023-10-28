@extends('admin.layouts.frame')
@section('pagename')
Biến toàn cục
@endsection
@section('action')
Thêm-Xóa
@endsection
@section('linkpagename')
{{route('admin.global_var.index')}}
@endsection
@section('content')
@include('alert')
    <div class="col-md-12">
      <a href="{{route('admin.global_var.create')}}">
        <button type="button" class="btn btn-primary">Thêm</button>
      </a>
      <button class="btn btn-danger btnDelete" data-link="{{route('admin.global_var.update_all')}}" data-body="Sau khi cập nhật, xóa tất cả các biến cục bộ hiện có trong csdl và cập nhật .env vào csdl" data-title="Bạn có chắc muốn cập nhật toàn bộ?" data-btn="Cập nhật toàn bộ">Cập nhật toàn bộ
      </button>
    </div>
    <form action="{{route('admin.global_var.index')}}" method="GET">
      <div class="row" style="margin-top: 20px">
              <div class="form-group col-md-4">
              <input name="search_query" type="text" class="form-control" placeholder="Tên, Giá trị, Ghi chú" value="{{$search_query}}">
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
            <th scope="col">Giá trị</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
            @php
                use App\Models\GlobalVariable;
                $global_vars = GlobalVariable::orderBy('id','desc')
                                             ->where('name', 'like', '%'.$search_query.'%')
                                             ->orWhere('value','like', '%'.$search_query.'%')
                                             ->orWhere('note', 'like', '%'.$search_query.'%')
                                             ->paginate(env('ADMIN_PAGINATE_NUMBER',5));
            @endphp
            @foreach ($global_vars as $key => $global_var)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            {{$global_var->name}}
                        </td>
                        <td>
                            {{$global_var->value}}
                        </td>
                        <td>
                            {{$global_var->note}}
                        </td>
                        <td>
                            <a href="{{route('admin.global_var.update',['id'=>$global_var->id])}}">
                                <button type="submit" class="btn btn-success">Sửa</button>
                            </a>
                            <button class="btn btn-danger btnDelete" data-link="{{route('admin.global_var.delete', ['id'=>$global_var->id])}}" data-title="Xóa biến toàn cục {{$global_var->name}}" data-body="Bạn có chắc muốn xóa ?" data-btn="Xóa">Xóa</button>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-6">
      {{$global_vars->links()}}
    </div>
  </div>
@endsection