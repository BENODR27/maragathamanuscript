<!doctype html>
<html lang="en">
  <head>
    <title> Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"href="main.css">
    <link rel="stylesheet"href="cart.css">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  
  <style>
       .cart-products{
            margin-top: 120px;
            
        }
        body{
            background-color: #cedece;
        }

    .cover{
    position: relative;
    z-index: 0;
    width: 100%;
    background: #e79702;
}
.phone{
    z-index: 1;
    font-weight: 200;
}
.phone i{
    color: #000;
}
.phone a{
    color:#000;
    font-size: 13px;
    font-weight: bold;
}
.reg{
    width: 50%;
    text-align:right;
}
.reg a{
    color:#000;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: bold;
}
.social-icon{
    display: inline-block;
    width: 50%;
    
}
.social-icon p{
    display:block;
    width: 100%;

}
.social-icon p a{
    height: 30px;
    margin-right: 10px;
}
.social-icon p a i{
    font-size: 13px;
    color: #000;
}
.social-icon p a:hover{
    background: #f8aa02;
    border-color: #f8aa02;
}
.social-icon p a:hover i{ 
    color:#fff;
}
/*==========Navbar=============*/
.bg-color{
    background: #0f0f0ffb;
}
.navbar-brand{
    color:#f8aa02;
    font-weight: bold;
    font-size: 35px!important;
}
.nav-link{
    font-weight: bold;
    color: #f8aa02;
    font-size: 20px;
}
.btn-group{
    color: #f8aa02;
}
.navbar-toggler i{
    color: #f8aa02;
}
/*========End of Navbar===========*/
/*==========Hero Section===========*/
#hero{
    display:table;
    width: 100%;
    height: 60vh;
    background: url(./images/hero-2.jpg) top center;
    background-size: cover;
}
@media (min-width: 1024px){
    #hero{
        background-attachment: fixed;
    }
}

#hero .hero-logo{
    margin: 20px;
    max-width: 100%;
}
#hero .hero-container{
    background: rgba(0,0,0,0.2);
    display: table-cell;
    margin: 0;
    padding:0;
    text-align: center;
    vertical-align: middle;
}
#hero h1{
    margin: 30px 0 10px 0;
    font-weight: bold;
    line-height: 48px;
    text-transform: uppercase;
    color: #fff;
}
@media (max-width: 768px){
    #hero h1{
        font-size: 28px;
        line-height: 36px;
    }
}
#hero h2{
    color: #fff;
    margin-bottom: 50px;
    font-style: italic;
}
@media (max-width: 768px){
    #hero h2{
        font-size: 24px;
        line-height: 26px;
        margin-bottom: 30px;
    }
    
}
#hero .actions a{
    text-transform: uppercase;
    font-weight: bold;
    font-size: 16px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 8px 20px;
    border-radius: 2px;
    transition: 0.5s;
    margin: 10px;
}
#hero .btn-get-started{
    background: #ebe703;
    border: 2px solid #a85303;
    color: #fff;
}
#hero .btn-get-started:hover{
    background: none;
    border: 2px solid #fff;
    color: #fff;
    text-decoration: none;
    font-style: italic;
}
.cart .table{
    margin-bottom: 30px;
    border-bottom: 1px solid #fff;
}
.cart .table thead tr th{
    border-top:0px;
    font-size:16px;
    font-weight: bold;
    border-bottom:0px;
}
.cart .table thead tr td{
    padding-top:30px;
    padding-bottom: 30px;
    vertical-align: middle;
    align-self: center;
}
.cart .table tbody tr td .main .d-flex{
    padding-right:30px;
}
.cart .table tbody tr td .main .d-flex img{
    border: 2px solid #000;
    border-radius: 3px;
}
.cart .table tbody tr td .main .des{
    vertical-align: middle;
    align-self: center;
}
.cart .table tbody tr td .main .des p{
    margin-bottom:0px;
}
.cart .table tbody tr td h6{
    font-size:16px;
    color:#000;
    margin-bottom: 0px;
}
.cart .table tbody tr td .counter{
    margin-bottom:0px;
}
.counter i{
    border: 1px solid #000;
    padding: 7px;
    display: inline-block;
    position: relative;
}
.cart .table tbody tr td .counter input{
    width: 100px;
    padding-left:30px;
    height: 40px;
    outline:none;
    box-shadow: none;
}
.checkout ul{
    border: 2px solid #ebebeb;
    background: #f3f3f3;
    padding-left:25px;
    padding-right:25px;
    padding-top:16px;
    padding-bottom: 20px;
}
.checkout ul li{
    list-style: none;
    font-size:16px;
    font-weight: bold;
    color:#252525;
    text-transform: uppercase;
    overflow: hidden;
}
.checkout ul li.subtotal{
    font-weight: bold;
    text-transform: capitalize;
    border-bottom:1px solid #fff;
    padding-bottom: 14px;
}
.checkout ul li.subtotal span{
    font-weight: bold;
}
.checkout ul li.cart-total{
    padding-top: 10px
}
.checkout ul li.cart-total span{
    color:#e7ab3c;
}
.checkout ul li span{
    float:right;
}
.checkout .proceed-btn{
    font-size:15px;
    font-weight: bold;
    color:#000000;
    background:#4a823c;
    text-transform: uppercase;
    padding:15px 25px 14px 25px;
    display: block;
    text-align: center;
}

.carttable{
    color: #000000 !important;
    background-color: #4a823c;
}
  </style>
  <body>
    @include('website.includes.subheader')
    <!--Cart Section-->
    <div class="cart-products">
        <div class="container">
            <div class="cart">
            <div class="table-responsive">
                <table class="table">
                    <thead class="carttable">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($carts)>0)
                        @foreach ($carts as $cart)
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                                    </div>
                                    <div class="des">
                                        <p>{{$cart->product->title}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6> &#8377; {{$cart->product->price}}</h6>
                            </td>
                            <td>
                                <div class="counter">
                                   
                                    <input readonly class="input-number"type="text"
                                    value="1"min="0"max="10">
                                  
                                </div>
                            </td>
                            <td>
                                <a href="{{route('cart.product.delete',['cart_id'=>$cart->id])}}" class="btn">REMOVE</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                         <tr>
                           <td colspan="4" class="text-center">
                            YOUR CART IS EMPTY
                           </td>
                         </tr>
                        @endif
                        
                       
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    @if(count($carts)>0)
    <div class="col-lg-4 offset-lg-4">
        <div class="checkout">
            <ul>
                {{-- <li class="subtotal">subtotal
                    <span>$60.00</span>
                </li> --}}
                <li class="cart-total">Total
                <span> &#8377; {{$totalPrice}}</span></li>
            </ul>
            
            <a href="{{route('products.placeorder',["placesingleorder"=>false])}}"class="proceed-btn">Proceed to Checkout</a>
           
        </div>
    </div>
    @endif
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>