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
    <link href="{{ url('Asset/agency/css/style.default.css')}}" rel="stylesheet"> 
    <!-- Custom stylesheet - for your changes-->
    <link href="{{ url ('Asset/agency/css/custom.css') }}" rel="stylesheet"> 
   
  <!-- fullCalendar -->
   <link rel='stylesheet' href="{{url('Asset/fullcalendar.min.css')}}" />
  <link rel="stylesheet" href="{{url('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{url('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
  <!-- Theme style -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body  data-target="#navigation"  data-offset="120">
<div class="wrapper">

  <header class="header">
      <div class="sticky-wrapper">
        <div role="navigation" class="navbar navbar-default">
          <div class="container" style="padding-top:10px">
            <div class="navbar-header" >
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar" ></span></button><a href="#intro" class="navbar-brand scroll-to" ><img  src="Asset/agency/img/logo_copy.png" alt="" ></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Galery <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url ('galery/wedding') }}">Wedding</a></li>
                    <li><a href="{{ url ('galery/prewedding') }}">Prawedding</a></li>
                    <li><a href="{{ url ('galery/foto_studio') }}">Foto Studio</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#">Paket <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{{ url ('paket/wedding') }}">Wedding</a></li>
                    <li><a tabindex="-1" href="{{ url ('paket/foto studio') }}">Foto Studio</a></li>
                    <li class="dropdown-submenu">
                      <a class="test" href="">Prewedding <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url ('paket/outdoor') }}">Outdoor</a></li>
                        <li><a href="{{ url ('paket/indoor') }}">Indoor</a></li>
                      </ul>
                    </li>
                  </ul>
                </li> 
               <!--  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" >Paket</a>
                  <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="{{ url ('paket/wedding') }}">Wedding</a></li>
                     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><a tabindex="-1" href="{{ url ('paket/foto studio') }}">Foto Studio</a></li>
                    <li class="dropdown-submenu">
                      <a href="{{ url ('paket/prewedding') }}">Prawedding <span class="dropdown"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Outdoor</a></li>
                        <li><a href="#">Indoor</a></li>
                      </ul>

                    </li>
                   
                  </ul>
              </li>   -->
                <li><a href="{{ url ('cek_pemesanan') }}">Cek Pemesanan </a></li>
            <!--     <li><a href="{{ url ('testimoni') }}">Testimoni</a></li> -->
                <li><a href="{{ url ('aboutus') }}">About Us</a></li>
                <li><a href="{{ url ('register_member') }}">Registrasi</a></li>
                <li><a href="{{ url ('member/login') }}"">Login</a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-9" style="left: 170px;">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
  <script type="text/javascript"  src="{{ asset('Asset/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('Asset/agency/js/bootstrap.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('Asset/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Slimscroll -->

<!-- FastClick -->

<!-- fullCalendar -->
<script src="{{asset('Asset/AdminLTE/bower_components/moment/moment.js')}}"></script>
<script src="{{asset('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Asset/sweetalert.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : ''
      },
      eventLimit: true,
      //Random default events
      events    : [
                @foreach($pemesanans as $pemesanan)
                {
                    title : '{{ $pemesanan->pukul }}',
                    start : '{{ $pemesanan->tanggal_foto }}',
                    
                },
                @endforeach
            ],

        // is the "remove after drop" checkbox checked?
        dayClick: function(date, jsEvent, view) {
            var id_paket = '{{$id_paket}}';
            var tipe = '{{$tipe}}';
            
            // alert('Clicked on: ' + date.format());
            $.get("{{ route ('pemesanan.create') }}",
            {
                date: date.format(),
                id_paket: id_paket,
                tipe : tipe
            },
            function(data, status){
              console.log(tipe);
              var now = new Date(date);
              if (tipe == 'Wedding') {
                var start = new Date('{{ Carbon\Carbon::now()->addDays(7)->toDateString() }}');
                var message = 'Maaf Pemesanan Wedding Hanya bisa dilakukan H-7';
              } 
              else if (tipe == 'Prewedding') {
                var start = new Date('{{ Carbon\Carbon::now()->addDays(0)->toDateString() }}');
                var message = 'Maaf Pemesanan Prewedding Hanya bisa dilakukan H-1';
              } 
              else {
                var start = new Date('{{ Carbon\Carbon::now()->addDays(0)->toDateString() }}');
                var message = 'Maaf Pemesanan Foto Studio Hanya bisa dilakukan H-1';
              }
              console.log(now.getTime() > start.getTime());
              if(now.getTime() > start.getTime()) {
                window.location = "{{ route ('member.login') }}";
              } else {
                swal(message);
              }
            });
            
        }
    })
  })
  @if(session('alert'))
 swal({

  icon: "warning",
  title: "Maaf Pemesanan sudah penuh, Silahkan pilih lain hari",
});

  @endif
</script>
 <script type="text/javascript">
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });

    </script>


</body>
</html>
