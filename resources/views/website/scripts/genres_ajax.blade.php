<script>
    $(document).ready(function () {
        var genre_id=$(".selected-genre").first().attr('data-id')??0;
        if (genre_id!=0){
            $(".selected-genre").first().css("color", "green");
            genreAjax();
        }
        function genreAjax(){
            $.ajax({
                type: "get",
                url: "/genre/products/" + genre_id,
                success: function (response) {
                    var productContainer = $('#genre-products'); 
                    productContainer.empty();
                    if(response.length!=0){
                    response.forEach(function (product) {
                        var productUrl;
                        var productCard;
                        if(product.product_type=="video"){
                            productCard = `<div class="col-md-4 card product-genre-card p-2">
                                            <div class="row ">
                                                <div class="col">
                                                    <a target="_blank" href="${product.audio_video_url}"><img class="img-fluid" style="height:100%;width:100%;"src = "{{asset('${product.poster_image_name}')}}" alt = "image"></a>
                                                    
                                                </div>
                                                <div class="col" >
                                                    <div class = "product-content mt-4">
                                                                <h5 class="btn btn-outline-success">${product.title}</h5>
                                                                <div class="mt-2">
                                                                    ${product.rating_average !== 0 ? `
                                                                        <small class="text-muted">
                                                                            ${Array.from({ length: product.rating_average }, (_, i) => `
                                                                                <i style="color:green" class="fa fa-star"></i>
                                                                            `).join('')}
                                                                            ${Array.from({ length: 5 - product.rating_average }, () => `
                                                                                <i class="fa fa-star"></i>
                                                                            `).join('')}
                                                                        </small>(${product.viewers})
                                                                    ` : 'No ratings yet!'}
                                                                    
                                                                </div>
                                                               <div> <p class="mt-2 genrecolour">Director :&nbsp <span>${product.director}</span></p>
                                                                <p class="mt-2 genrecolour">Music &nbsp&nbsp&nbsp&nbsp:&nbsp <span>${product.music}</span></p></div>
                                                                
                                                    </div>  
                                                    </div>
                                                </div>
                                        </div>`;
                        }
                        else if(product.product_type=="audiobook"){
                            productCard = `<div class="col-md-4 card product-genre-card p-2">
                                            <div class="row ">
                                                <div class="col">
                                                    <a target="_blank" href="${product.audio_video_url}"><img class="img-fluid" style="height:100%;width:100%;"src = "{{asset('${product.poster_image_name}')}}" alt = "image"></a>
                                                    
                                                </div>
                                                <div class="col" >
                                                    <div class = "product-content mt-2">
                                                                <h5 class="btn btn-outline-success">${product.title}</h5>
                                                                <div class="mt-3">
                                                                    ${product.rating_average !== 0 ? `
                                                                        <small class="text-muted">
                                                                            ${Array.from({ length: product.rating_average }, (_, i) => `
                                                                                <i style="color:green" class="fa fa-star"></i>
                                                                            `).join('')}
                                                                            ${Array.from({ length: 5 - product.rating_average }, () => `
                                                                                <i class="fa fa-star"></i>
                                                                            `).join('')}
                                                                        </small>(${product.viewers})
                                                                    ` : 'No ratings yet!'}
                                                                    
                                                                </div>
                                                                <p class="mt-1 genrecolour"><b>Author</b> : <span>${product.author} </span></p>
                                                    </div>  
                                                </div>
                                                <div class="col text-center d-flex align-items-center justify-content-center" >
                                                    
                                                    <div class="container-play">
                                                        <a target="_blank" href="${product.audio_video_url}"><i class="fas fa-play"></i></a>
                                                    </div>  
                                                   
                                                </div>
                                            </div>
                                        </div>`;
                        }
                        
                        else{
                            productCard = `
                            <div class="col-md-4 card product-genre-card p-2">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{route('category.publications_comics_others.product')}}?product_id=${product.id}"><img class="img-fluid" style="height:100%;width:100%;" src="{{asset('${product.poster_image_name}')}}" alt="image"></a>
                                    </div>
                                    <div class="col">
                                        <div class="product-content mt-4">
                                            <h5>${product.title}</h5>
                                            <div class="mt-4">
                                                ${product.rating_average !== 0 ? `
                                                    <small class="text-muted">
                                                        ${Array.from({ length: product.rating_average }, (_, i) => `
                                                            <i style="color:green" class="fa fa-star"></i>
                                                        `).join('')}
                                                        ${Array.from({ length: 5 - product.rating_average }, () => `
                                                            <i class="fa fa-star"></i>
                                                        `).join('')}
                                                    </small> (${product.viewers})
                                                ` : 'No ratings yet!'}
                                               
                                            </div>
                                            ${product.price !== 0 ? `<div class="btn btn-primary mt-4">₹${product.price}</div>` : '<div class="btn btn-primary mt-4">FREE</div>'}
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        }

                         

                        
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
            genre_id = $(this).attr('data-id');

            $(".selected-genre").css("color", "white");

            $(this).css("color", "green");

            genreAjax();
        });

        
    });
</script>
<style>
    .genrecolour{
        color: green;
    }
    .genrecolour span{
        color: black;
    }
</style>