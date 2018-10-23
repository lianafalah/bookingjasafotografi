<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Star Photo & Printting</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{ url('Asset/agency/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url ('Asset/agency/css/font-awesome.css')}}">
    <link href="{{ url ('Asset/agency/css/themify-icons.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{url('Asset/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <link href="{{ url('Asset/agency/css/style.default.css')}}" rel="stylesheet"> 
    <!-- Custom stylesheet - for your changes-->
    <link href="{{ url ('Asset/agency/css/custom.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{url('Asset/lightbox.min.css')}}">
     <link href="{{ url ('Asset/himu/css/animate.css') }}" rel="stylesheet">
     <link href="{{ url ('Asset/himu/css/jquery.sidr.dark.css') }}" rel="stylesheet">
 
     <link href="{{ url ('Asset/himu/css/responsive.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{url('Asset/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

  <!--      <link href="{{url('Asset/himu/css/main.css')}}" rel="stylesheet"> -->

    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
  </head>
  <body data-target="#navigation"  data-offset="120">
    @include('pagepel.navbar')
    @yield('main')
    @include('pagepel.footer')
    <!-- Javascript files-->
  <script type="text/javascript"  src="{{ asset('Asset/jquery-3.2.1.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('Asset/agency/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('Asset/agency/js/jquery.sticky.js') }}"></script>
  <script type="text/javascript" src="{{ asset('Asset/agency/js/jquery.scrollTo.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('Asset/agency/js/jquery.cookie.js')}}"></script>
  <script type="text/javascript" src="{{asset('Asset/lightbox-plus-jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('Asset/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('Asset/sweetalert.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('Asset/jquery-ui/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('Asset/AdminLTE/dist/js/adminlte.min.js')}}"></script>
  <script type="text/javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <!-- <script type="text/javascript" src="{{asset('Asset/masonry.pkgd.js')}}"></script> -->
  <script type="text/javascript" src="{{asset('Asset/masonry.pkgd.min.js')}}"></script>
  <script type="text/javascript">
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });

    </script>
  <script type="text/javascript">
            $(document).ready(function(){
            $("#testimonial-slider").owlCarousel({
                items:3,
                itemsDesktop:[1000,3],
                itemsDesktopSmall:[990,2],
                itemsTablet:[767,1],
                pagination:true,
                navigation:false,
                autoPlay:true
            });
        });
    </script>

    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
    <script>
      $(function () {
            $('.timepicker').timepicker({
              showMeridian:false,
          showInputs: false,
          'timeFormat':'H:i',

            })
      })
    </script>

    @stack('js')
  </body>
</html>