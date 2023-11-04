<script>
    $(document).ready(function () {
        var product_id='<?php echo $product->id ?>';
       
        function reviewAjax(){
            $.ajax({
                type: "get",
                url: "/genre/product/reviews/" + product_id,
                success: function (response) {
                    var productContainer = $('#product_reviews'); 
                    productContainer.empty();
                    if(response.length!=0){
                    response.forEach(function (rating) {
                        var productCard;
                        
                            productCard = `
                            <div class="col-md-12 col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <div>
                                            <img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" @if($rating->user->profile_image_name==null) src="{{asset('img/undraw_profile.svg')}}" @else src="{{asset($rating->user->profile_image_name)}}" @endif /> &nbsp {{$rating->user->name}}
                                        </div>
                                        <div>
                                            @if(Auth::user() && Auth::user()->id==$rating->user->id)
                                            <a href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            @endif
                                        </div>
                                        </h5>
                                    <p class="card-text"><small class="text-muted">
                                                @for ($i = 1; $i <= $rating->star_count; $i++)
                                                <i style="color:green"class = "fa fa-star"></i>
                                                @endfor

                                                @for ($i = $rating->star_count+1; $i <= 5; $i++)
                                                <i class = "fa fa-star"></i>
                                                @endfor
                                            </small></p>
                                    <p class="card-text">{{$rating->comment}}.</p>
                                    </div>
                                </div>
                            </div>
                            `;
                        

                         

                        
                            productContainer.append(productCard);
                    });
                    }else{
                        let noProductFound = `<div class="text-center p-5">
                                                    <h1 class="p-5">
                                                        COMING SOON
                                                    </h1>
                                                </div>`;
                        productContainer.append(noProductFound);

                    }
                   
                }
            });
        }
        $(".selected-genre").click(function (e) { 
            e.preventDefault();
            product_id = $(this).attr('data-id');

            $(".selected-genre").css("color", "white");

            $(this).css("color", "green");

            reviewAjax();
        });

        
    });
</script>