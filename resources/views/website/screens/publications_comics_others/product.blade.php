@extends('layouts.website.layout1')
@section('content')
<!-- header banner -->
<section class="header-banner bookpress-parallax p-5" id="header-banner-id">
  <div class="container d-flex justify-content-between align-items-center text-white">
      <div class="overlay-out">
          <h1 class="banner-title">{{ $pageTitle }}</h1>
          <p class="text-white"><a href="/" class="text-decoration-none text-white">Home</a> /
              <span  onclick="history.back()" class="text-decoration-none text-white">Products</span>
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
              <img class="img-fluid" style="height:100%;width:100%;"src = "{{asset('storage/posterimages/'.$product->poster_image_name)}}" alt = "image">
          </div>
          <div class="col-md-6" >
              <div class = "product-content mt-5">
                  <div class="row">
                      <div class="col">
                          <h2 class = "product-title">{{$product->title}}</h2>
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
                            <p><span><small>No ratings yet!</small></span></p>
                            @endif
                            </div>
                      </div>
                  </div>
                 <div class="row mt-2 mt-md-4">
                  <div class="col">
                      <div class="btn btn-outline-success"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" @if($product->user->profile_image_name==null) src="{{asset('img/undraw_profile.svg')}}" @else src="{{asset($product->user->profile_image_name)}}" @endif /> &nbsp {{ $product->user->name }}</div>
                  </div>
                 </div>

                  <div class = "product-detail mt-2 mt-md-4">
                      <?php
                      $inputSentence = $product->one_line_concept;
                      $wordCount = str_word_count($inputSentence);
                      $sentences = preg_split('/((?:\S+\s+){1,20})/', $inputSentence, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

                      ?>
                      <p>{{ trim($sentences[0]) }}<span id="dots">...</span><span id="more">&nbsp{{ trim($sentences[1])}}</span></p>
                      <button class="btn btn-primary mt-2 mt-md-4" onclick="viewMoreOneLine()" id="myBtn">Read more</button>

                  </div>
                  @if($product->product_type=="ebook")
                  <div class = "purchase-info mt-3">
                    {{-- <a href="{{route('product.cart.add',['product_id'=>$product->id])}}" class = "form-control btn btn-primary mb-2">
                      DOWNLOAD E-BOOK <i class="fa fa-download" aria-hidden="true"></i>

                   </a> --}}
                   <a class="btn btn-primary" href="{{asset("storage/work/".$product->e_book_file_name)}}" download="{{$product->title}}.pdf">DOWNLOAD E-BOOK</a>

                  </div>
                  @elseif($product->product_type=="audiobook")
                  <div class="audio-section">
                    @include('website.includes.audioplayer')
                  </div>
                  <div class = "purchase-info mt-sm-2 mt-md-5">
                    <a href="{{route('product.cart.add',['product_id'=>$product->id])}}" class = "form-control btn btn-primary mb-2">
                       GET AUDIO BOOK<i class="fa fa-download" aria-hidden="true"></i>

                   </a>
                  </div>
                  @else
                  <div class = "purchase-info mt-2 mt-md-5">
                    @if($product->quantity>0)
                    <a href="{{route('product.cart.add',['product_id'=>$product->id])}}" class = "form-control btn btn-primary mb-2">
                       ADD TO CART<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                    <a href="{{route('products.placeorder',["placesingleorder"=>true])}}" class ="form-control btn btn-primary">BUY NOW</a>
                    @else
                    <a href="#" class ="form-control btn btn-primary">OUT OF STOCK</a>

                    @endif
                    {{-- <a href="{{route('products.placeorder')}}" class ="form-control btn btn-primary">DOWNLOAD E-BOOK</a> --}}
                  </div>
                  @endif
                </div>
          </div>
      </div>
      
  </div>

  </div>
  <div class="row m-2 px-md-5">
    <h4 class=""> REVIEWS</h4>
</div>
  <div class="row m-2 p-md-5" >
    <div id="product_reviews_ajax">

    </div>
    @if(Auth::user())
    <form id="commentForm" action="{{route('review.add',['product_id'=>$product->id])}}" method="post">
         @csrf
     <div class="col-md-12 col-sm-12 mb-3" >
         <div class="card mb-3" >
             <div class="card-body">
               <h5 class="card-title"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" @if(Auth::user()->profile_image_name==null) src="{{asset('img/undraw_profile.svg')}}" @else src="{{asset(Auth::user()->profile_image_name)}}" @endif /> &nbsp {{ Auth::user()->name }}</h5>
                 <div class="row">
                     <div class="col">
                         <textarea oninvalid="this.setCustomValidity('Please Enter Comments')" oninput="this.setCustomValidity('')" required  name="comment" placeholder="Add Comments here" class="form-control" ></textarea>
                     </div>
                 </div>
                 <div class="d-flex align-items-center justify-content-between ">
                   <p class="card-text">
                     </p>
                   <a href="" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#ratingStarModel">ADD COMMENT</a>
                 </div>
             </div>
           </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="ratingStarModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"> RATE OUT OF 5</h5>
             <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Edit Comment</button>
             </div>
             <div class="modal-body">
             <div class="rate">
                 <input type="radio" id="star5" name="rate" value="5" />
                 <label for="star5" title="text">5 stars</label>
                 <input type="radio" id="star4" name="rate" value="4" />
                 <label for="star4" title="text">4 stars</label>
                 <input type="radio" id="star3" name="rate" value="3" />
                 <label for="star3" title="text">3 stars</label>
                 <input type="radio" id="star2" name="rate" value="2" />
                 <label for="star2" title="text">2 stars</label>
                 <input type="radio" id="star1" name="rate" value="1" />
                 <label for="star1" title="text">1 star</label>
             </div>
             </div>
             <div class="modal-footer">
             {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
             <button type="submit" id="review-proceed" class="btn btn-primary"> Proceed</button>
             </div>
         </div>
         </div>
     </div>
     </div>
    </form>
    @endif
  </div>

  

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
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "inline";
      }
    }
    </script>
    
@endsection
@section('script')
@include('website.scripts.review_ajax')
<style>
  .card-body{
      background-color: #84c384;
  }
  .card{
      background-color: black;
  }
  textarea.form-control{
      background-color: #c6d8c6;
  }
  textarea.form-control:focus{
      background-color: #a2afa2;
  }
</style>
@endsection