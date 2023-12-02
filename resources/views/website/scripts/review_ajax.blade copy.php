<script>
    $(document).ready(function () {
        var product_id='<?php echo $product->id ?>';
       
        function reviewAjax(){
            $.ajax({
                type: "get",
                url: "/genre/product/reviews/" + product_id,
                success: function (response) {
                    console.log(response);
                    // var reviewContainer = $('#product_reviews_ajax'); 
                    // reviewContainer.empty();
                    // if(response.length!=0){
                    // response.forEach(function (rating) {
                    //     var reviewCard;
                    //         reviewCard = `
                    //         <div class="col-md-12 col-sm-12">
                    //             <div class="card mb-3">
                    //                 <div class="card-body">
                    //                 <h5 class="card-title d-flex justify-content-between">
                    //                     <div>
                    //                         // <img style="height:30px;width:30px;"class="rounded-circle" alt="avatar1" @if($rating->user->profile_image_name==null) src="{{asset('img/undraw_profile.svg')}}" @else src="{{asset($rating->user->profile_image_name)}}" @endif /> &nbsp {{ GoogleTranslate::trans($rating->user->name, app()->getLocale()) }}
                    //                     </div>
                    //                     <div>
                                        
                    //                     </div>
                    //                     </h5>
                    //                 <p class="card-text"><small class="text-muted">
                    //                 <p class="card-text">{{ GoogleTranslate::trans('${rating.comment}', app()->getLocale()) }}</p>
                    //                 </div>
                    //             </div>
                    //         </div>
                    //         `;
                    //         reviewContainer.append(reviewCard);
                    // });
                    // }else{
                    //     let noProductFound = ``;
                    //     reviewContainer.append(noProductFound);

                    // }                           ${rating.rating_average !== 0 ? `
                    //                                 <small class="text-muted">
                    //                                     ${Array.from({ length: rating.rating_average }, (_, i) => `
                    //                                         <i style="color:green" class="fa fa-star"></i>
                    //                                     `).join('')}
                    //                                     ${Array.from({ length: 5 - rating.rating_average }, () => `
                    //                                         <i class="fa fa-star"></i>
                    //                                     `).join('')}
                    //                                 </small> (${rating.viewers})
                    //                             ` : '{{ GoogleTranslate::trans("No ratings yet!", app()->getLocale()) }}'}
                    //                         </small></p>
             
                   
                }
            });
        }
    });
</script>