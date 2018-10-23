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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus pattern="[A-Za-z ]+">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-6">
                                <select name="jabatan" class="form-control">
                                    <option value="Reporter">Reporter</option>
                                     <option value="Viewer">Viewer</option>

                                 </select>
                             </div>


                        </div>

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

