@extends('layouts.website.layout1')
@section('content')
<div class="container-fluid sub-nav">
   
    <div class="genre-nav">
        <ul>     
          <li><div class="selectedDepartment text-white selectedDepartmentAll" data-id="0">All</div></li>

            @foreach ($departments as $department)
            @if($department->name!="OTHERS")
            <li><div class="selectedDepartment text-white " data-id="{{$department->id}}">{{$department->name}}</div></li>
            @endif
            @if($department->name=="OTHERS")
            <li style="padding-right:40px;"><div class="selectedDepartment text-white" data-id="{{$department->id}}">{{$department->name}}</div></li>
            @endif
            @endforeach           
                  
        </ul>
    </div>
</div>
<div class="container-fluid sub-nav">
    <div class="genre-nav">
        <ul>     
            <li><div class=" text-white tamilbutton" >Tamil</div></li>
            <li><div class=" text-white englishbutton">English</div></li>
                  
        </ul>
    </div>
</div>
<div class="container-fluid subject-parent">
    <div class="row" id="subject-parent">
        
     
    </div>
        
    </div>
</div>
<style>
    .subject-parent{
        min-height: 70vh;
    }
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
@section('script')
@include('website.scripts.subjects_ajax')
@endsection