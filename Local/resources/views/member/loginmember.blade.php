<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url ('Asset/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}} ">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url ('Asset/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url ('Asset/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url ('Asset/AdminLTE/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url ('Asset/AdminLTE/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
</head>
<body class="hold-transition login-page" style="animation: zoom 40s;" >
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}" style="color: white;"><b>Star</b><br>Photo & Printing</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="opacity: 0.9;">
    <p class="login-box-msg">Login Khusus Member</p>
                    <form method="POST" action="{{ route('member.dologin') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                          <input type="email" id="id_petugas" class="form-control" name="email" value="{{ old('id_petugas') }}" placeholder="email" required autofocus>
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password"  data-toggle="password" required/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                         <div class="row">
        <div class="col-xs-8">
        
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

  <br>
   
    <br>
   <!--  <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
 -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('Asset/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('Asset/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('Asset/AdminLTE/plugins/iCheck/icheck.min.js')}} "></script>
<script type="text/javascript" src="{{asset('Asset/sweetalert.min.js')}}"></script>
<script type="text/javascript">

function reveal_pass(check_box){

    var textbox_elem = document.getElementById("password");

    if(check_box.checked)

    textbox_elem.setAttribute("type", "text");

    else

    textbox_elem.setAttribute("type", "password");

}

</script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
   @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

</script>
<script type="text/javascript">
  @if(session('alert1'))
 swal({

  icon: "warning",
  title: "Maaf Username atau password anda salah",
});

  @endif
    @if(session('alert12'))
 swal({

  icon: "warning",
  title: "Silahkan Verifikasi Account Email Anda",
});

  @endif
  @if(session('alert2'))
 swal({

  icon: "success",
  title: "Data Berhasil Disimpan, Silahkan Verifikasi Account Email Anda",
});

  @endif
  @if(session('alert9'))
 swal({

  icon: "success",
  title: "Terimakasih Telah melakukan Verifikasi ",
});

  @endif
</script>
</body>
</html>

                           