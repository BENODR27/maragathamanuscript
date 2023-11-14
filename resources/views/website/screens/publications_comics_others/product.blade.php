@extends('layouts.website.layout1')
@section('content')
<!-- header banner -->
<section class="header-banner bookpress-parallax p-5" id="header-banner-id">
  <div class="container d-flex justify-content-between align-items-center text-white">
      <div class="overlay-out">
          <h1 class="banner-title">{{ GoogleTranslate::trans($pageTitle, app()->getLocale()) }}</h1>
          <p class="text-white"><a href="/" class="text-decoration-none text-white">{{ GoogleTranslate::trans("Home", app()->getLocale()) }}</a> /
              <span  onclick="history.back()" class="text-decoration-none text-white">{{ GoogleTranslate::trans("Products", app()->getLocale()) }}</span>
          </p>
      </div>
      <img src="{{asset("layout/assets/images/banner-image.png")}}" class="img-fluid" alt="Books">
      <div class="parallax start-0 top-0 w-100 h-100"></div>
  </div>
</section>
<!-- header banner end -->
  <div class="product-detail">
    <div class="container p-3">
      <div class="row" >
          <div class="col-md-6 mt-3">
              <img class="img-fluid" style="height:100%;width:100%;"src = "{{asset($product->poster_image_name)}}" alt = "image">
          </div>
          <div class="col-md-6" >
              <div class = "product-content mt-5">
                  <div class="row">
                      <div class="col">
                          <h2 class = "product-title">{{ GoogleTranslate::trans($product->title, app()->getLocale()) }}</h2>
                      </div>
                      <div class="col">
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
                            <p><span><small>{{ GoogleTranslate::trans("No ratings yet!", app()->getLocale()) }}</small></span></p>
                            @endif
                            </div>
                      </div>
                  </div>
                 <div class="row mt-3">
                  <div class="col">
                      <div class="btn btn-outline-success"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" @if($product->user->profile_image_name==null) src="{{asset('img/undraw_profile.svg')}}" @else src="{{asset($product->user->profile_image_name)}}" @endif /> &nbsp {{ GoogleTranslate::trans($product->user->name, app()->getLocale()) }}</div>
                  </div>
                 </div>

                  <div class = "product-detail mt-3">
                      <?php
                      $inputSentence = $product->one_line_concept;
                      $wordCount = str_word_count($inputSentence);
                      $sentences = preg_split('/((?:\S+\s+){1,20})/', $inputSentence, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

                      ?>
                      <p>{{ GoogleTranslate::trans(trim($sentences[0]), app()->getLocale()) }}<span id="dots">...</span><span id="more">&nbsp{{ GoogleTranslate::trans(trim($sentences[1]), app()->getLocale()) }}</span></p>
                      <button class="btn btn-primary" onclick="viewMoreOneLine()" id="myBtn">{{ GoogleTranslate::trans("Read more", app()->getLocale()) }}</button>

                  </div>
                  @if($product->product_type=="ebook")
                  <div class = "purchase-info mt-3">
                    {{-- <a href="{{route('product.cart.add',['product_id'=>$product->id])}}" class = "form-control btn btn-primary mb-2">
                      DOWNLOAD E-BOOK <i class="fa fa-download" aria-hidden="true"></i>

                   </a> --}}
                   <a class="btn btn-primary" href="{{asset("storage/work/".$product->e_book_file_name)}}" download="{{$product->title}}.pdf"> {{ GoogleTranslate::trans("DOWNLOAD E-BOOK", app()->getLocale()) }}</a>

                  </div>
                  @elseif($product->product_type=="audiobook")
                  <div class="audio-section">
                    @include('website.includes.audioplayer')
                  </div>
                  <div class = "purchase-info mt-3">
                    <a href="{{route('product.cart.add',['product_id'=>$product->id])}}" class = "form-control btn btn-primary mb-2">
                       {{ GoogleTranslate::trans("GET AUDIO BOOK", app()->getLocale()) }}<i class="fa fa-download" aria-hidden="true"></i>

                   </a>
                  </div>
                  @else
                  <div class = "purchase-info mt-3">
                    <a href="{{route('product.cart.add',['product_id'=>$product->id])}}" class = "form-control btn btn-primary mb-2">
                       {{ GoogleTranslate::trans("ADD TO CART", app()->getLocale()) }}<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                    <a href="{{route('products.placeorder',["placesingleorder"=>true])}}" class ="form-control btn btn-primary">{{ GoogleTranslate::trans("BUY NOW", app()->getLocale()) }}</a>
                    
                    {{-- <a href="{{route('products.placeorder')}}" class ="form-control btn btn-primary">DOWNLOAD E-BOOK</a> --}}
                  </div>
                  @endif
                </div>
          </div>
      </div>
      
  </div>

  </div>
    @include('website.includes.review_section')
   


<style>
  .btn-outline-success{
    color: black;
  }
    #more {display: none;}
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
<script>
    function viewMoreOneLine() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");
    
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "{{ GoogleTranslate::trans('Read more', app()->getLocale()) }}"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "{{ GoogleTranslate::trans('Read less', app()->getLocale()) }}"; 
        moreText.style.display = "inline";
      }
    }
    </script>
    
@endsection