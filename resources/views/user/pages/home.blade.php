@extends('user.layouts.frame')
@section('slide')
    @include('user.layouts.slide')
@endsection
@section('content')
    @include('user.layouts.featured')
    @include('user.layouts.offer')
    @include('user.layouts.categorieshome')
    @include('user.layouts.subscribe')
    @include('user.layouts.products')
    @include('user.layouts.vendor')
@endsection

