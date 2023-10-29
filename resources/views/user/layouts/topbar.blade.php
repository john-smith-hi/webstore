<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@if(!empty($title)){{$title}}@else{{env('STORE_NAME','PenWeb')}}@endif</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/user.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/star.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
</head>
<body>
    @include('admin.layouts.modal')
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{route('user.home')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>{{env('STORE_NAME','')}}</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{route('user.search')}}" method="GET" id="search_form_home">
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" placeholder="Tìm kiếm sản phẩm">
                        <div class="input-group-append">
                            <span id="search_button_home" class="input-group-text bg-transparent text-primary" style="cursor: pointer">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="{{route('user.cart.index')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
