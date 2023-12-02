
<style>
    .home-website{
        min-height: 70vh;
    }
    .product-title{
        font-size: 15px;
    }
    .product-genre{
        font-size: 10px;
        color: rgb(0, 97, 10);
    }
    /* .card-body{
        background-color: #a8dea0;
    } */

    .scrollable-row {
        display: inline-block;
        margin-right: 10px; /* Adjust the spacing between cards */
    }
    /* .home-website{
        margin-top:120px;
        padding-left:50px;
        padding-right:50px;
    } */
    .scrollable-row{
        padding-left: 10px;
    }
    @media screen and (max-width: 768px) {
        .home-website{
        padding-left:0;
        padding-right:0;
    }
    .scrollable-container {
        overflow-x: scroll;
        white-space: nowrap;
        
    }
    }
</style>

<div class="home-website pt-3">

@if(count($segments)>0)
@foreach ($segments as $segment)
@if($segment->name!="SUBJECTS")
@if(count($segment->products)>0)
<div class="container-fluid pb-5">
    
    <div class="mt-2">
        <div class=" d-flex justify-content-between">
                <h3 class="mb-3 ">{{ GoogleTranslate::trans($segment->name, app()->getLocale()) }}</h3>
                <a href="{{route('category.publications_comics_others.products',['segment_id'=>$segment->id])}}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M7.293 4.707 14.586 12l-7.293 7.293 1.414 1.414L17.414 12 8.707 3.293 7.293 4.707z"/></svg>
                </a>
        </div>
        <div class="row">
            <div class="col-12 scrollable-container">
               @foreach ($segment->products as $product)
               <div class="scrollable-row">
                <div class="card  bg-white" style="width: 12rem;">
                    <a href="{{route('category.publications_comics_others.product',['product_id'=>$product->id])}}" >
                        <img src={{asset('storage/thumbnail/posterimages/'.$product->poster_image_name)}} class="card-img-top p-2" alt="Card Image"></a>
                    <div class="card-body">
                       <div class="row">
                        <h6 class="card-text product-title">{{ GoogleTranslate::trans($product->title, app()->getLocale()) }}</h6>
                       </div>
                       <div class="row">
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
                      
                       <div class="row">
                        <div class="col product-genre">
                           {{ GoogleTranslate::trans($product->genreName, app()->getLocale()) }}
                        </div>
                       </div>
                     
                    </div>
                </div>
                </div> 
                 @endforeach
            </div>
        </div>
    </div>
    
</div>
@endif
@endif
@endforeach

@else
<h1 class="text-center p-5">
    COMING SOON
</h1>

@endif

@if(count($segments)>0)
@foreach ($segments as $segment)
@if($segment->name=="SUBJECTS")
<div class="container-fluid pb-5">
    <div class="d-grid gap-2 col-12 p-5">
        <a href="{{route('subject.home')}}" class="btn btn-primary ">{{ GoogleTranslate::trans('SUBJECTS', app()->getLocale()) }}</a>
    </div>
</div>
@endif
@endforeach

@endif
</div>