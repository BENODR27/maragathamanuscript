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

<body data-bs-spy="scroll" data-bs-target="#navbarSupportedContent">
  <!-- header -->
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
@include('includes.msg')
@include('includes.terms&conditions')

<script>
    $(document).ready(function () {
        @if (session('msg'))
            $('#msgModal').modal('show');
        @endif
    });

    window.addEventListener('load', function() {
    document.getElementById('preloader').style.display = 'none';
});

</script>
<script>
    /*
@author Rafael Rinaldi (rafaelrinaldi.com)
@date Sep 14, 2013
*/
(function($) {
	
	var bookcm = $('.bookcm'),
      cover = bookcm.find('.bookcm--cover');

	bookcm.hover(bookInHandler, bookOutHandler);

	function bookInHandler( event ) {
		event.preventDefault();
		cover.addClass('is-open');
		return false;
	}

	function bookOutHandler( event ) {
		event.preventDefault();
		cover.removeClass('is-open');
		return false;
	}

})(jQuery);
</script>

</html>