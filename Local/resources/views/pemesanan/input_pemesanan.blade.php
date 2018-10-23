@extends('member.template')
@section('main')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <header class="panel-heading">
        <h3>Form Input Pemesanan</h3>
      </header>
      <div class="panel-body">
        <div class="form">
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

        <!-- page end-->
@stop
@push('js')
<script type="text/javascript">
  
   @if(session('alert'))
 swal({

  icon: "warning",
  title: "Maaf Pemesanan Di jam tersebut tidak tersedia silahkan pilih di jam yang lain",
});

  @endif
</script>
<script type="text/javascript">
   @if(session('alert4'))
 swal({

  icon: "warning",
  title: "Maaf Toko Kami Tutup",
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
 </script>
@endpush