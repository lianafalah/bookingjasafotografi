<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta name="description" content="Creative One Page Parallax Template">
  <meta name="keywords" content="Creative, Onepage, Parallax, HTML5, Bootstrap, Popular, custom, personal, portfolio" /> 
  <meta name="author" content=""> 
  <title>Star Photo & Printting</title> 
  <link href="" rel="stylesheet">
  <link href="{{ url ('Asset/himu/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url ('Asset/himu/css/prettyPhoto.css') }}" rel="stylesheet">
  <link href="{{ url ('Asset/himu/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ url ('Asset/himu/css/animate.css') }}" rel="stylesheet">
  <link href="{{ url ('Asset/himu/css/main.css') }}" rel="stylesheet">
  <link href="{{ url ('Asset/himu/css/responsive.css') }}" rel="stylesheet"> 
  <link href="{{ url ('Asset/himu/css/style.css') }}" rel="stylesheet"> 
  <!--[if lt IE 9]> <script src="Asset/himu/js/html5shiv.js"></script> 
  <script src="Asset/himu/js/respond.min.js"></script> <![endif]--> 
 <!--  <link rel="shortcut icon" href="Asset/himu/images/ico/favicon.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="Asset/himu/images/ico/apple-touch-icon-144-precomposed.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="Asset/himu/images/ico/apple-touch-icon-114-precomposed.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="Asset/himu/images/ico/apple-touch-icon-72-precomposed.png"> 
  <link rel="apple-touch-icon-precomposed" href="Asset/himu/images/ico/apple-touch-icon-57-precomposed.png"> -->
</head><!--/head-->
<body>
  
  <div class="container">
      @include('page.navbaradmin')
  </div>

      @yield('main')
 
  @include('footer')
  


  <script src="{{ asset ('Asset/himu/js/jquery.js') }}"></script>
  <script src="{{ asset ('Asset/himu/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset ('Asset/himu/js/smoothscroll.js') }}"></script>
  <script src="{{ asset ('Asset/himu/js/jquery.isotope.min.js') }}"></script>
  <script src="{{ asset ('Asset/himu/js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset ('Asset/himu/js/jquery.parallax.js') }}"></script>
  <script src="{{ asset ('Asset/himu/js/main.js') }}"></script>
</body>
</html>