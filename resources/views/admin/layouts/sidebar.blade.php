<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="@if(!empty(Auth::user()->avatar)){{Auth::user()->avatar}}@endif" style="width:60px" class="" alt="User Image">
        </div>
        <div class="info">
          @php $fullname= Auth::user()->first_name.' '.Auth::user()->last_name @endphp
          <a href="{{route('admin.profile.index')}}" class="d-block">{{$fullname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.home.index') }}" class="nav-link @if(request()->is('admin')) {{'active'}} @endif">
              <p>
                Trang chủ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.profile.index') }}" class="nav-link @if(request()->is('admin/profile*')) {{'active'}} @endif">
              <p>
                Thông tin cá nhân
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.slide.index') }}" class="nav-link @if(request()->is('admin/slide*')) {{'active'}} @endif">
              <p>
                Slide
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.brand.index') }}" class="nav-link @if(request()->is('admin/brand*')) {{'active'}} @endif">
              <p>
                Thương hiệu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link @if(request()->is('admin/category*')) {{'active'}} @endif">
              <p>
                Danh mục
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product.index') }}" class="nav-link @if(request()->is('admin/product*')) {{'active'}} @endif">
              <p>
                Sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.sale.index') }}" class="nav-link @if(request()->is('admin/sale*')) {{'active'}} @endif">
              <p>
                Khuyến mãi
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview 
            @if(request()->is('admin/storage/input*') || request()->is('admin/storage/output*'))
              {{'menu-open'}}@endif">
            <a href="#" class="nav-link @if(request()->is('admin/storage')) {{'active'}} @endif">
              <p>
                Kho
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.storage.input.index')}}" class="nav-link @if(request()->is('admin/storage/input*')) {{'active'}} @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nhập kho</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.storage.output.index')}}" class="nav-link @if(request()->is('admin/storage/output*')) {{'active'}} @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xuất kho</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.order.index') }}" class="nav-link @if(request()->is('admin/order*')) {{'active'}} @endif">
              <p>
                Đơn hàng
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('admin.news.index') }}" class="nav-link @if(request()->is('admin/news*')) {{'active'}} @endif">
              <p>
                Tin tức
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('admin.comment.index') }}" class="nav-link @if(request()->is('admin/comment*')) {{'active'}} @endif">
              <p>
                Bình luận
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.rating.index') }}" class="nav-link @if(request()->is('admin/rating*')) {{'active'}} @endif">
              <p>
                Đánh giá
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.account.index') }}" class="nav-link @if(request()->is('admin/account*')) {{'active'}} @endif">
              <p>
                Tài khoản
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.aboutus.index') }}" class="nav-link @if(request()->is('admin/aboutus*')) {{'active'}} @endif">
              <p>
                Trang giới thiệu
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('admin.log.index') }}" class="nav-link @if(request()->is('admin/log*')) {{'active'}} @endif">
              <p>
                Nhật ký
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('admin.doc.index') }}" class="nav-link @if(request()->is('admin/doc*')) {{'active'}} @endif">
              <p>
                Tài liệu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.global_var.index') }}" class="nav-link @if(request()->is('admin/global_var*')) {{'active'}} @endif">
              <p>
                Biến toàn cục
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>