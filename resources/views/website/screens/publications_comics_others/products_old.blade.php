@extends('layouts.subwebsitelayout')
@section('content')
<div class="segment-products">
<div class="container">
   
    <div class="row g-4 pb-4">
        @foreach ($products as $product)
            <div class="col-md-2">
                    <div class="card" >
                        <a href="{{route('category.publications_comics_others.product',['product_id'=>$product->id])}}" >
                            <img src={{asset($product->poster_image_name)}} class="card-img-top" alt="Card Image"></a>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->genreName}}</h5>
                            <p class="card-text product-genre">{{$product->title}}</p>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>
</div>
<style>
    .segment-products{
        margin-top:120px;
    }
    .card-body{
            background-color: #a8dea0;
        }
        .product-genre{
        font-size: 10px;
        color: rgb(0, 97, 10);
    }
</style>
@endsection