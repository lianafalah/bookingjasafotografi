@extends('member.template')

@section('content')
       
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                 <h3 class="page-header"><i class="fa fa-files-o"></i> Form Edit Profile</h3>
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" action="{{ route ('user.update',Auth::user()->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group ">
                      <label for="name" class="control-label col-lg-2">Nama <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $users->name }}" id="name" name="name" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Username<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ $user->username }}" id="username" type="text" name="username" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" value="{{ $user->email }}" type="text" name="email" required />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="jabatan" class="control-label col-lg-2">Jabatan</label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ $user->jabatan}}" id="jabatan" type="text" name="jabatan" readonly />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="jabatan" class="control-label col-lg-2">Image</label>
                      <div class="col-lg-10">
                         <input class="form-control "  type="file" name="gambar" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button" onclick="history.go(-1);">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>

        <!-- page end -->

@stop