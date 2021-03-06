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
          <div class="container">
              <div class="navbar-header" >
                <button type="button" data-toggle="collapse"  class="navbar-toggle"><span class="icon-bar" ></span></button><a href="{{url('/')}}" class="navbar-brand scroll-to" ><img  src="{{asset('Asset/agency/img/logo_copy.png')}}" alt="" ></a>
              </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li ><a href="{{ url ('homemember') }}">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Paket</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url ('paket2/wedding') }}">Wedding</a></li>
                    <li><a href="{{ url ('paket2/prewedding') }}">Prawedding</a></li>
                    <li><a href="{{ url ('paket2/foto studio') }}">Foto Studio</a></li>                
                  </ul>
                </li>  
                <li><a href="{{ route ('konfirmasipembayaran.create') }}">Konfirmasi Pembayaran</a></li>
  
               
                <li><a href="{{ url ('testimoni') }}">Hasil Edit</a></li>
               
               <li>
              <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="" class="user-image" >
              <span class="hidden-xs">{{ auth('member')->user()->nama }}</span>
            </a>
         
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <img src="" class="user-image" alt="User Image" >

              
                <p align="center">{{ auth()->guard('member')->user()->nama }} </p>
              
                
              </li>

              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="" class="">Profile</a>
                </div>
                <div class="pull-right">
                
                  
                <a href="{{ route('member.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              
                </div>
                
              </li>
            </ul>
          </li>
          
        </ul>
          </li>
          
        </ul>
      </div>
    </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

  <!-- Left side column. contains the logo and sidebar -->

<section id="contact">
      <div class="container clearfix">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading">Contact Us</h2>
            <div class="row">
              <div class="col-md-6">
                 <div id="calendar"></div>
              </div>
          <div class="contact-info">
          <div class="col-md-6">
           <form class="form-validate form-horizontal" id="feedback_form" action="{{ Route('pemesanan.store') }}" method="POST"  >
                    {{csrf_field()}}
            <div class="col-md-5">
              <div class="form-group">
                <label>Id Pesan</label>
                <input class="form-control" id="id_pesan" name="id_pesan"  value="{{$id_pesan}}" type="text" style="width: 100%" readonly />
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Id Paket</label>
                <input class="form-control " id="id_paket" type="text" value="{{ $paket->id_paket }}" readonly name="id_paket" required />
              </div>
              <div class="form-group">
                <label>Nama Paket</label>
              <input class="form-control" id="nama_paket" name="nama_paket" type="text"  value="{{ $paket->nama_paket }}" readonly  />
              </div>
              <div class="form-group">
                <label>Tipe</label>
              <input class="form-control" id="tipe" name="tipe" type="text"  value="{{ $paket->tipe }}" readonly  />
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input class="form-control " id="harga" type="text" name="harga" value="{{ $paket->harga_paket }}" readonly  />
              </div>
              <div class="form-group">
                <label>DP</label>
                <input class="form-control " id="dp" type="text" name="dp" value="{{ $paket->dp }}" readonly  />
              </div>
              <div class="form-group">
                <label>Tanggal Pesan</label>
               <input class="form-control " id="tanggal_pesan" type="text" value="{{ date('Y-m-d') }}" name="tanggal_pesan" readonly  />
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <div class="form-group">
                <label>Id Member</label>
                <input class="form-control" id="id_member" name="id_member"  type="text" value="{{Auth()->guard('member')->user()->id_member}}" readonly="" />
              
              </div>
               <div class="form-group">
                <label>Nama Member</label>
                <input class="form-control" id="nama" name="nama"  type="text" value="{{ Auth()->guard('member')->user()->nama }}" readonly="" />
              
              </div>
  
              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" id="alamat" name="alamat" value="{{ Auth()->guard('member')->user()->alamat }} " type="text" style="width: 100%"  readonly="" />
              </div>
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" id="email" name="email" value="{{ Auth()->guard('member')->user()->email}} "  type="text" style="width: 100%"  readonly="" />
              </div>
              <div class="form-group">
                <label>No Telp</label>
                <input class="form-control" id="no_telp" name="no_telp" value="{{ Auth()->guard('member')->user()->no_telp }} " onkeypress="return hanyaAngka(event)"type="text" style="width: 100%"  readonly="" />
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Pukul</label>
                  <div class="input-group">
                      <input type="text" class="form-control timepicker" name="pukul" id="pukul">

                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                        
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Tanggal Foto</label>
                <input class="form-control " id="tanggal_foto" type="text"  name="tanggal_foto" value="{{ session('tglfoto') }}" readonly />
              </div>
              </div>
            </div>

              <!-- /.form-group -->
                    <div class="form-group">
                      <div class="col-lg-offset-5 col-lg-10">
                        
                        <button class="btn btn-primary" type="submit" >Pesan</button>
                        <button type="reset" class="btn btn-default" onclick="history.go(-1);">Cancel</button>
                        
                       
                      </div>
                    </div>
            <!-- /.col -->
          </div>
        </form>
          </div>
        </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- Content Wrapper. Contains page content -->

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
                window.location = "{{ route ('pemesanan.create') }}";
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


</body>
</html>
 