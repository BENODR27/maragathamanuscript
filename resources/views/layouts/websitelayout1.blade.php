<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MARAGATHAA MANUSCRIPTS</title>
    <link href="{{ asset('bootstrap-5.3.2/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/mm/logo.png') }}">


</head>
<body>
    <div id="main">
        {{-- @include('website.includes.header') --}}
        @yield('content')
    </div>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.js')}}"></script>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600&display=swap');
  
      *{
          margin: :0;
          padding:0;
          box-sizing:border-box;
      }
      body{
          background-color: #cedece;
          font-family: 'Poppins', sans-serif;
          height: 100%;
          width:100%;
          overflow-x: hidden;
      }
      .btn{
     background-color: rgb(81, 131, 54) !important;
      }
      section{
          min-height:100vh;
          display:flex;
          align-items:center;
          justify-content: center;
      }
      .category-image{
          background-color: rgb(183, 183, 183);
          padding:10px;
          border-radius: 5px;
      }
    
  </style>
  </html>