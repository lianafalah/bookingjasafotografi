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
@extends('member.template')
@section('main')

     
            <div class="container">
             <div class="row">
          <div class="col-lg-12">
             <header class="panel-heading">
                <h3 ><i class="fa fa-files-o"></i> Konfirmasi Hasil Edit</h3>
              </header>
            <section class="panel" >
             
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" action="{{ route ('detail_pemesanan_member.update',$id_pesan) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group ">
                      <label for="id_pesan" class="control-label col-lg-2">ID Pesan <span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class="form-control" value="{{$id_pesan}}" id="id_pesan" name="id_pesan" minlength="5" type="text" required readonly/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="status" class="control-label col-lg-2">Status<span class="required"></span></label>
                      <div class="col-lg-10">
                        <input class="form-control " value="{{ $depes->status }}" id="status" type="text" name="status" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="severity" class="control-label col-lg-2">konfirmasi<span class="required"></span></label>
                      <div class="col-lg-10">
                          <select id="konfirmasi" name="konfirmasi" class="form-control input-sm m-bot15">
                            @if ($depes->konfirmasi == 'Setuju')
                            <option value="Setuju" selected>Setuju</option>
                                         
                          @elseif ($depes->konfirmasi == 'Revisi 1 ')
                            <option value="Revisi 1" selected >Revisi 1</option>
                            <option value="Revisi 2"  >Revisi 2</option>
                            <option value="Setuju" ">Setuju</option>                       
                          @else
                            <option value="Revisi 1"  selected="">Revisi 1</option>
                            <option value="Setuju">Setuju</option>
                            @endif
                          </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="keterangan" class="control-label col-lg-2">Keterangan<span class="required"></span></label>
                      <div class="col-lg-10">
                         <textarea name="keterangan" rows="3" class="form-control" cols="120" value="{{ $depes->keterangan }}" ></textarea>
                        <!-- <input class="form-control " id="keterangan"  type="text" name="keterangan" required /> -->
                      </div>
                    </div>
                   
                    <div class="form-group ">
                      <label for="reporter" class="control-label col-lg-2 " >Gambar </label>
                      <div class="col-lg-10">
                       <?php $no = 0;?>
              @foreach($depe as $value)
              <?php $no++ ;?>
                    Gambar {{$no}}
                    <a class="example-image-link" href="{{ asset('Local/storage/app/'.$value->filename)}}" data-lightbox="example-set" >
                <img width="auto" height="100%" src="{{ asset('Local/storage/app/'.$value->filename)}}" alt="" class="example-image"/ style="max-height:100px;max-width:100px;margin-top:10px;"></a>
                  
              @endforeach
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
     </div>
@endsection
