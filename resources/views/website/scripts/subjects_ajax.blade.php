<script>
$(document).ready(function () {
    let isTamilSelected=0;
    let isEnglishSelected=0;
    let selectedDepartmentId=0;
    
    $('.selectedDepartmentAll').removeClass('text-white');
     $('.selectedDepartmentAll').css("color", "green");
    $('.tamilbutton').click(function (e) { 
        e.preventDefault();
        isTamilSelected=(isTamilSelected==1)?0:1;
        if(isTamilSelected==1){
            $(this).removeClass('text-white');
            $(this).css("color", "green");
        }else{
            $(this).addClass('text-white');
        }
        
       
        SubjectAjax();
    });
    $('.englishbutton').click(function (e) { 
        e.preventDefault();
        isEnglishSelected=(isEnglishSelected==1)?0:1;

        if(isEnglishSelected==1){
            $(this).removeClass('text-white');
            $(this).css("color", "green");
        }else{
            $(this).addClass('text-white');
        }
        SubjectAjax();
    });
    $('.selectedDepartment').click(function (e) { 
        e.preventDefault();
        selectedDepartmentId =$(this).attr('data-id');
            $('.selectedDepartment').addClass('text-white');
            $(this).removeClass('text-white');
            $(this).css("color", "green");
       
        SubjectAjax();
    });
    function SubjectAjax(){
            $.ajax({
            type: "get",
            url: "/list/subjects/filter/"+isTamilSelected+"/"+isEnglishSelected+"/"+selectedDepartmentId,
            success: function (response) {
                var productContainer = $('#subject-parent'); 
                        productContainer.empty();
                        if(response.length!=0){
                        response.forEach(function (product) {
                        
                                productCard = `
                                <div class="col-md-4 card product-genre-card p-2">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{route('category.publications_comics_others.product')}}?product_id=${product.id}"><img class="img-fluid" style="height:100%;width:100%;" src="{{asset('${product.poster_image_name}')}}" alt="image"></a>
                                        </div>
                                        <div class="col">
                                            <div class="product-content mt-4">
                                                <h5>${product.title}</h5>
                                                <div class="mt-2">
                                                    <small class="text-muted">
                                                        ${Array.from({ length: product.rating_average }, (_, i) => `
                                                            <i style="color:green" class="fa fa-star"></i>
                                                        `).join('')}
                                                        ${Array.from({ length: 5 - product.rating_average }, () => `
                                                            <i class="fa fa-star"></i>
                                                        `).join('')}
                                                    </small>
                                                    (${product.viewers})
                                                </div>
                                                <p class="mt-2"> Status</p>
                                                <div class="btn btn-primary mt-3">₹${product.price}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                productContainer.append(productCard);
                        });
                        }else{
                            let noProductFound = `<div class="text-center p-5">
                                                        <h3 class="p-5">
                                                          Selected Subject Not Available
                                                        </h3>
                                                    </div>`;
                            productContainer.append(noProductFound);

                        }
            }
            });
    }
    SubjectAjax();
    
});
</script>