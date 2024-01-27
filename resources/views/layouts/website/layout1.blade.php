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
    <link rel="icon" type="image/x-icon" href="{{ asset('img/mm/logo_favicon.png') }}">

    <title>MARAGATHAA MANUSCRIPTS</title>
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
  /* Style the container div */
  .file-input-container {
      position: relative;
      overflow: hidden;
      display: inline-block;
  }

  /* Style the hidden file input */
  .file-input-container input[type="file"] {
      position: absolute;
      font-size: 100px;
      right: 0;
      top: 0;
      opacity: 0;
  }

  /* Style the visible part of the file input */
  .file-input-button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
  }

  /* Style the error message */
  .is-invalid {
      border-color: #dc3545 !important;
      background-color: #f8d7da !important;
  }

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
@include('website.includes.secondfooter')

   
    <!-- load scripts -->
    <script src="{{asset("layout/assets/js/jquery-3.6.0.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/jquery.counterup.js")}}"></script>
    <script src="{{asset("layout/assets/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/scripts.js")}}"></script>
    
    @yield('script')
    @include('includes.msg')
    @include('includes.terms&conditions')

<script>
      $(document).ready(function () {
        @if (session('msg'))
            $('#msgModal').modal('show');
        @endif
    });
</script>
</body>

</html>