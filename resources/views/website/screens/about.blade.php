@extends('layouts.website.layout1')
@section('content')
<!-- header banner -->
<section class="header-banner bookpress-parallax p-5" id="header-banner-id">
  <div class="container d-flex justify-content-between align-items-center text-white">
      <div class="overlay-out">
          <h1 class="banner-title">{{$pageTitle}}</h1>
          <p class="text-white"><a href="/" class="text-decoration-none text-white">Home</a> /
              {{-- <span  onclick="history.back()" class="text-decoration-none text-white">Appointments</span> --}}
          </p>
      </div>
      <img src="{{asset("layout/assets/images/banner-image.png")}}" class="img-fluid" alt="Books">
      <div class="parallax start-0 top-0 w-100 h-100"></div>
  </div>
</section>
<!-- header banner end -->
<div class="user-about">
    <div class="container-fluid mt-3 mb-3">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
              <div>
                <h3>
                  PROFILE
                </h3>

              </div>
              <div>
                <a id="link_id" hidden  href="www.google.com"></a>
                  <i class="fa fa-share-alt" onclick="copyFunction()" aria-hidden="true"></i>
              </div>
            </div>
            <div class="card-body subheader">
              <div class="row">
                <div class="col mt-3">
                    <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUQHvRu2YQwSej0i9xzdubvVi7i8FGCrEYye688jOh42InYdYk4cByUTJn81a4hm_EAB8&usqp=CAU" alt = "image">  
                </div>
                <div class="col" >
                    <div class = "product-content mt-4">
                                <h5 >{{$user->name}}&nbsp <a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i></a></h5>
                                <p >{{$user->email}}</p>
                                <p >4.6(56)</p>
                    </div>
                </div>
            </div>
            </div>
              <ul class="list-group list-group-flush">
              <a href="{{route('order.list')}}" class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
                
                <div>Orders</div>
                <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
              </a>
              <a href="{{route('product.cart.list')}}" class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
                
                <div>Cart</div>
                <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
              </a>
              <a href="{{route('submission.list')}}" class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
                
                <div>submission({{$user->submissionCount}})</div>
                <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
              </a>
              <a href="{{route('appointment.list')}}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                
                <div>
                  Appointments({{$user->appointmentsCount}})
                </div>
                <div>
                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">My Saves & Drafts</a>
              <div class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
                <div>Settings</div>
                <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
              </div>
              <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                <div>Profile Visibility</div>
                <div><a class="btn btn-primary"href="{{route('website.user.publicToggle',['user_id'=>$user->id])}}">{{$user->public?"PUBLIC":"PRIVATE"}}</a></div>
              </div>
           
                <a class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  
                  <div>About Company</div>
                  <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                </a>
            
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                  Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
              </div>
              <a href="{{route('website.logout')}}" class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
              <div>
                Logout
              </div>
              <div>
                <i class="fa fa-sign-out" aria-hidden="true"></i>
              </div>
              </a>

            </ul>
          </div>
    </div>
    
</div>
<style>
  *{
    padding: 2px;
  }
  a .list-group-item,.list-group-item{
    background-color:#c6d8c6;
  }
 .card-header{
  background-color: #4a823c;
 }
  .card-body{
    background-color:#c6d8c6;
  }
   a{
    padding: 20px;
   }
   .list-group-flush>.list-group-item {
    margin-top: 5px;
}  
</style>
<script>
  function copyFunction() {
  var copyText = document.getElementById("link_id").getAttribute("href");
  function copyStringToClipboard(str) {
    var element = document.createElement('textarea');
    element.value = str;
    element.setAttribute('readonly','');
    element.style = {position:'absolute',left:'-9999px'};
    document.body.appendChild(element);
    element.select();
    document.execCommand('copy');
    document.body.removeChild(element);
  } 
  copyStringToClipboard(copyText);
  alert("URL copied to clipboard");}
</script>
@endsection