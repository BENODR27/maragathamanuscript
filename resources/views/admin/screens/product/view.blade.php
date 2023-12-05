@extends('layouts.adminlayout')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
 <!-- Page Heading -->

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3 d-flex justify-content-between">
         <h6 class="font-weight-bold text-primary">PRODUCT-ID-{{$product->id}}</h6> 

          <div>
            (Click Here To Change Status)
            <a class="btn btn-primary"href="{{route('product.toggleStatus',["product_id"=>$product->id])}}">{{$product->is_active?"Active":"Inactive"}}</a>
            <a class="btn btn-primary"href="{{route('product.edit',['product_id'=>$product->id])}}">Edit</a>

          </div>
     </div>
     <div class="card-body">
        <ul class="list-group">
            
            <a href="#" class="list-group-item list-group-item-action active">
                PRODUCT DETAILS
              </a>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Title:
                <span class="badge badge-primary badge-pill p-2">{{$product->title}}</span>

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Product Type:
                <span class="badge badge-primary badge-pill p-2">{{$product->product_type}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Language:
                <span class="badge badge-primary badge-pill p-2">{{$product->language}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Product By:
                <span class="badge badge-primary badge-pill p-2">{{$product->user_id}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Price:
                <span class="badge badge-primary badge-pill p-2">{{$product->price}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Quantity:
                <span class="badge badge-primary badge-pill p-2">{{$product->quantity}}</span>
              </li>
             
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Rating Average:
                <span class="badge badge-primary badge-pill p-2">{{$product->rating_average}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
               
                <span > One Line Concept: {{$product->one_line_concept}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Viewers:
                <span class="badge badge-primary badge-pill p-2">{{$product->viewers}}</span>
              </li>
             @if($product->published_at!=null)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Published At:
                <span class="badge badge-primary badge-pill p-2">{{$product->published_at}}</span>
              </li>
             @endif
             @if($product->director!=null)

              <li class="list-group-item d-flex justify-content-between align-items-center">
                Director:
                <span class="badge badge-primary badge-pill p-2">{{$product->director}}</span>
              </li>
              @endif
              @if($product->music!=null)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Music:
                <span class="badge badge-primary badge-pill p-2">{{$product->music}}</span>
              </li>
              @endif
              @if($product->author!=null)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Author:
                <span class="badge badge-primary badge-pill p-2">{{$product->author}}</span>
              </li>
              @endif
              @if($product->e_book_file_name!=null)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                E-Book:
                <span class="badge badge-primary badge-pill p-2"> <a class="btn btn-primary" href="{{asset("storage/work/".$product->e_book_file_name)}}" download="{{$product->title}}">DOWNLOAD</a>
                </span>
              </li>
              @endif
              @if($product->audio_video_url!=null)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Audio/Video Url:
                <span class="badge badge-primary badge-pill p-2">{{$product->audio_video_url}}</span>
              </li>
              @endif
             
              <li class="list-group-item d-flex justify-content-between align-items-center">
                    <label>Uploaded Poster/ Thumbnail Image:</label>
                    <img id="uploaded_image" src="{{asset('storage/thumbnail/posterimages/'.$product->poster_image_name)}}" alt="Uploaded Image" style="max-width: 100px;">
               
              </li>
             
            
          </ul>
        
       
          <ul class="list-group pt-3">
            <a href="#" class="list-group-item list-group-item-action active">
                BELONGS TO
              </a>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Category
                <span class="badge badge-primary badge-pill p-2">{{$product->category}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Segment
                <span class="badge badge-primary badge-pill p-2">{{$product->segment}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Genre
                <span class="badge badge-primary badge-pill p-2">{{$product->genre}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">

                Department
                <span class="badge badge-primary badge-pill p-2">{{$product->department}}</span>
              </li>
             
            
          </ul>
        
     </div>
 </div>


</div>
<!-- /.container-fluid -->
@endsection