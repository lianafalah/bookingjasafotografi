<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Star Photo & Printting</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap and Font Awesome css-->
    <!-- we use cdn but you can also include local files located in css directory-->
     <link rel="stylesheet" href="{{ url('Asset/agency/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url ('Asset/agency/css/font-awesome.css')}}">
    <link href="{{ url ('Asset/agency/css/themify-icons.css') }}" rel="stylesheet"> 
   
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{url('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{url('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">



    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body data-target="#navigation"  data-offset="120">
    @include('pagepel.navbar')
    @yield('main')
    @include('pagepel.footer')
    <!-- Javascript files-->

  <script type="text/javascript"  src="{{ asset('Asset/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('Asset/agency/js/bootstrap.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('Asset/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Slimscroll -->

<!-- FastClick -->

<!-- fullCalendar -->
<script src="{{asset('Asset/AdminLTE/bower_components/moment/moment.js')}}"></script>
<script src="{{asset('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>



    @stack('js')
  </body>
</html>