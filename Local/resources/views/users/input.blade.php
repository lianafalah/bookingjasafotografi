@extends('admin.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">ID Petugas</label>

                            <div class="col-md-6">
                                <input id="id_petugas" type="text" class="form-control" name="id_petugas" value="{{ $id_petugas }}" readonly>

                                @if ($errors->has('id_petugas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_petugas') }}</strong>
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

                      <!--   <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->
                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-6">
                                <select name="jabatan" class="form-control">
                                     <option value="Pemilik">Pemilik</option>
                                    <option value="Admin">Admin</option>
                                     <option value="Karyawan">Karyawan</option>
                                     <option value="Kasir">Kasir</option>

                                 </select>
                             </div>


                        </div>
                        <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <label for="no_telp" class="col-md-4 control-label">No Telp</label>

                            <div class="col-md-6">
                                <input id="no_telp" type="text" class="form-control" name="no_telp" value="{{ old('no_telp') }}" required autofocus>

                                @if ($errors->has('no_telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input class="form-cotrol" type="hidden" id="gambar" name="gambar" value="images.png"  required/ >

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <button type="reset" class="btn btn-default" onclick="history.go(-1);">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
