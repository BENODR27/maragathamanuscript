                        <!-- product  -->
                        
                        <div class="col segment-product">
                            <div class="bg-white p-2 bordered-shadow">
                                <a href="{{route('category.publications_comics_others.product',['product_id'=>$product->id])}}" >
                                <img src="{{ Storage::disk('s3')->url('posterimages/thumbnail/'.$product->poster_image_name) }}" alt="Product Image" class="img-fluid">
                                
                                    <h5 class="mt-2">{{ $product->title }}</h5>
                                    <div class = "product-rating">
                                        @if($product->rating_average!=0)
                                          @for ($i = 1; $i <= $product->rating_average; $i++)
                                          <i style="color:green"class = "fa fa-star"></i>
                                          @endfor
                                          @for ($i = $product->rating_average+1; $i <= 5; $i++)
                                          <i class = "fa fa-star"></i>
                                          @endfor
                                          <span>({{$product->viewers}})</span>
                                        @else
                                        <p><span><small>No ratings yet!</small></span></p>
                                        @endif
                                          
                                        </div>
                                <p class="genre-text">{{ $product->genre->name }}</p>

                                {{-- <div class="d-flex justify-content-between pt-3">
                                    <h4 class="text-primary">{{$product->price}}  &#8377;</h4>
                                    <h5 class="text-decoration-line-through">{{$product->price+100}}  &#8377;</h5>
                                </div> --}}
                            </a>
                            </div>
                        </div>
                    
                        <!-- product  end-->