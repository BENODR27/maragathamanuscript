<div class="col-md-4 card product-genre-card p-2">
    <div class="row ">
        <div class="col">
            <a href="{{route('category.publications_comics_others.product',['product_id'=>$product->id])}}"><img class="img-fluid" style="height:100%;width:100%;"src = "{{asset($product->poster_image_name)}}" alt = "image"></a>
            
        </div>
        <div class="col" >
            <div class = "product-content mt-4">
                        <h6 >{{$product->viewers}}</h6>
                        <h5 >{{$product->title}}</h5>
                        <div>{{$product->rating_average==0?"NO RATINGS":$product->rating_average}}({{$product->viewers}})</div>
                        <p >MUSIC BY: {{$product->music}}</p>
                        <div class="btn btn-primary">DIRECTION: {{$product->director}}</div>
            </div>  
              </div>
        </div>
        
</div>