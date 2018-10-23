@extends('admin.template')
@section('content')
       <section class="content-header">
      <h1>
        Form Edit Pemesanan
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_pemesanan') }}">Show Pemesanan</a></li>
        <li class="active">Edit Pemesanan</li>
      </ol>
    </section>
     
            <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
              
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" action="{{ route ('pemesanan.update',$pemesanan->id_pesan) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group ">
                      <label for="id_pemesanan" class="control-label col-lg-2">ID Pesan <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $pemesanan->id_pesan }}" id="id_pemesanan" name="id_pemesanan" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="nama_paket" class="control-label col-lg-2">Nama Paket <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $nama_paket }}" id="nama_paket" name="nama_paket" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="tanggal_pesan" class="control-label col-lg-2">Tanggal Pesan <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $pemesanan->tanggal_pesan }}" id="tanggal_pesan" name="tanggal_pesan" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="tanggal_foto" class="control-label col-lg-2">Tanggal Foto <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $pemesanan->tanggal_foto }}" id="tanggal_foto" name="tanggal_foto" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="pukul" class="control-label col-lg-2">Pukul <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $pemesanan->pukul }}" id="pukul" name="pukul" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="severity" class="control-label col-lg-2">status<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select id="status" name="status" class="form-control input-sm m-bot15">
                            @if ($pemesanan->status == 'Menunggu')
                            <option value="Menunggu" selected>Menunggu</option>
                          @elseif ($pemesanan->status == 'Tolak')
                            <option value="Tolak" selected>Tolak</option>
                          
                          @elseif ($pemesanan->status == 'Proses')
                            <option value="Proses" selected>Proses</option> 
                       
                          @elseif ($pemesanan->status == 'Proses Konfirmasi Hasil Edit')
                          
                            <option value="Proses Konfirmasi Hasil Edit" selected>Proses Konfirmasi Hasil Edit</option>                                 
                          @elseif ($pemesanan->status == 'Selesai Hasil Edit')
                          
                            <option value="Selesai Hasil Edit" selected>Selesai Hasil Edit</option>
                            <option value="Telah Diambil">Telah Diambil</option>                       
                       
                          @elseif ($pemesanan->status == 'Telah Diambil')

                            <option value="Telah Diambil" selected>Telah Diambil</option>                       

                            @endif

                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pukul" class="control-label col-lg-2">Tanggal Ambil <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal_ambil" class="form-control pull-right tanggal_ambil" id="datepicker">
                            <!-- <input type="hidden" name="tanggal_now" class="form-control pull-right tanggal_ambil" id="datepicker" value="{{ date('m/d/Y') }}" hidden=""> -->
                        </div>
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
      </section>
      

        <!-- page end -->
       

@stop
@section('java')
<script type="text/javascript">
  @if(session('alert1'))
 swal({

  icon: "warning",
  title: "Tanggal yang diinputkan salah",
});

  @endif
   @if(session('alert3'))
 swal({

  icon: "warning",
  title: "Status Pemesanan Telah Ditolak",
});

  @endif

$('.tanggal_ambil').datepicker({
      minDate : newDate(),
      format: 'yyyy-mm-dd',
      autoclose: true,
      
    })
</script>
@stop