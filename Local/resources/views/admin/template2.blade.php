 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Star Photo & Printing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url ('Asset/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url ('Asset/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ url ('Asset/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url ('Asset/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ url ('Asset/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('Asset/AdminLTE/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url ('Asset/AdminLTE/dist/css/skins/_all-skins.min.css')}}">  
  <link rel="stylesheet" href="{{url('Asset/lightbox.min.css')}}">
  <link href="{{ url ('Asset/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ url ('Asset/jquery.dataTables.min.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="{{ url ('Asset/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="Asset/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="Asset/AdminLTE/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="Asset/AdminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('Asset/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('Asset/gentelella-master/css/icheck/flat/green.css')}}">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SPP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><h4>Star Photo & Printing</h4>h4></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('upload/gambar/'.Auth::user()->gambar)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
         
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <img src="{{ asset('upload/gambar/'.Auth::user()->gambar)}}" class="user-image" alt="User Image" >
              
               <p align="center">{{ Auth::user()->name }}
                <small>{{ Auth::user()->jabatan }}</small>
              </p>
                
              </li>

              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route ('users.edit',Auth::user()->id ) }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                
                  
                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              
                </div>
                
              </li>
            </ul>
          </li>
          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('upload/gambar/'.Auth::user()->gambar)}}" class="img-circle"  id="showgambar" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if(Auth::user()->jabatan =='Kasir')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Galery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('galery.create') }}"><i class="fa fa-circle-o"></i> Input Galery</a></li>
            <li><a href="{{ url ('index_galery') }}"><i class="fa fa-circle-o"></i> Lihat Galery</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Paket</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>       
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('paket.create') }}"><i class="fa fa-circle-o"></i> Input Paket</a></li>
            <li><a href="{{ url ('index_paket') }}"><i class="fa fa-circle-o"></i> Lihat Paket</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pemesanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ url ('index_pemesanan') }}"><i class="fa fa-circle-o"></i> Lihat Pemesanan</a></li>
            <li><a href="{{ url ('index_harian') }}"><i class="fa fa-circle-o"></i> Lihat Hari Ini  </a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Konfirmasi Pembayaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ url ('index_pembayaran') }}"><i class="fa fa-circle-o"></i> Lihat Konfirmasi Pembayaran</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Testimoni</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ url ('index_testi') }}"><i class="fa fa-circle-o"></i> Lihat Testi</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i> Registrasi</a></li>
            <li><a href="{{ url('index_user') }}"><i class="fa fa-circle-o"></i> Lihat User</a></li>
            </ul>
        </li>
       @else
          @endif
          
        @if(Auth::user()->jabatan =='Karyawan')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Galery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('galery.create') }}"><i class="fa fa-circle-o"></i> Input Galery</a></li>
            <li><a href="{{ url ('index_galery') }}"><i class="fa fa-circle-o"></i> Lihat Galery</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Paket</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('paket.create') }}"><i class="fa fa-circle-o"></i> Input Paket</a></li>
            <li><a href="{{ url ('index_paket') }}"><i class="fa fa-circle-o"></i> Lihat Paket</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pemesanan</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ url ('index_pemesanan') }}"><i class="fa fa-circle-o"></i> Lihat Pemesanan</a></li>
             <li><a href="{{ url ('index_harian') }}"><i class="fa fa-circle-o"></i> Lihat Hari Ini  </a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Konfirmasi Pembayaran</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ url ('index_pembayaran') }}"><i class="fa fa-circle-o"></i> Lihat Konfirmasi Pembayaran</a></li>

            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Testimoni</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ url ('index_testi') }}"><i class="fa fa-circle-o"></i> Lihat Testi</a></li>
            </ul>
        </li>
        @else
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
        <!--overview start-->
        <form class="form-validate form-horizontal" action="{{ Route('galery.store') }}" id="feedback_form" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="text" id ="id_pesan" name ="id_pesan" />
    <input type="text" id ="status" name ="status" />
    <div class="dropzone" id="myDropzone"></div>
    <button type="submit" id="submit-all"> upload </button>
</form>
        <!-- <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Form Upload </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Dropzone multiple file uploader</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p>Drag multiple files to the box below for multi upload or click to select files. This is for demonstration purposes only, the files are not uploaded to any server.</p>
                  <form action="choices/form_upload.html" class="dropzone" style="border: 1px solid #e5e5e5; height: 300px; "></form>

                  <br />
                  <br />
                  <br />
                  <br />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">
        <input type="file" name="file">
      </form>
      <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">
        <input type="file" name="file">
      </form>
   

  </div> -->
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('Asset/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('Asset/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('Asset/AdminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Asset/AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('Asset/lightbox-plus-jquery.min.js')}}"></script>
<script src="{{asset('Asset/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('Asset/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('Asset/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('Asset/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('Asset/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('Asset/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap color picker -->
<!-- bootstrap time picker -->
<script src="{{asset('Asset/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- SlimScroll -->

<script src="{{ asset ('Asset/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{asset('Asset/sweetalert.min.js ')}}"></script>
<script src="{{asset('Asset/gentelella-master/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('Asset/gentelella-master/js/pace/pace.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>


    <script src="{{ asset ('Asset/jquery.dataTables.min.js') }}"></script>
    
    <script type="text/javascript">
      
   @if(session('alert2'))
 swal({

  icon: "success",
  title: "Data Berhasil DiUbah",
});

  @endif

    </script>
    <script>
  $(function () {
    Dropzone.options.myDropzone= {
    url: 'upload.php',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("id_pesan", jQuery("#id_pesan").val());
            formData.append("status", jQuery("#status").val());
        });
    }
}
})
</script>

</body>
</html>
