@extends('layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    <!-- Slider -->
    <div class="bannercontainer"
        style="
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw; 
            margin-right: -50vw; 
            width: 100vw;
    ">
        <div class="banner">
            @include('layouts.header.slide')
        </div>
    </div>
    <!--end slider -->

    @include('layouts.content.mega')

    <div class="clearfix"></div>

    <h2 id='target' class="page-heading heading--outcontainer">Now in the cinema</h2>

    <div class="col-sm-12">
        @include('layouts.content.content')
    </div>

    <div class="col-sm-12">
        @include('layouts.content.latestNews')
    </div>
@endsection
