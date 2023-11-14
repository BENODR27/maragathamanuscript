@extends('layouts.website.layout2')
@section('content')

    <!-- header -->
    <header id="navbar_top" class="index2-header-bg">
        <div class="container">
            <!-- nav bar -->
            <nav class="navbar navbar-expand-lg py-3 navbar-dark header-transparent">
                <!--site logo -->
                
                
                <a class="navbar-brand" href="index.html">
                    <h4>
                        MM
                    </h4>
                    {{-- <img class="logo-dark" src="assets/images/logo.png" alt="Site Logo" width="200"> --}}
                    {{-- <img class="logo-white" src="assets/images/index2/logo-main-1.png" alt="Site Logo" width="200"> --}}
                </a>
                <button class="navbar-toggler me-3 ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- nav menu -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">
                                @if(app()->getLocale()=="en")
                                HOME
                                @else
                                முகப்பு
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product-category">{{ GoogleTranslate::trans('Shop', app()->getLocale()) }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#author-id">{{ GoogleTranslate::trans('About Us', app()->getLocale()) }}</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">{{ GoogleTranslate::trans('Contact', app()->getLocale()) }}</a>
                        </li>
                        
                    </ul>
                    <select class="p-1 changeLang complementary-background rounded-pill text-white">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{ GoogleTranslate::trans('English', app()->getLocale()) }}</option>
                        <option value="ta" {{ session()->get('locale') == 'ta' ? 'selected' : '' }}>{{ GoogleTranslate::trans('Tamil', app()->getLocale()) }}</option>
                        
                    </select>
                </div>
                <!-- .collapse -->
                <div class="header-seperator"></div>
            </nav>
            <!-- nav bar end -->
        </div>
    </header>
    <!-- header end -->


    <!-- hero section -->
    <section id="section-hero" class="hero-section-2 py-120">
        <div class="container">
            <div class="row gx-5 d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <p class="fs-5 fw-normal text-white"></p>
                    <h2 class="my-3 book-verse"><span class="complementary-color ps-0">{{ GoogleTranslate::trans('MARAGATHA MANUSCRIPT', app()->getLocale()) }}</span>{{ GoogleTranslate::trans('BOOK VERSE', app()->getLocale()) }}</h2>
                    <p class="fs-6 fw-normal book-quote">{{ GoogleTranslate::trans('The more that you learn, the more places you\'ll go.” “Books are a uniquely portable magic.” “I kept always two books in my pocket, one to read, one to write in.” “The person who deserves most pity is a lonesome one on a rainy day who doesn\'t know how to read.”', app()->getLocale()) }}
                        </p>
                    <div class="d-flex align-items-center gap-4 mt-5">
                        <a href="#author-id" class="btn btn-light rounded-pill"> {{ GoogleTranslate::trans('More', app()->getLocale()) }}</a>
                        <a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="text-decoration-none play-2 video-play ">
                            <div class="d-flex gap-2 align-items-center">
                                <i class="bi bi-play-fill fs-4"></i>
                                <div class="ms-1">
                                    <p class="play-text-md text-decoration-none">{{ GoogleTranslate::trans('Watch Video', app()->getLocale()) }}</p>
                                    <p class=" play-text-sm text-decoration-underline">{{ GoogleTranslate::trans('Duration 3:00 min', app()->getLocale()) }}</p>
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
        <h3 class="text-white">publish your work with us, <a href="#product-category" class="text-white">here to go</a><i class="bi bi-arrow-right ms-2"></i>
        </h3>
    </div>

    <!-- category section -->
    <section id="product-category" class="help-section-2 py-120">
        <div class="container">
            <div class="text-center pb-5">
                @if(count($categories)==0)
                <h2 class="display-4 fw-bold text-white">{{ GoogleTranslate::trans('COMING SOON', app()->getLocale()) }}</h2>
                @else 
                <h3 class="hr-lines-white">{{ GoogleTranslate::trans('select your category', app()->getLocale()) }}</h3>

                <h2 class="display-4 fw-bold text-white">{{ GoogleTranslate::trans('OUR RELEASES', app()->getLocale()) }}</h2>
                @endif
            </div>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators carousel-dots">
                    @foreach ($categories as $category)
                    @if($category->name=="OTHERS")
                    <div class="d-grid gap-2 col-10 mx-auto">
                        <a href="{{route('category.segments',['category_id'=>$category->id])}}" class="btn btn-primary ">{{ GoogleTranslate::trans('OTHERS', app()->getLocale()) }}</a>
                    </div>
                    @endif
                    @endforeach

                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4 py-5">
                          
                            @foreach ($categories as $category)
                            @if($category->name!="OTHERS")
                            <div class="col-md-4">
                                <div class="help-content bg-white rounded-2 px-4 py-5">
                                    <h3 class="help-content-title pb-3 pt-4">{{ GoogleTranslate::trans($category->name, app()->getLocale()) }}</h3>
                                    <p>{{ GoogleTranslate::trans($category->description, app()->getLocale()) }}</p>
                                    <h5 class="help-content-link pt-3 pb-3"><a href="{{route('category.segments',['category_id'=>$category->id])}}" class="text-decoration-none btn btn-primary">{{ GoogleTranslate::trans('Explore Here', app()->getLocale()) }}</a><i class="bi bi-arrow-right ms-2"></i></h5>
                                    <img src="{{asset($category->category_image_name)}}" alt="Help Icon" class="img-fluid">
                                    
                                </div>
                            </div>
                          
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
    <section class="about-section-2 py-5" id="author-id">
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
    </section>
    <!-- End about-section -->




 

@endsection