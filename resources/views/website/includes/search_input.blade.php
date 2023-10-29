<div class="search-box">
    <form id="searchProductForm" action="{{route('product.search')}}" method="post">
        @csrf
       
                <input required type="text" list="products" class="form-control" name="product_title" placeholder="Search...">
           
        <i class="bi bi-search" onclick="searchProduct()"></i>
        <datalist id="products">
            @foreach ($products as $product)
            <option value="{{$product->title}}">
            @endforeach
        </datalist>
    </form>
</div>
<script>
function searchProduct(){
    document.getElementById("searchProductForm").submit();
}
</script>