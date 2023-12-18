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
                <a id="link_id" hidden  href="{{route('website.user.share',["shared_id"=>$user->id])}}"></a>
                  <i class="fa fa-share-alt" onclick="copyFunction()" aria-hidden="true"></i>
              </div>
            </div>
            <div class="card-body subheader">
              <div class="row">
                <div class="col mt-3">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                        {{-- <label for="imageUpload"></label> --}}
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url('{{asset('storage/profile/'.$user->profile_image_name)}}');">
                        </div>
                    </div>
                </div>
                    {{-- <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUQHvRu2YQwSej0i9xzdubvVi7i8FGCrEYye688jOh42InYdYk4cByUTJn81a4hm_EAB8&usqp=CAU" alt = "image">   --}}
                </div>
                <div class="col" >
                    <div class = "product-content mt-4">
                                <h5 >{{$user->name}}</h5>
                                <p >{{$user->email}}</p>
                                {{-- <p >4.6(56)</p> --}}
                    </div>
                </div>
            </div>
            </div>
              <ul class="list-group list-group-flush">


                <a class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#settingscoll" role="button" aria-expanded="false" aria-controls="settingscoll">
                  
                  <div>Settings</div>
                  <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                </a>
            
              <div class="collapse" id="settingscoll">
                <div class="card card-body">
                  <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                    <div>Profile Visibility</div>
                    <div><a class="btn btn-primary"href="{{route('website.user.publicToggle',['user_id'=>$user->id])}}">{{$user->public?"PUBLIC":"PRIVATE"}}</a></div>
                  </div>              
                  <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                    <div>Edit Profile</div>
                    {{-- @include('includes.imagecrop') --}}
                    <div><a class="btn btn-primary" href="{{route('website.user.edit',['user_id'=>$user->id])}}">Edit</a></div>
                  </div>              
                </div>
              </div>

                {{-- <div class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
                  <div>Settings</div>
                  <div><i class="fa fa-pencil-square" aria-hidden="true"></i></div>
                </div> --}}
              <a href="{{route('order.list')}}" class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
                
                <div>Orders</div>
                <div><i class="fa fa-caret-right" aria-hidden="true"></i></div>
              </a>
              <a href="{{route('product.cart.list')}}" class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
                
                <div>Cart</div>
                <div><i class="fa fa-caret-right" aria-hidden="true"></i></div>
              </a>
              <a href="{{route('submission.list')}}" class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
                
                <div>submission({{$user->works->count()}})</div>
                <div><i class="fa fa-caret-right" aria-hidden="true"></i></div>
              </a>
              <a href="{{route('appointment.list')}}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                
                <div>
                  Appointments({{$user->appointments->count()}})
                </div>
                <div>
                  <i class="fa fa-caret-right" aria-hidden="true"></i>
                </div>
              </a>
              {{-- <a href="{{route('draft.list')}}" class="list-group-item list-group-item-action">My Saves & Drafts</a> --}}
              
              {{-- <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                <div>Profile Visibility</div>
                <div><a class="btn btn-primary"href="{{route('website.user.publicToggle',['user_id'=>$user->id])}}">{{$user->public?"PUBLIC":"PRIVATE"}}</a></div>
              </div> --}}
           
                <a class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  
                  <div>About Company</div>
                  <div><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                </a>
            
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                  Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
              </div>
              <a onclick="return confirm('Are you sure you want to logout?');" href="{{route('website.logout')}}" class="list-group-item list-group-item-action  d-flex align-items-center justify-content-between">
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

<style>


.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f14b";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
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