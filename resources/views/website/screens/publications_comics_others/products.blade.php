@extends('layouts.website.layout1')
@section('content')
    <!-- header banner -->
    <section class="header-banner bookpress-parallax" id="header-banner-id">
        <div class="container d-flex justify-content-between align-items-center text-white">
            <div class="overlay-out">
                <h1 class="banner-title">{{ $pageTitle }}</h1>
                <p class="text-white"><a href="/" class="text-decoration-none text-white">Home</a> /
                    <span  onclick="history.back()" class="text-decoration-none text-white">Back</span>
                </p>
            </div>
            <img src="{{asset("layout/assets/images/banner-image.png")}}" class="img-fluid" alt="Books">
            <div class="parallax start-0 top-0 w-100 h-100"></div>
        </div>
    </section>
    <!-- header banner end -->
 <!-- search box -->
@include('website.includes.search_input')
    <!-- blog section -->
    <section id="section-blog" class="blog-section">
        <div class="container">
            <div class="row gx-5 gy-4">
                <div class="col-md-12">
                    <div class="row row-cols-2 row-cols-md-4 gx-4 gy-4">
                        @foreach ($products as $product)
                        @include('website.includes.product_card_sub')


                        @endforeach
                    </div>
                </div>

            
            </div>

            {{-- <!-- pagination -->
            <div class="pagination-wrap my-7">
                <ul class="d-flex justify-content-start align-items-center gap-3 ps-0">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul>
            </div> --}}

        </div>
    </section>
    <!-- blog section end -->

    <!-- Scroll Back to Top -->
    <a href="#header-banner-id" class="back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
    <!-- End Scroll Back to Top -->
    <style>
        .blog-section{
            min-height: 70vh;
        }
    </style>
@endsection