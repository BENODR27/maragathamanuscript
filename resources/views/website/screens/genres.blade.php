@extends('layouts.website.layout1')
@section('content')
 
    <style>
        #genre-products-list{
            min-height: 50vh;
        }
       li .selected-genre{
            color:  #ffffff ;
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
    gap: 80px;
    justify-content: flex-start;
}
.genre-nav ul li {
   
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

.container-play .fas{
  display:grid;
  place-items:center;
  font-size:4rem;
  color:black;
}

.container-play:active .fas{
  color:green;
}
    </style>
<div class="container-fluid sub-nav">
    <div class="genre-nav">
        <ul>
            @foreach ($genres as $genre)
            <li>
                <div class="selected-genre"  data-id="{{$genre['id']}}">{{ GoogleTranslate::trans($genre['name'], app()->getLocale()) }}</div>
            </li>
            @endforeach           
        </ul>
    </div>
</div>
<div class="container-fluid" id="genre-products-list">
    <div class="row " id="genre-products">
        
    </div>
        
    </div>
</div>

@endsection
@section('script')
@include('website.scripts.genres_ajax')
@endsection