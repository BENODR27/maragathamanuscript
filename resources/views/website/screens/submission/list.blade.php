@extends('layouts.website.layout1')
@section('content')
 <!-- header banner -->
 <section class="header-banner bookpress-parallax" id="header-banner-id">
    <div class="container d-flex justify-content-between align-items-center text-white">
        <div class="overlay-out">
            <h1 class="banner-title">{{$pageTitle}}</h1>
            <p class="text-white"><a href="/" class="text-decoration-none text-white">Home</a> /
                <span  onclick="history.back()" class="text-decoration-none text-white">Segments</span>
            </p>
        </div>
        <img src="{{asset("layout/assets/images/banner-image.png")}}" class="img-fluid" alt="Books">
        <div class="parallax start-0 top-0 w-100 h-100"></div>
    </div>
</section>
<!-- header banner end -->
<!-- search box -->
{{-- <div class="search-box">
<input type="search" class="form-control ps-4" name="s" placeholder="Search...">
<i class="bi bi-search"></i>
</div> --}}
<section class="mysubmissions p-5">
    <div class="container text-center">
        <div class="row">
            <h4>
                WRITE STORIES,COMICS OR OTHERS
            </h4>
        </div>
        <div class="row p-3">
            <a href="{{route('submission.add')}}" class="btn btn-primary p-2"> GET STARTED</a>
        </div>
      <div class="row">
        @foreach ($works as $work)
        <div >
        <div class="col-md-12">
            <div class="card text-center mt-2">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                       
                        <li class="nav-item">
                            <a href="#home" class="nav-link titlenav" data-bs-toggle="tab">ID: {{$work->id}}</a>
                        </li>
                       
                        
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home">
                            <h5 class="card-title">{{$work->title}}</span> </h5>
                            <p class="card-text"> {{$work->genreName}}</span></p>
                            @if($work->published==1)
                            <a href="{{route('category.publications_comics_others.product',['product_id'=>$work->product_id])}}" class="btn btn-primary m-2">PUBLISHED (Click to view)</a>
                            @else
                            <a href="#" class="btn btn-primary m-2">PENDING</a>

                            @endif
                          
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        @endforeach
       
       
        </div>
      </div>
       
    </div>

   
</section>
<style>
    .mysubmissions{
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