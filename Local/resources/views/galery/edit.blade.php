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
        Form Edit Galery
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_galery') }}">Show Galery</a></li>
        <li class="active">Edit Galery</li>
      </ol>
    </section>
     
            <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" enctype="mu  id="feedback_form" action="{{ route ('galery.update',$galery->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group ">
                      <label for="id_galery" class="control-label col-lg-2">ID galery <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{ $galery->id_galery }}" id="id_galery" name="id_galery" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="nama_galery" class="control-label col-lg-2">Nama galery<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ $galery->nama_galery }}" id="nama_galery" type="text" name="nama_galery" required />
                      </div>
                    </div>
                    <div class="form-group ">
                    
                    <div class="form-group ">
                      <label for="severity" class="control-label col-lg-2">Tipe<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select id="tipe" name="tipe" class="form-control input-sm m-bot15">
                            @if ($galery->tipe == 'Wedding')
                            <option value="Wedding" selected>Wedding</option>
                            <option value="Prewedding">Prewedding</option>
                            <option value="Foto Studio">Foto Studio</option>                     
                          @elseif ($galery->tipe == 'Prewedding')
                            <option value="Wedding" >Wedding</option>
                            <option value="Prewedding" selected>Prewedding</option>
                            <option value="Foto Studio">Foto Studio</option>                       
                          @elseif ($galery->tipe == 'Foto Studio')
                            <option value="Wedding" >Wedding</option>
                            <option value="Prewedding">Prewedding</option>
                            <option value="Foto Studio" selected>Foto Studio</option>
                            @else
                            <option value="Foto Studio" selected>Pilih</option>                      
                            <option value="Wedding" >Wedding</option>
                            <option value="Prewedding">Prewedding</option>
                            <option value="Foto Studio">Foto Studio</option>                      
                            @endif

                          </select>
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="tanggal" class="control-label col-lg-2">tanggal<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="tanggal" value="{{ $galery->tanggal }}" type="text" name="tanggal" required  readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="status" class="control-label col-lg-2">Status<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select id="status" name="status" class="form-control input-sm m-bot15">
                            @if ($galery->status == 'Enable')
                            <option value="Enable" selected>Enable</option>
                            <option value="Disable">Disable</option>                     
                          @elseif ($galery->status == 'Disable')
                          <option value="Enable" >Enable</option>
                            <option value="Disable" selected>Disable</option>
                                                
                            @endif

                          </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="terbaru" class="control-label col-lg-2">Recent Updates<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select id="terbaru" name="terbaru" class="form-control input-sm m-bot15">
                            @if ($galery->terbaru == 'Yes')
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>                     
                          @elseif ($galery->terbaru == 'No')
                          <option value="Yes" >Yes</option>
                            <option value="No" selected>No</option>
                                                
                            @endif

                          </select>
                      </div>
                    </div>
                    <div class="form-group">
      <label for="slider" class="control-label col-lg-2">Slider</label>
        <div class="col-lg-10">
                          <select name="slider" class="form-control input-sm m-bot15">
                            @if ($galery->slider == 'Yes')
                            <option  value="Yes" selected>Yes </option>
                            <option value="No">No </option>
                            @elseif ($galery->slider == 'No')
                            <option value="Yes"   href="javascript:void(0);" onclick="show2();" id="demo2">Yes</option>
                            <option value="No" selected>No</option>
                            @else
                            <option value="Yes" >--Pilih--</option>
                            <option value="Yes"  href="javascript:void(0);" onclick="show2();" id="demo2" >Yes</option>
                            <option value="No">No</option>
                            @endif
                          </select>
                      </div>
    </div>
    <div class="form-group" id="caption" style="display:none">
              <label for="caption" class="control-label col-lg-2">Caption Slider</label>
                <div class="col-lg-10">
                  <input class="form-control" id="caption" type="text" name="caption" value="{{ $galery->caption }}" />
                </div>
            </div>
                    <div class="form-group ">
                      <label for="reporter" class="control-label col-lg-2 " >Gambar </label>
                      <div class="col-lg-10">
                        <img src="{{ asset('upload/Galery/'.$galery->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;" id="showgambar">

                        <input  id="inputgambar" value="{{$galery->gambar}}" name="gambar" class="validate" type="file" readonly />
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
<script type="text/javascript">
    
       function show2() {
        
            document.getElementById("caption").style.display = "block";
   
        }
    </script>  