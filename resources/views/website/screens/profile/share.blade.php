@extends('layouts.website.layout1')
@section('content')

<div class="user-about">
    <div class="container-fluid mt-3 mb-3">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
              <div>
                <h3>
                  AUTHOR
                </h3>

              </div>
       
            </div>
            <div class="card-body subheader">
              <div class="row">
                <div class="col mt-3">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url('http://i.pravatar.cc/500?img=7');">
                        </div>
                    </div>
                </div>
                    {{-- <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUQHvRu2YQwSej0i9xzdubvVi7i8FGCrEYye688jOh42InYdYk4cByUTJn81a4hm_EAB8&usqp=CAU" alt = "image">   --}}
                </div>
                <div class="col" >
                    <div class = "product-content mt-4">
                                <h5 >{{$user->name}}</h5>
                                <p >{{$user->email}}</p>
                                <p >4.6(56)</p>
                    </div>
                </div>
            </div>
            </div>
              <ul class="list-group list-group-flush">
              <a href="{{route('website.user.products',['user_id'=>$user->id])}}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                
                <div>
                  MY BOOKS({{$user->products->count()}})
                </div>
                <div>
                  <i class="fa fa-caret-right" aria-hidden="true"></i>
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
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>
@endsection