@extends('admin.template')
@section('content')
<section class="content-header">
      <h1 style="text-align: center;">
        Input Data Paket

      </h1>
      
    </section>
<section class="content">
<div class="row">
          <div class="col-lg-12">
            <section class="panel" > 
    
      <div class="panel-body">
        <div class="form">
          <form class="form-validate form-horizontal" action="{{ Route('paket.store') }}" id="feedback_form" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group ">
              <label for="id_paket" class="control-label col-lg-2">Id Paket</label>
                <div class="col-lg-10">
                  <input class="form-control" value="{{$id_paket}}" id="id_paket" type="text" name="id_paket" required readonly />
                </div>
            </div>        
            <div class="form-group ">
              <label for="nama_paket" class="control-label col-lg-2">Name Paket</label>
                <div class="col-lg-10">
                  <input class="form-control" id="nama_paket" maxlength="35" name="nama_paket" type="text" required onkeypress="return huruf(event)" />
                </div>
            </div>
            <div class="form-group">
              <label for="tipe" class="control-label col-lg-2">Tipe Foto</label>
                <div class="col-lg-10">
                  <select name="tipe" id="tipe" class="form-control input-sm m-bot15">
                    <option id="wedding" >Wedding</option>
                    <option id="prewedding-outdoor">Prewedding - Outdoor</option>
                    <option id="prewedding-indoor">Prewedding - Indoor</option>
                    <option id="foto studio">Foto Studio</option>
                  </select>
                </div>
            </div>
           
            <div class="form-group ">
              <label for="harga_paket" class="control-label col-lg-2">Harga</label>
                <div class="col-lg-10">
                  <input class="form-control " id="harga_paket" type="text" name="harga_paket" onkeyup="calc()" onkeypress="return hanyaAngka(event)" required />
                </div>
            </div>
            <div class="form-group">
              <label for="status" class="control-label col-lg-2">Status</label>
                <div class="col-lg-10">
                  <select name="status" id="status" class="form-control input-sm m-bot15">
                    <option id="Enable" >Enable</option>
                    <option id="Disable">Disable</option>
                  </select>
                </div>
            </div>
           
            <div class="form-group">
              <label for="keterangan" class="control-label col-lg-2">Keterangan</label>
                <div class="col-lg-10">
                  <textarea name="keterangan"  rows="3" class="form-control" cols="120"></textarea>
                  <!-- <input class="form-control" id="keterangan" type="text" name="keterangan" required /> -->
                </div>
            </div>
            <div class="form-group">  
              <label for="gambar" class="control-label col-lg-2">Gambar</label>
                <div class="col-lg-10">
                  <img src="http://placehold.it/100x100" style="max-height:200px;max-width:200px;margin-top:10px;" id="blah">
                  <input class="form-cotrol" type="file" id="gambar" name="gambar"   required/ >
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
      </section>
</div>
</div>
</section>

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
<!-- <script>
function myFunction() {
    document.getElementById("dp").value = "0";
}
</script>


<script type="text/javascript">
function calc() {
    var textValue2 = document.getElementById('harga_paket').value;
    var tipe=  document.getElementById("tipe").value;
    console.log(tipe);
    if(tipe !=='Foto Studio'){

    document.getElementById('dp').value =30/100 * textValue2;
  }
}
</script> -->
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

  	icon: "warning",
  	title: "Silahkan Melakukan Input Ulang",
	});
  @endif


 </script>
@endpush
