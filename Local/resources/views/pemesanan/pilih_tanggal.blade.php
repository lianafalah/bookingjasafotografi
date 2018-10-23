<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pilih Tanggal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('Asset/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Asset/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('Asset/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- fullCalendar -->
<!--   <link rel="stylesheet" href="{{asset('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.css')}}"> -->
  <link rel='stylesheet' href="{{url('Asset/fullcalendar.min.css')}}" />
  <link rel="stylesheet" href="{{asset('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Asset/AdminLTE/dist/css/AdminLTE.min.css')}}">

  <link rel="stylesheet" href="{{asset('Asset/AdminLTE/dist/css/skins/_all-skins.min.css')}}">

  

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body style="background-color: #ecf0f5;">
  <header class="header">
      <div class="sticky-wrapper">
        <div role="navigation" class="navbar navbar-default">
          <div class="container" style="padding-top:10px">
            <div class="navbar-header" >
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar" ></span></button><a href="#intro" class="navbar-brand scroll-to" ><img  src="Asset/agency/img/logo_copy.png" alt="" ></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#intro">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Galery</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url ('galery/wedding') }}">Wedding</a></li>
                    <li><a href="{{ url ('galery/prewedding') }}">Prawedding</a></li>
                    <li><a href="{{ url ('galery/fotostudio') }}">Foto Studio</a>
                    </li>
                  </ul>
                </li> 
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Paket</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url ('paket/paket_wedding') }}">Wedding</a></li>
                    <li><a href="{{ url ('paket/paket_prewedding') }}">Prawedding</a></li>
                    <li><a href="{{ url ('paket/paket_fotostudio') }}">Foto Studio</a></li>
                  </ul>
              </li>  
                <li><a href="{{ url ('pemesanan/konfirmasi_pemesanan') }}">Konfirmasi Pembayaran</a></li>
                <li><a href="#">Cek Pemesanan </a></li>
                <li><a href="#">Testimoni</a></li>
                <li><a href="#">About Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">

                <div id='calendar'></div>

                </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
       </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>




</html>


<script src="{{asset('Asset/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('Asset/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('Asset/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('Asset/AdminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Asset/AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('Asset/AdminLTE/dist/js/demo.js')}}"></script>
<!-- fullCalendar -->
<script src="{{asset('Asset/AdminLTE/bower_components/moment/moment.js')}}"></script>
<script src="{{asset('Asset/AdminLTE/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{asset('Asset/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('Asset/moment.min.js')}}"></script>
<script src="{{asset('Asset/fullcalendar.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
           
            ]
        })
    });
</script>
<script>
$(document).ready(function(){
    $(".fc-day").click(function(){
        var date = $(this).data('date');

        

        $.get("{{ route ('pemesanan.create') }}",
        {
            date: date,
             
        },

        function(data, status){
          console.log(new Date() - 1 );

          if(new Date(date) > new Date() - 1 ) {
            window.open("{{ route ('pemesanan.create') }}");
          } else {
            swal("Maaf Pemesanan Foto Studio Hanya bisa dilakukan H-1");;
          }
        });
        
    });

});

</script>