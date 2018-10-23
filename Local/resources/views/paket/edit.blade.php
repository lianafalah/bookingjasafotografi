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
        Form Edit Paket
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_paket') }}">Show Paket</a></li>
        <li class="active">Edit Paket</li>
      </ol>
    </section>
     
            <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
             
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" action="{{ route ('paket.update',$paket->id) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group ">
                      <label for="id_paket" class="control-label col-lg-2">ID Paket <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $paket->id_paket }}" id="id_paket" name="id_paket" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="nama_paket" class="control-label col-lg-2">Nama Paket<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ $paket->nama_paket }}" id="nama_paket" type="text" name="nama_paket" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="severity" class="control-label col-lg-2">Tipe<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select id="tipe" name="tipe" class="form-control input-sm m-bot15">
                            @if ($paket->tipe == 'Wedding')
                            <option value="Wedding" selected>Wedding</option>
                            <option value="Prewedding" onclick="myFunction()">Prewedding</option>
                            <option value="Foto Studio" onclick="myFunction()">Foto Studio</option>                  
                          @elseif ($paket->tipe == 'Prewedding - Outdoor')
                            <option value="Wedding" >Wedding</option>
                            <option value="Prewedding-Outdoor" onclick="myFunction()" selected>Prewedding-Outdoor</option>
                            <option value="Prewedding-Indoor" onclick="myFunction()">Prewedding-Indoor</option>
                            <option value="Foto Studio" onclick="myFunction()">Foto Studio</option>        
                            @elseif ($paket->tipe == 'Prewedding - Indoor')
                            <option value="Wedding" >Wedding</option>
                            <option value="Prewedding-Outdoor" onclick="myFunction()" >Prewedding-Outdoor</option>
                            <option value="Prewedding-Indoor" onclick="myFunction()" selected>Prewedding-Indoor</option>
                            <option value="Foto Studio" onclick="myFunction()">Foto Studio</option>                      
                          @elseif ($paket->tipe == 'Foto Studio')
                            <option value="Wedding" >Wedding</option>
                            <option value="Prewedding" onclick="myFunction()">Prewedding</option>
                            <option value="Foto Studio" selected onclick="myFunction()" >Foto Studio</option>                      
                            @endif

                          </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="harga_paket" class="control-label col-lg-2">Harga Paket<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " onkeyup="calc()" id="harga_paket" value="{{ $paket->harga_paket }}" type="text" name="harga_paket" required onkeypress="return hanyaAngka(event)" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="dp" class="control-label col-lg-2">DP<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="dp" value="{{ $paket->dp }}" type="text" name="dp" required readonly />
                      </div>
                    </div>
                      <div class="form-group ">
                      <label for="status" class="control-label col-lg-2">Status<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select id="status" name="status" class="form-control input-sm m-bot15">
                            @if ($paket->status == 'Enable')
                            <option value="Enable" selected>Enable</option>
                            <option value="Disable">Disable</option>                     
                          @elseif ($paket->status == 'Disable')
                          <option value="Enable" >Enable</option>
                            <option value="Disable" selected>Disable</option>
                            @else
                            <option value="Enable" selected>Enable</option>
                            <option value="Disable">Disable</option>   
                            @endif

                          </select>
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="keterangan" class="control-label col-lg-2">Keterangan</label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{$paket->keterangan}}" id="keterangan" type="text" name="keterangan" />
                      </div>
                    </div>
                   
                    <div class="form-group ">
                      <label for="reporter" class="control-label col-lg-2 " >Gambar </label>
                      <div class="col-lg-10">
                        <img src="{{ asset('upload/Paket/'.$paket->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;" id="showgambar">
                        <input  id="inputgambar" value="{{$paket->gambar}}" name="gambar" class="validate" type="file" readonly />
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
@endsection
@push('js')
<script>
function myFunction() {
    document.getElementById("dp").value = "0";
}
</script>
<script type="text/javascript">
function calc() {
    var textValue2 = document.getElementById('harga_paket').value;
      

    document.getElementById('dp').value =50/100 * textValue2;
  
}

  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
 
      return false;
    return true;
  }
</script>
@endpush

