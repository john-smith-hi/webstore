<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
    <a href="" class="text-decoration-none d-block d-lg-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>{{env('STORE_WEB','')}}</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="{{route('user.home')}}" class="nav-item nav-link {{Request::is('/') ? 'active' : ''}}">Trang chủ</a>
            <a href="{{route('user.search')}}" class="nav-item nav-link {{Request::is('search*') ? 'active' : ''}}">Tìm kiếm</a>
            <a href="{{route('user.brand.index')}}" class="nav-item nav-link {{Request::is('brand*') ? 'active' : ''}}">Thương hiệu</a>
            <a href="{{route('user.contact.index')}}" class="nav-item nav-link {{Request::is('contact*') ? 'active' : ''}}">Liên hệ</a>
            <a href="{{route('user.aboutus')}}" class="nav-item nav-link {{Request::is('aboutus') ? 'active' : ''}}">Giới thiệu</a>
        </div>
        <div class="navbar-nav ml-auto py-0">
            @php
                use Illuminate\Support\Facades\Auth;
            @endphp
            @if(Auth::check())
                @php
                    $email = Auth::user()->email;
                    $email_arr = explode('@', $email);
                    $email_arr[0] = substr($email_arr[0], 0, 3);
                    $email = $email_arr[0].'***@'.$email_arr[1];
                @endphp
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tài khoản {{$email}}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('user.profile.index')}}" class="dropdown-item">Thông tin cá nhân</a>
                        <a href="{{route('user.cart.index')}}" class="dropdown-item">Giỏ hàng</a>
                        <a href="{{route('user.checkout.history')}}" class="dropdown-item">Lịch sử đặt hàng</a>
                    </div>
                </div>
                <a href="{{route('logout')}}" class="nav-item nav-link">Đăng xuất</a>
                @else
                <a href="{{route('user.cart.index')}}" class="nav-item nav-link">Giỏ hàng</a>
                <a href="{{route('login.index')}}" class="nav-item nav-link">Đăng nhập</a>
            @endif
        </div>
    </div>
</nav>