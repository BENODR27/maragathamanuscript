<script>
    $(document).ready(function () {
        var product_id='<?php echo $product->id ?>';
       
        function reviewAjax(){
            $.ajax({
                type: "get",
                url: "/genre/product/reviews/" + product_id,
                success: function (response) {
                    console.log(response);
                    var reviewContainer = $('#product_reviews_ajax'); 
                    reviewContainer.empty();
                    if(response.length!=0){
                    response.forEach(function (rating) {
                        let reviewCard;
                            reviewCard = `
                            <div class="col-md-12 col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <div>
                                            <img style="height:30px;width:30px;" class="rounded-circle" alt="avatar1"
                                            src="{{asset('storage/thumbnail/profileimage/${rating.user.profile_image_name}')}}" /> &nbsp;
                                            ${rating.user.name }
                                        </div>
                    
                                        </h5>
                                    <p class="card-text">
                                        <small class="text-muted">
                                                        ${Array.from({ length: rating.star_count }, (_, i) => `
                                                            <i style="color:green" class="fa fa-star"></i>
                                                        `).join('')}
                                                        ${Array.from({ length: 5 - rating.star_count }, () => `
                                                            <i class="fa fa-star"></i>
                                                        `).join('')}
                                                    </small>
                                        </p>
                                    <p class="card-text">${rating.comment}</p>
                                    </div>
                                </div>
                            </div>
                            `;
                            reviewContainer.append(reviewCard);
                    });
                    }else{
                        let noProductFound = ``;
                        reviewContainer.append(noProductFound);

                    }                       
                   
                }
            });
        }
        reviewAjax();

        $("#commentForm").submit(function (event) {
            event.preventDefault(); // Prevent the default form submission
            $('#ratingStarModel').modal('hide');
            // Get form data
            var formData = $(this).serialize();
            var form = $(this);
            // Send AJAX request
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function (response) {
                    console.log(response);
                    form[0].reset();
                    reviewAjax();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error adding comment');
                }
            });
        });
    });
  </script>