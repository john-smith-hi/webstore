@extends('admin.layouts.frame')
@section('pagename')
Danh mục
@endsection
@section('action')
Danh sách
@endsection
@section('linkpagename')
{{route('admin.category.index')}}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('admin.category.create') }}">
            <button type="button" class="btn btn-primary">Thêm</button>
        </a>
    </div>
    <div class="col-md-12">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Danh mục cha</th>
            <th scope="col">Danh mục con</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($categoriesParent))
            @foreach ($categoriesParent as $categoryParent)
                <tr>
                    <td colspan="2">
                        <a href="{{ route('admin.category.update', ['id' => $categoryParent->id])}}">
                            {{ $categoryParent->name }}
                        </a>
                    </td>
                </tr>
                @php
                    $categoriesChild = $Category->where('parent_id',$categoryParent->id)->get();
                @endphp
                @if(count($categoriesChild)!=0)
                    <tr>
                        <td> </td>
                        <td>
                    @foreach($categoriesChild as $categoryChild)
                                <a href="{{ route('admin.category.update', ['id' => $categoryChild->id])}}">
                                    {{ $categoryChild->name }}
                                </a> - 
                    @endforeach
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    </tbody>
    </table>
    </div>
</div>

  
@endsection