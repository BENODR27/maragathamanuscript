@extends('layouts.website.layout1')
@section('content')
    <!-- header banner -->
    <section class="header-banner bookpress-parallax" id="header-banner-id">
        <div class="container d-flex justify-content-between align-items-center text-white">
            <div class="overlay-out">
                <h1 class="banner-title">{{ GoogleTranslate::trans($pageTitle, app()->getLocale()) }}</h1>
                <p class="text-white"><a href="/" class="text-decoration-none text-white">{{ GoogleTranslate::trans('Home', app()->getLocale()) }}</a> /
                    {{-- <span  onclick="history.back()" class="text-decoration-none text-white">Segments</span> --}}
                </p>
            </div>
            <img src="{{asset("layout/assets/images/banner-image.png")}}" class="img-fluid" alt="Books">
            <div class="parallax start-0 top-0 w-100 h-100"></div>
        </div>
    </section>
    <!-- header banner end -->
 <!-- search box -->
 @include('website.includes.search_input')

@include('website.includes.common_home')
@endsection
