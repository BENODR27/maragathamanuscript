@extends('layouts.subwebsitelayout')
@section('content')
  <div class="product-detail">
    <div class="container-fluid">
      <div class="row" >
          <div class="col-md-6 mt-3">
              <img class="img-fluid" style="height:100%;width:100%;"src = "{{asset($product->poster_image_name)}}" alt = "image">
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
                              <i class = "fa fa-star"></i>
                              @endfor
                            @else
                              NO RATINGS
                            @endif
                              <span>({{$product->viewers}})</span>
                            </div>
                      </div>
                  </div>
                 <div class="row mt-3">
                  <div class="col">
                      <div ><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" /> &nbsp WRITER PROFILE</div>
                  </div>
                 </div>
                  <div class = "product-detail mt-3">
                      <?php
                      $inputSentence = $product->one_line_concept;
                      $sentences = preg_split('/((?:\S+\s+){1,10})/', $inputSentence, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

                      ?>
                      <p>{{trim($sentences[0])}}<span id="dots">...</span><span id="more">&nbsp{{trim($sentences[1])}}</span></p>
                      <button class="btn" onclick="viewMoreOneLine()" id="myBtn">Read more</button>
                  </div>
                  <div class = "purchase-info mt-3">
                    <a href="{{route('product.add.cart')}}" class = "form-control btn btn-primary mb-2">
                      ADD TO CART <i class = "fas fa-shopping-cart"></i>
                    </a>
                    <a href="{{route('products.placeorder')}}" class ="form-control btn btn-primary">BUY NOW</a>
                    
                    {{-- <a href="{{route('products.placeorder')}}" class ="form-control btn btn-primary">DOWNLOAD E-BOOK</a> --}}
                  </div>
                </div>
          </div>
      </div>
     
  </div>
  </div>
    
   

<section id="product-review">
    
    <div class="container mt-3">
        <div class="row m-2">
            <h2>REVIEWS</h2>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                      <h5 class="card-title"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" /> &nbsp demoname</h5>
                      <p class="card-text"><small class="text-muted"><i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i></small></p>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                      <h5 class="card-title"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" /> &nbsp demoname</h5>
                      <p class="card-text"><small class="text-muted"><i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i></small></p>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                      <h5 class="card-title"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" /> &nbsp demoname</h5>
                      <p class="card-text"><small class="text-muted"><i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i></small></p>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                      <h5 class="card-title"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" /> &nbsp demoname</h5>
                      <p class="card-text"><small class="text-muted">
                        <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                                <i class = "fa fa-star"></i>
                            </small>
                        </p>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-12 col-sm-12 mb-3" style="height: 120px">
                <div class="card mb-3" >
                    <div class="card-body">
                      <h5 class="card-title"><img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" /> &nbsp demoname</h5>
                        <div class="row">
                            <div class="col">
                            
                                <textarea  placeholder="Add Comments" class="form-control" ></textarea>
                            </div>
                            
                        </div>
                        <div class="d-flex align-items-center justify-content-between ">
                          <p class="card-text"><small class="text-muted">
                            <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                </small>
                            </p>
                          <a href="" class="btn m-2">ADD COMMENT</a>
                        </div>

                      
                      

                    </div>
                  </div>
            </div>
            
        
    </div>
</section>
<style>
    .product-detail{
    margin-top: 90px;
    }
    #more {display: none;}
   
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