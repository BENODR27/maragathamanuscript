@extends('layouts.website.layout2')
@section('content')

    <!-- header -->
    <header id="navbar_top" class="index2-header-bg">
        <div class="container">
            <!-- nav bar -->
            <nav class="navbar navbar-expand-lg py-3 navbar-dark header-transparent">
                <!--site logo -->
                
                
                <a class="navbar-brand" href="/">
                   
                    {{-- <img class="logo-dark" src="img/images/logo_main.png" alt="Site Logo" width="200"> --}}
                    <img class="logo-white" src="{{asset('img/mm/logo_main.png')}}" alt="Site Logo" width="50">
                </a>
                <button class="navbar-toggler me-3 ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- nav menu -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">
                                {{__('home')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-category">{{__('shop')}}
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#author-id">ABOUT US</a>
                        </li> --}}
                       
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">{{__('contact')}}</a>
                        </li>
                        
                    </ul>
                    {{-- <select class="p-1 changeLang complementary-background rounded-pill text-white">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="ta" {{ session()->get('locale') == 'ta' ? 'selected' : '' }}>Tamil</option>
                        
                    </select> --}}
                </div>
                <!-- .collapse -->
                <div class="header-seperator"></div>
            </nav>
            <!-- nav bar end -->
        </div>
    </header>
    <!-- header end -->
{{-- <style>
/* GLOBAL STYLES */


/* DEMO-SPECIFIC STYLES */
.typewriter {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  animation: 
    typing 3.5s steps(30, end),
    blink-caret .5s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange }
}

</style> --}}

    <!-- hero section -->
    <section id="section-hero" class="hero-section-2 py-120">
        <div class="container">
            <div class="row gx-5 d-flex justify-content-center align-items-center">
                <div class="col-md-6 bqc">
                    <p class="fs-5 fw-normal text-white"></p>
                    <h2 class="my-3 book-verse "><span class="complementary-color ps-0 typewriter">{{__('mm')}}</span></h2><h2 class="text-success typewriter">BOOK VERSE</h2>
                    <p class="fs-6 fw-normal book-quote typewriter">{{__('mm_description')}}
                        </p>
                    <div class="d-flex align-items-center gap-4 mt-5">
                        {{-- <a href="#author-id" class="btn btn-light rounded-pill"> Portfolio</a> --}}
                        <a target="_blank" href="https://youtu.be/K0qNSvsuC0A?si=pB7tBlVsGqQo6MoZ" class="text-decoration-none play-2 video-play ">
                            <div class="d-flex gap-2 align-items-center">
                                <i class="bi bi-play-fill fs-4"></i>
                                <div class="ms-1">
                                    <p class="play-text-md text-decoration-none">{{__('watch_video')}}</p>
                                    <p class=" play-text-sm text-decoration-underline">Duration 3:00 min</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <img class="img-fluid" src="{{asset('layout/assets/images/book.png')}}" alt="3 books">
                </div>
            </div>
        </div>
    </section>
    <!-- hero section end -->


    <div class="hero-section-2-feature p-3 d-flex justify-content-center align-items-center">
        <h3 class="text-white">{{__('publish_your_work_with_us')}}, <a href="#product-category" class="text-white">{{__('here_to_go')}}</a><i class="bi bi-arrow-right ms-2"></i>
        </h3>
    </div>

    <!-- category section -->
    <section id="product-category" class="help-section-2 py-120">
        <div class="container">
            <div class="text-center pb-5">
                @if(count($categories)==0)
                <h2 class="display-4 fw-bold text-white">{{__('comming_soon')}}</h2>
                @else 
                <h3 class="hr-lines-white">{{__('select_your_category')}}</h3>

                <h2 class="display-4 fw-bold text-white">{{__('our_releases')}}</h2>
                @endif
            </div>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators carousel-dots">
                    @foreach ($categories as $category)
                    @if($category->name=="OTHERS")
                    <div class="d-grid gap-2 col-10 mx-auto">
                        <a href="{{route('category.segments',['category_id'=>$category->id])}}" class="btn btn-primary ">{{__('OTHERS')}}</a>
                    </div>
                    @endif
                    @endforeach

                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4 py-5">
                          
                            @foreach ($categories as $category)
                            @if($category->name!="OTHERS")
                            
                            @include('website.includes.category_card_main')
                          
                            @endif
                        @endforeach
                        </div>
                    </div>
                 
                    
                </div>

            </div>

        </div>
        
    </section>
    <!-- End help section -->

    <!-- About section -->
    {{-- <section class="about-section-2 py-5" id="author-id">
        <div class="container">
            <div class="row d-flex align-items-center gx-8 gy-5 py-5">
                <div class="col-md-6">
                    <div class="about-img position-relative">
                        <img src="{{asset('layout/assets/images/author.png')}}" alt="Author image" class="img-fluid">
                        <div class="floating-icons-2">
                            <ul class="li-unstyled ps-0 mb-0">
                                <li class="mb-2"><a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li class="mb-2"><a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li class="mb-2"><a href="#" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3 class="hr-lines-before-primary"> AUTHOR & PUBLISHER</h3>
                    <h2 class="display-4 fw-bold py-3">Captain Jack Sparrow</h2>
                    <p class="py-4">Lorem ipsum dolor sit amet, con ge sectetur adipiiscing elit, eius Lorem ipsum dolor sit amet, coniscinsectetur adipiscing elit, eius mod tempor incididunt labore mod sit amet adipiscingconsectetur.
                    </p>

                    <ul class="li-unstyled ps-0 check-icon">
                        <li class="pb-1">
                            <i class="bi bi-check-lg"></i><span class="text-h4 fs-4 ps-2">About Writting More
                                Accomplished</span>
                        </li>
                        <li class="pb-1">
                            <i class="bi bi-check-lg"></i><span class="text-h4 fs-4 ps-2">Exceptionally Energetic
                                Accomplished 10+ Granted</span>
                        </li>
                        <li class="pb-1">
                            <i class="bi bi-check-lg"></i><span class="text-h4 fs-4 ps-2">More Accomplished 10+
                                Granted</span>
                        </li>
                        <li class="pb-1">
                            <i class="bi bi-check-lg"></i><span class="text-h4 fs-4 ps-2">Exceptionally Energetic About
                                Writting</span>
                        </li>
                        <li>
                            <i class="bi bi-check-lg"></i><span class="text-h4 fs-4 ps-2">Most Popular Writter In The
                                Year</span>
                        </li>
                    </ul>
                   

                    <a class="btn btn-primary rounded-pill" href="#product-category" role="button">Learn More</a>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End about-section -->




 

@endsection