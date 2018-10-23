@extends('member.template')

@section('main')
       
   <div class="container">
        <div class="row">
         
          <div class="col-lg-12">
           
              <header class="panel-heading">
                <h3 ><i class="fa fa-files-o"></i> Ubah Data Member</h3>
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" action="{{ route ('member.update',auth()->guard('member')->user()->id) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nama <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ auth()->guard('member')->user()->nama }}" id="nama" name="nama" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="id_petugas" class="control-label col-lg-2">ID Member<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ auth()->guard('member')->user()->id_member }}" id="id_petugas" type="text" name="id_petugas" readonly />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" value="{{ auth()->guard('member')->user()->email }}" type="text" name="email" required />
                      </div>
                    </div>

                    <div class="form-group row {{ $errors->has('current_password') ? 'has-error' : '' }}">
                                <label class="control-label col-lg-2">Password Lama</label>
                                <div class="col-lg-10">
                                    <input type="password" name="current_password" placeholder="Password Lama" class="form-control">
                                    <span class="text-danger"><strong>{{ $errors->first('current_password') }}</strong></span>
                                </div>
                     </div>

                    <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label class="control-label col-lg-2">Password Baru</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" placeholder="Password Baru" class="form-control">
                                    <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                                </div>
                            </div>
                   

                    <div class="form-group ">
                      <label for="jabatan" class="control-label col-lg-2">Image</label>
                      <div class="col-sm-9">
                         <img src="{{asset('Asset/agency/img/slider/images.png')}}" style="max-height:100px;max-width:100px;margin-top:10px;" id="blah"></br>
                         <input   type="file" name="gambar" id="gambar"/>
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
        
          </div>
        </div>
      </div>
             
@endsection
@push('js')
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }

        }
         $("#gambar").change(function () {
        readURL(this);
        });
</script>
@endpush