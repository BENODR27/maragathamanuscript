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

<body data-bs-spy="scroll" data-bs-target="#navbarSupportedContent">
  <!-- header -->


<!-- header end -->
@yield('content')

@include('website.includes.footer')

    <!-- load scripts -->
    <script src="{{asset("layout/assets/js/jquery-3.6.0.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/jquery.counterup.js")}}"></script>
    <script src="{{asset("layout/assets/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("layout/assets/js/scripts.js")}}"></script>
    
</body>
<script type="text/javascript">
    
  var url = "{{ route('changeLang') }}";
  
  $(".changeLang").change(function(){
      window.location.href = url + "?lang="+ $(this).val();
  });
  
</script>
</html>