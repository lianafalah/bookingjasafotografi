@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>
@stop
@extends('admin.template')

@section('content')
        <section class="content-header">
      <h1>
        Form Edit Konfirmasi Pembayaran
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_paket') }}">Show Paket</a></li>
        <li class="active">Edit Galery</li>
      </ol>
    </section>
     
            <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
             
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" action="{{ route ('konfirmasipembayaran.update2',$konfirmasipembayaran->id_pesan) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group ">
                      <label for="id_pesan" class="control-label col-lg-2">ID Pesan <span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $konfirmasipembayaran->id_pesan }}" id="id_pesan" name="id_pesan" minlength="5" type="text" readonly/>
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="nama" class="control-label col-lg-2">Nama</label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{$konfirmasipembayaran->nama}}" id="nama" type="text" name="nama" readonly />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="nama_bank" class="control-label col-lg-2">Nama Bank<span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class="form-control "  id="nama_bank" value="{{ $konfirmasipembayaran->nama_bank }}" type="text" name="nama_bank" readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="no_rekening" class="control-label col-lg-2">no_rekening<span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="no_rekening" value="{{ $konfirmasipembayaran->no_rekening }}" type="text" name="no_rekening"  readonly />
                      </div>
                    </div>
                   
                    <div class="form-group ">
                      <label for="nominal" class="control-label col-lg-2">Nominal<span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ $konfirmasipembayaran->nominal }}" id="nominal" type="text" name="nominal" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="status" class="control-label col-lg-2">Status<span class="required"></span></label>
                      <div class="col-lg-10">
                          <select id="status" name="status" class="form-control input-sm m-bot15">
                            @if ($konfirmasipembayaran->status == 'Sudah Bayar')
                            <option value="Sudah Bayar" selected>Sudah Bayar</option>
                            <option value="Lunas" >Lunas</option>
                                             
                          @elseif ($konfirmasipembayaran->status == 'Belum Bayar')
                            <option value="Sudah Bayar">Sudah Bayar</option>
                            <option value="Belum Bayar" selected="" >Belum Bayar</option>@elseif ($konfirmasipembayaran->status == 'Lunas')
                            <option value="Lunas">Lunas</option>
                          @else
                            <option value="-" selected >Pilih</option>
                            <option value="Sudah Bayar" >Sudah Bayar</option>
                            <option value="Belum Bayar" >Belum Bayar</option>
                                          
                            @endif

                          </select>
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="reporter" class="control-label col-lg-2 " >Gambar </label>
                      <div class="col-lg-10">
                        <img src="{{ asset('upload/Bukti_transfer/'.$konfirmasipembayaran->foto_bukti)  }}" style="max-height:200px;max-width:200px;margin-top:10px;" id="showgambar">
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
@stop
@section('java')
<script type="text/javascript">
  @if(session('alert10'))
 swal({

  icon: "warning",
  title: "Maaf Nominal dengan Harga Paket berbeda",
});

  @endif
</script>
@stop

