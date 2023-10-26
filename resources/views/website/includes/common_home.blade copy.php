
<style>
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

<div class="home-website">
<div class="container-fluid">
    <div class="input-group mb-3">
        <input
          type="text"
          class="form-control"
          placeholder="SEARCH HERE"
          aria-label="Recipient's username"
          aria-describedby="button-addon2"
        />
        <button class="btn btn-primary" type="button" id="button-addon2">
          Search
        </button>
      </div>
</div>
@foreach ($segments as $segment)
@if(count($segment->products)>0)
<div class="container-fluid pb-5">
    
    <div class="mt-2">
        <div class=" d-flex justify-content-between">
                <h3 class="mb-3 ">{{$segment->name}}</h3>
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
                        <img src={{asset($product->poster_image_name)}} class="card-img-top p-2" alt="Card Image"></a>
                    <div class="card-body">
                       <div class="row">
                        <h6 class="card-text product-title">{{$product->title}}</h6>
                       </div>
                      
                       <div class="row">
                        <div class="col product-genre">
                            {{$product->genreName}}
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
@endforeach


<div class="container-fluid pb-5">
    <div class="d-grid gap-2 col-12 p-5">
        <a href="{{route('subject.home')}}" class="btn btn-primary ">SUBJECTS</a>
    </div>
</div>
</div>