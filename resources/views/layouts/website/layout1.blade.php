<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='dns-prefetch' href='//bookpresstheme.com' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel="stylesheet" href="{{asset("layout/assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("layout/assets/css/bootstrap-icons.min.css")}}">

    <!-- fontawesome -->
    <link href="{{asset("layout/assets/css/fontawesome/fontawesome.css")}}" rel="stylesheet">
    <link href="{{asset("layout/assets/css/fontawesome/brands.css")}}" rel="stylesheet">
    <link href="{{asset("layout/assets/css/fontawesome/solid.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset("layout/assets/css/style.css")}}">
    <title>MM</title>
</head>
<script>
  window.addEventListener('load', function() {
    document.getElementById('preloader').style.display = 'none';
});


</script>

<body data-bs-spy="scroll" data-bs-target="#navbarSupportedContent">
  <!-- header -->
  <header id="navbar_top" class="bg-white">
    
        @include('website.includes.header')
</header>
<style>
    a{
  text-decoration: none;
}
</style>
<!-- header end -->
<div id="preloader">
  <div class="spinner"></div>
</div>
<style>
  #preloader {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.spinner {
    width: 50px;
    height: 50px;
    margin: 0 auto;
    border: 10px solid #f3f3f3;
    border-radius: 50%;
    border-top: 10px solid #3498db;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

</style>
@yield('content')
@include('website.includes.footer')

   
    <!-- load scripts -->
    <script src="{{asset("layout/assets/js/jquery-3.6.0.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/jquery.counterup.js")}}"></script>
    <script src="{{asset("layout/assets/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/scripts.js")}}"></script>
    
    @yield('script')

</body>

</html>