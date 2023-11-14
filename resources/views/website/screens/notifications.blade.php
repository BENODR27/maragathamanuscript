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
    <div class="container-fluid">
     
    @if(count(auth()->user()->unreadNotifications)>0)
    <h5 class="m-3">
      <a class="btn btn-primary" href="{{route('mark-as-read')}}">Mark All As Read</a>
    </h5>
      @foreach (auth()->user()->unreadNotifications as $notification)
      @if ($notification->data['messagetone']=="success")
      <div class="alert alert-success">{{$notification->data['message']}}  
      </div>
      @elseif($notification->data['messagetone']=="error")
     <div class="alert alert-error">{{$notification->data['message']}}</div>
      @elseif($notification->data['messagetone']=="warn")
     <div class="alert alert-warn">{{$notification->data['message']}}</div>
      @elseif($notification->data['messagetone']=="info")
     <div class="alert alert-info">{{$notification->data['message']}}</div>
      @endif
      @endforeach
     @else

     <div class="alert alert-info">No Notications Found</div>
     @endif
    </div>
</div>
<style>


@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300);




.user-about{
  min-height: 50vh;
}

.alert {
	margin: 10px 0px;
	padding:12px;
	border-radius: 5px;

	font-family: 'Open Sans', sans-serif;
	font-size: .9rem;
	font-weight: 300;
	letter-spacing: 1px;
}

.alert:hover {
  cursor: pointer;
}

.alert:before {
	padding-right: 12px;
}
  
.alert:after {
  content: '\f00d';
  font-family: 'FontAwesome';
  float: right;
  padding: 3px;
    &:hover {
      cursor: pointer;
    }
}

.alert-info {
  color: #00529B;
  background-color: #BDE5F8;
  border: 1px solid darken(#BDE5F8, 15%);
}

.alert-info:before {
  content: '\f05a';
  font-family: 'FontAwesome';
}

.alert-warn {
  color: #9F6000;
  background-color: #FEEFB3;
  border: 1px solid darken(#FEEFB3, 15%);
}

.alert-warn:before {
  content: '\f071';
  font-family: 'FontAwesome';
}

.alert-error {
  color: #D8000C;
  background-color: #FFBABA;
  border: 1px solid darken(#FFBABA, 15%);
}

.alert-error:before {
  content: '\f057';
	font-family: 'FontAwesome';
}

.alert-success {
  color: #4F8A10;
  background-color: #DFF2BF;
  border: 1px solid darken(#DFF2BF, 15%);
}

.alert-success:before {
  content: '\f058';
	font-family: 'FontAwesome';
}
</style>

@endsection