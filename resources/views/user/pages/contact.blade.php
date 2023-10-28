@extends('user.layouts.frame')
@section('pagestart')
    @include('user.layouts.pagestart')
@endsection
@section('content')
<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Liên hệ với chúng tôi</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-10">
            @include('alert')
        </div>
        <div class="col-lg-7 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                <form method="POST" action="{{route('user.contact.send')}}" name="" id="" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Tiêu đề"
                            required="required" data-validation-required-message="Please enter a subject" name="subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="6" id="message" placeholder="Tin nhắn"
                            required="required"
                            data-validation-required-message="Please enter your message" name="message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Gửi tin nhắn</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <h5 class="font-weight-semi-bold mb-3">Thông tin liên lạc</h5>
            <p>Chúng tôi luôn lắng nghe và phản hồi lại yêu cầu của khách hàng sớm nhất. Cảm ơn vì sự đóng góp của khách hàng.</p>
            @if(!empty(env('ADDRESS_CONTACT_1') || !empty(env('EMAIL_CONTACT_1') || !empty('TEL_CONTACT_1'))))
            <div class="d-flex flex-column mb-3">
                <h5 class="font-weight-semi-bold mb-3">Địa chỉ 1</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{env('ADDRESS_CONTACT_1','')}}</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{env('EMAIL_CONTACT_1','')}}</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>{{env('TEL_CONTACT_1','')}}</p>
            </div>
            @endif
            @if(!empty(env('ADDRESS_CONTACT_2') || !empty(env('EMAIL_CONTACT_2') || !empty('TEL_CONTACT_2'))))
            <div class="d-flex flex-column">
                <h5 class="font-weight-semi-bold mb-3">Địa chỉ 2</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{env('ADDRESS_CONTACT_2','')}}</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{env('EMAIL_CONTACT_2','')}}</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>{{env('TEL_CONTACT_2','')}}</p>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection