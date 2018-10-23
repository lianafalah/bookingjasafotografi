@extends('member.template')
@section('main')
        <!-- Form validations -->
      <div class="container">
        <div class="row">
         
          <div class="col-lg-12">
           
              <header class="panel-heading">
                <h3 ><i class="fa fa-files-o"></i> Konfirmasi Pembayaran</h3>
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" action="{{ Route('konfirmasipembayaran.store') }}" id="feedback_form" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group ">
                      <label for="id_pesan" class="control-label col-lg-2">Id Pesan</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="id_pesan" name="id_pesan"  type="text" value="{{ old('id_pesan') }} " required="" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nama</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="nama" type="text" name="nama"  value="{{ old('nama') }} " onkeypress="return huruf(event)" required="" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for='nama_bank' class="control-label col-lg-2">Name Bank</label>
                      <div class="col-lg-10">
                        <input class="form-control" id='nama_bank' value="{{ old('nama_bank') }} " name='nama_bank' type="text" onkeypress="return huruf(event)" required />

                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="no_rekening" class="control-label col-lg-2">No Rekening</label>
                      <div class="col-lg-10">
                        <input class="form-control"  onkeypress="return hanyaAngka(event)" id="no_rekening" type="text" name="no_rekening" value="{{ old('no_rekening') }} " required  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="nominal" class="control-label col-lg-2">Nominal</label>
                      <div class="col-lg-10">
                        <input class="form-control"  onkeypress="return hanyaAngka(event)" id="nominal" type="text" name="nominal" required />
                      </div>
                    </div>
                  
                  
                    <div class="form-group ">
                      <label for="tanggal" class="control-label col-lg-2">Tanggal</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="tanggal" type="text" value="{{ date('Y-m-d') }}" name="tanggal" readonly />
                      </div>
                    </div>
                    <div class="form-group">  
                      <label for="foto_bukti" class="control-label col-lg-2">Foto Bukti</label>
                        <div class="col-lg-10">
                          <input class="form-cotrol" type="file" id="foto_bukti" name="foto_bukti"   required/ >
                        </div>
                    </div>
                
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button type="reset" class="btn btn-default" onclick="history.go(-1);">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
        
          </div>
        </div>
      </div>

        <!-- page end-->
@stop
@push('js')
<script type="text/javascript">
   @if(session('alert'))
 swal({

  icon: "warning",
  title: "Maaf DP yang anda inputkan tidak sesuai",
});

  @endif
</script>
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
 
      return false;
    return true;
  }
  function huruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
@if(session('alert0'))
 swal({

  icon: "success",
  title: "Konfirmasi Pembayaran Berhasil, Silahkan tunggu email dari kami",
});

  @endif
  @if(session('alert9'))
 swal({

  icon: "warning",
  title: "Konfirmasi Pembayaran Sudah Pernah Dilakukan",
});

  @endif
  @if(session('alert8'))
 swal({

  icon: "warning",
  title: "Maaf Pemesanan Tidak Tersedia",
});

  @endif

 </script>
@endpush
<!-- <script type="text/javascript">
 @if(session('alert'))
 swal({

  icon: "success",
  title: "Konfirmasi Pembayaran Berhasil ",
});
@endif
 </script> -->