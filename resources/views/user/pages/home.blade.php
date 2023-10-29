@extends('user.layouts.frame')
@section('slide')
    @include('user.layouts.slide')
@endsection
@section('content')
    @include('user.layouts.featured')
    @include('user.layouts.trendproducts')
    @include('user.layouts.saleproducts')
    @include('user.layouts.hintproducts')
    @include('user.layouts.newproducts')
    @include('user.layouts.vendor')
@endsection

