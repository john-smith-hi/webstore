<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <a href="" class="text-decoration-none">
                <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>{{env('STORE_NAME','')}}</h1>
            </a>
            <p>{{env('USER_TEXT_FOOTER','')}}</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{env('ADDRESS_CONTACT_1','123 TP HCM')}}</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{env('EMAIL_CONTACT_1','leminhnhat10081999@gmail.com')}}</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>{{env('TEL_CONTACT_1','096951063')}}</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Truy cập</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="{{route('user.home')}}"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                        <a class="text-dark mb-2" href="{{route('user.search')}}"><i class="fa fa-angle-right mr-2"></i>Tìm kiếm</a>
                        <a class="text-dark mb-2" href="{{route('user.brand.index')}}"><i class="fa fa-angle-right mr-2"></i>Thương hiệu</a>
                        <a class="text-dark mb-2" href="{{route('user.contact.index')}}"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        <a class="text-dark mb-2" href="{{route('user.aboutus')}}"><i class="fa fa-angle-right mr-2"></i>Giới thiệu</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Khách hàng</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="{{route('user.profile.index')}}"><i class="fa fa-angle-right mr-2"></i>Thông tin cá nhân</a>
                        <a class="text-dark mb-2" href="{{route('user.cart.index')}}"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                        <a class="text-dark mb-2" href="{{route('user.checkout.history')}}"><i class="fa fa-angle-right mr-2"></i>Lịch sử đặt hàng</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-12 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">{{env('STORE_NAME','PenWeb')}}</a>. All Rights Reserved. Designed
                by
                <a class="text-dark font-weight-semi-bold" href="#">LMN</a> 2022 - {{date('Y')}}
            </p>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/ujs.js')}}"></script>
</body>

</html>