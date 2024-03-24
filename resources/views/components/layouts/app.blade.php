@extends('layouts.website.layout1')
@section('content')
 <!-- header banner -->
 <section class="header-banner bookpress-parallax" id="header-banner-id">
    <div class="container d-flex justify-content-between align-items-center text-white">
        <div class="overlay-out">
            <h1 class="banner-title">ffhfhf</h1>
            <p class="text-white"><a href="/" class="text-decoration-none text-white">Home</a> /
                <span  onclick="history.back()" class="text-decoration-none text-white">Segments</span>
            </p>
        </div>
        <img src="{{asset("layout/assets/images/banner-image.png")}}" class="img-fluid" alt="Books">
        <div class="parallax start-0 top-0 w-100 h-100"></div>
    </div>
</section>

<section class="mydrafts p-5">
    <div class="container text-center">
     
        {{ $slot }}
      </div>
       
    </div>

   
</section>
<style>
    .mydrafts{
        min-height: 50vh;
    }
    .card-title{
        color: green;
    }
    
    .card-header-tabs{
        background-color: black;
    }
    .nav-link{
        color: green;
    }
  
    .titlenav {
        color: green !important;
    }
    .tab-pane{
        background-color: #c6d8c6;
        border-radius: 5px;
        padding: 5px;
    }
</style>

@endsection