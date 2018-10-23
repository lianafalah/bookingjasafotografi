<!DOCTYPE html>
<html lang="en">

<head>
<link href="{{ url ('Asset/NiceAdmin/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ url ('Asset/NiceAdmin/css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ url ('Asset/NiceAdmin/css/elegant-icons-style.css') }}" rel="stylesheet" />
  <link href="{{ url ('Asset/NiceAdmin/css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="{{ url ('Asset/NiceAdmin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
  <link href="{{ url ('Asset/NiceAdmin/assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="{{ url ('Asset/NiceAdmin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ url ('Asset/NiceAdmin/css/owl.carousel.css') }}" type="text/css">
  <link href="{{ url ('Asset/NiceAdmin/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ url ('Asset/NiceAdmin/css/fullcalendar.css') }}">
  <link href="{{ url ('Asset/NiceAdmin/css/widgets.css') }}" rel="stylesheet">
  <link href="{{ url ('Asset/NiceAdmin/css/style.css') }}" rel="stylesheet">
  <link href="{{ url ('Asset/NiceAdmin/css/style-responsive.css') }}" rel="stylesheet" />
  <link href="{{ url ('Asset/NiceAdmin/css/xcharts.min.css') }}" rel=" stylesheet">
  <link href="{{ url ('Asset/NiceAdmin/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
</head>
<body style="background: #b6e8f8;">
<div class="container">

    <div class="login-logo" style="text-align: center;">
    </br>
    <a href="{{url('/')}}" style=" color: white;"> <img  src="Asset/agency/img/logo_copy.png" alt="" ></a>
  </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Register Member</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('member.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id_member') ? ' has-error' : '' }}">
                            <label for="id_member" class="col-md-4 control-label">Id Member</label>

                            <div class="col-md-6">
                                <input id="id_member" type="id_member" class="form-control" name="id_member" value="{{$id_member}}" readonly pattern="[A-Za-z ]+">

                                @if ($errors->has('id_member'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_member') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="nama" class="form-control" name="nama" value="{{ old('nama') }}" onkeypress="return huruf(event)" required>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="alamat" class="form-control" name="alamat" value="{{ old('alamat') }}" required maxlength="30">

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <label for="no_telp" class="col-md-4 control-label">No Telp</label>

                            <div class="col-md-6">
                                <input id="no_telp" type="no_telp" class="form-control" name="no_telp" value="{{ old('no_telp') }}" onkeypress="return hanyaAngka(event)" required>

                                @if ($errors->has('no_telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                         <input class="form-cotrol" type="hidden" id="gambar" name="gambar" value="images.png"  required/ >


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">

function huruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
 
      return false;
    return true;
  }
   
 </script>