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
<div class="search-box">
<input type="search" class="form-control ps-4" name="s" placeholder="Search...">
<i class="bi bi-search"></i>
</div>
<section class="mysubmissions p-5">
    <div class="container text-center">
        <div class="row">
            <h4>
                WRITE STORIES,COMICS OR OTHERS
            </h4>
        </div>
        <div class="row">
            <a href="{{route('submission.add')}}" class="btn btn-primary p-2"> GET STARTED</a>
        </div>
      <div class="row">
        @foreach ($works as $work)
        <div class="col-md-6">
            <div class="card text-center mt-3">
                <div class="card-header">
                {{$work->author_name}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$work->genreName}}</h5>
                    <p class="card-text">{{$work->published==1?"Published":"Pending"}}</p>
                    <a href="#" class="btn btn-primary">{{$work->title}}</a>
                </div>
                <div class="card-footer text-muted">
                    {{$work->created_at}}           
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
</style>

@endsection