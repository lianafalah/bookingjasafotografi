@extends('admin.template')
@section('content')
 <section class="content-header">
      <h1 style="text-align: center;">
        Input Data Galery

      </h1>
      
    </section>
<section class="content">
<div class="row">
          <div class="col-lg-12">
            <section class="panel" >  

<div class="panel-body">
  <div class="form">
  <form class="form-validate form-horizontal" action="{{ Route('galery.store') }}" id="feedback_form" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group ">
      <label for="id_galery" class="control-label col-lg-2">Id Galery</label>
        <div class="col-lg-10">
          <input class="form-control " value="{{$id_galery}}" id="id_galery" type="text" name="id_galery" required  readonly />
        </div>
    </div>
     
    <div class="form-group ">
      <label for="nama_galery" class="control-label col-lg-2">Name galery</label>
        <div class="col-lg-10">
            <input class="form-control" id="nama_galery" name="nama_galery" type="text" required />
        </div>
    </div>
    <div class="form-group ">
      <label for="nama_galery" class="control-label col-lg-2">Size Foto</label>
        <div class="col-lg-10">
           <div class="radio">
                    <label>
                      <input type="radio" name="size" id="size" value="Potrait" checked>
                      Potrait
                    </label>
                  
                    <label>
                      <input type="radio" name="size" id="size" value="Landscape">
                      Landscape
                    </label>
                  </div>
        </div>
    </div>

    <div class="form-group">
              <label for="tipe" class="control-label col-lg-2">Tipe Foto</label>
                <div class="col-lg-10">
                  <select name="tipe" class="form-control input-sm m-bot15">
                    <option id="wedding" >Wedding</option>
                    <option id="prewedding">Prewedding</option>
                    <option id="foto_studio">Foto Studio</option>
                  </select>
                </div>
            </div>
           
    <div class="form-group ">
                      <label for="tanggal" class="control-label col-lg-2">Tanggal</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="tanggal" type="text" value="{{ date('Y-m-d') }}" name="tanggal" readonly />
                      </div>
    </div>
    
     <div class="form-group">
      <label for="status" class="control-label col-lg-2">Status Foto</label>
        <div class="col-lg-10">
                          <select name="status" class="form-control input-sm m-bot15">
                            <option>Disable</option>
                            <option>Enable</option>
                          </select>
                      </div>
    </div>
    <div class="form-group">
      <label for="terbaru" class="control-label col-lg-2">Resent Update</label>
        <div class="col-lg-10">
                          <select name="terbaru" class="form-control input-sm m-bot15">
                            <option>Yes</option>
                            <option>No </option>
                          </select>
                      </div>
    </div>
    <div class="form-group">
      <label for="slider" class="control-label col-lg-2">Slider</label>
        <div class="col-lg-10">
                          <select name="slider" class="form-control input-sm m-bot15">
                            <option>--Pilih-- </option>
                            <option href="javascript:void(0);" onclick="show2();" id="demo2">Yes </option>
                            <option>No </option>
                          </select>
                      </div>
    </div>
    <div class="form-group" id="caption" style="display:none">
              <label for="caption" class="control-label col-lg-2">Caption Slider</label>
                <div class="col-lg-10">
                  <input class="form-control" id="caption" type="text" name="caption"  />
                </div>
            </div>
    <div class="form-group">  
      <label for="gambar" class="control-label col-lg-2">Gambar</label>
        <div class="col-lg-10">
          <img src="http://placehold.it/100x100" style="max-height:200px;max-width:200px;margin-top:10px;" id="blah">
          <input class="form-cotrol" type="file" id="gambar" name="gambar"   multiple / >
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

<script type="text/javascript">
        function show2() {
            document.getElementById("caption").style.display = "block";
        }
    </script>    

@endpush
                  

