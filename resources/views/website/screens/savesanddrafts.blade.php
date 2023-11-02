@extends('layouts.website.layout1')
@section('content')
<div class="container-fluid sub-nav">
    <div class="genre-nav">
        <ul>     
            <li><a href="">Saves </a></li>
            <li><a href="">Drafts </a></li>
                  
                  
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="row" >
       
     
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