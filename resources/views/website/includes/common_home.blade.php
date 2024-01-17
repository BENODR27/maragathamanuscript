
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
                <h3 class="mb-3 ">{{ $segment->name}}</h3>
                <a href="{{route('category.publications_comics_others.products',['segment_id'=>$segment->id])}}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M7.293 4.707 14.586 12l-7.293 7.293 1.414 1.414L17.414 12 8.707 3.293 7.293 4.707z"/></svg>
                </a>
        </div>
        <div class="row">
            <div class="col-12 scrollable-container">
               @foreach ($segment->products as $product)
                  
               @include('website.includes.product_card_main')

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
        <a href="{{route('subject.home')}}" class="btn btn-primary ">SUBJECTS</a>
    </div>
</div>
@endif
@endforeach

@endif
</div>