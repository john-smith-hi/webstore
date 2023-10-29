<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 collapsed" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Danh mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light collapse" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @php
                        use App\Models\Category;
                        $categories = Category::where('parent_id',0)->get();
                    @endphp
                    @foreach ($categories as $category)
                        @php
                            $childCategories = Category::where('parent_id',$category->id)->where('parent_id','<>',0)->get();
                        @endphp
                        @if($childCategories->count()==0)
                            <a href="#" class="nav-item nav-link">{{$category->name}}</a>
                        @else
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">{{$category->name}} <i class="fa fa-angle-down float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                    <a href="{{route('user.search').'?category[]='.$category->slug}}" class="dropdown-item">{{$category->name}}</a>
                            @foreach($childCategories as $childCategory)
                                    <a href="{{route('user.search').'?category[]='.$childCategory->slug}}" class="dropdown-item">{{$childCategory->name}}</a>
                            @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            @include('user.layouts.menu')
            @yield('slide')
        </div>
    </div>
</div>
<!-- Navbar End -->