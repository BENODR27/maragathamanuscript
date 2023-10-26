@extends('layouts.websitelayout1')
@section('content')
<section class="landing-page">
<div class="container">
    <div class="p-5">
    <div class="category-heading text-center">
       <h3>WELCOME TO JAS BOOK-VERSE</h3>
       <h5>select the category</h5>
    </div>
    <div class="category-list pt-5 pb-5">
        <div class="row gap-5">
            @if(count($categories)>0)
                    @foreach ($categories as $category)
                        @if($category->name!="OTHERS")
                        <div class="col">
                            <div class="text-center">
                                <h3>
                                    {{$category->description}}
                                </h3>
                                <div class="category-image">
                                    <a href="{{route('category.segments',['category_id'=>$category->id])}}">
                                    <img src="{{asset($category->category_image_name)}}" class="img-fluid"alt="cat1">
                                </a>
                                </div>                   
                                <h1 class="mt-3">
                                    {{$category->name}}
                                </h1>
                            </div>
                        </div>
                        @endif
                    @endforeach
            @else
                     <div>
                        NO CATEGORIES FOUND
                     </div>         
             @endif
        </div>
        

    </div>
                    @foreach ($categories as $category)
                    @if($category->name=="OTHERS")
                    <div class="d-grid gap-2 col-10 mx-auto">
                        <a href="{{route('category.segments',['category_id'=>$category->id])}}" class="btn btn-primary ">OTHERS</a>
                    </div>
                    @endif
                    @endforeach
   

</div>
</div>
</section>
@endsection