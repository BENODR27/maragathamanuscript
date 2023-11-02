@extends('layouts.website.layout1')
@section('content')
<style>
  .blog-section{
    min-height: 70vh;
  }
</style>
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
@include('website.includes.search_input')
    <!-- blog section -->
    <section id="section-blog" class="blog-section">
        <div class="container">
            <div class="row ">
              <div class="row">
                
                   <div class="btn btn-primary col-3 tamilbutton">TAMIL</div>
               
                   <div class="btn btn-primary col-3 englishbutton">ENGLISH</div>
               
              </div>
            <h5 class="pt-4">DEPARTMENTS</h5>
            <div class="row mt-4">
              <div class="col p-3">
                <div class="btn btn-primary selectedDepartment" data-id="0">All</div>
             </div>
            @foreach ($departments as $department)
            <div class="col p-3">
              <div class="btn btn-primary selectedDepartment" data-id="{{$department->id}}">{{$department->name}}</div>
           </div>
            @endforeach
                
                 
            </div>
            <h5 class="pt-4">AVAILABLES</h5>
            <section id="section-blog" class="blog-section">
              <div class="container">
                  <div class="row gx-5 gy-4">
                      <div class="col-md-12">
                          <div class="row row-cols-1 row-cols-md-4 gx-4 gy-4 " id="subject-parent">
                              @foreach ($products as $product)
                              <!-- product  -->
                              
                              <div class="col segment-product defaultlist ">
                                  <div class="bg-white p-2 bordered-shadow">
                                      <a href="{{route('category.publications_comics_others.product',['product_id'=>$product->id])}}" >
                                      <img src={{asset($product->poster_image_name)}} alt="Product Image" class="img-fluid">
                                      
                                          <h5 class="mt-2">{{ GoogleTranslate::trans($product->title, app()->getLocale()) }}</h5>
                                          <div class = "product-rating">
                                              @if($product->rating_average!=0)
                                                @for ($i = 1; $i <= $product->rating_average; $i++)
                                                <i style="color:green"class = "fa fa-star"></i>
                                                @endfor
                                                @for ($i = $product->rating_average+1; $i <= 5; $i++)
                                                <i class = "fa fa-star"></i>
                                                @endfor
                                                <span>({{$product->viewers}})</span>
                                              @else
                                              <p><span><small>No ratings yet!</small></span></p>
                                              @endif
                                                
                                              </div>
      
                                      {{-- <div class="d-flex justify-content-between pt-3">
                                          <h4 class="text-primary">{{$product->price}}  &#8377;</h4>
                                          <h5 class="text-decoration-line-through">{{$product->price+100}}  &#8377;</h5>
                                      </div> --}}
                                  </a>
                                  </div>
                              </div>
                          
                              <!-- product  end-->
      
                              @endforeach
                          </div>
                      </div>
      
                  
                  </div>
      
              </div>
          </section>
          </div>

            

        </div>
    </section>
    <!-- blog section end -->

    <!-- Scroll Back to Top -->
    <a href="#header-banner-id" class="back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
    <!-- End Scroll Back to Top -->
@endsection
@section('script')
@include('website.scripts.subjects_ajax')
@endsection