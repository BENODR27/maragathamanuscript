@extends('layouts.website.layout1')
@section('content')
<div class="container-fluid sub-nav">
    <div class="genre-nav">
        <ul>     
            @foreach ($genres as $genre)
            <li><a href="{{route('genres.list',['genre_id'=>$genre['id']])}}">{{$genre['name']}}</a></li>
            @endforeach           
                  
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="row" >
        @if(count($products)>0)
        @foreach ($products as $product)
        @if($product->product_type=="video")
        @include('website.includes.production_video_item')
        @else
        @include('website.includes.production_audio_item')
        @endif
        @endforeach
        @else 
        <div class="text-center p-5">
            <h3>
                COMING SOON
            </h3>
        </div>
        @endif
     
    </div>
        
    </div>
</div>
<style>
    .card{
        color: #000000;
    }
    li .selected-genre{
         color:  #73da33 !important;
     }
   .sub-nav{
    
     background-color:  #000000;
     overflow-x: scroll;
 white-space: nowrap;
 
   }

   ::-webkit-scrollbar {
 width: 0;
 height: 0;
}
   .genre-nav ul {
     display: flex;
 align-items: center;
     margin-bottom: 0;
 list-style-type: none;
 padding: 25px;
 gap: 73px;
 justify-content: flex-start;
}

.genre-nav ul li:last-child {
 margin-right: 0;
}

.genre-nav a {
 color: #fff; 
 text-decoration: none;
 padding: 10px 20px; 
}

.genre-nav a:hover {
 text-decoration: underline;
}
.product-genre-card{
 background-color: #cedece;
}

 </style>


@endsection