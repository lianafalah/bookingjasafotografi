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
@extends('admin.template')

@section('content')

<section class="content-header">
      <h1>
        Form Detail Paket
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_detailpemesanan') }}">Show Paket</a></li>
        <li class="active">Detail Paket</li>
      </ol>
    </section>
     
            <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
              
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <td>ID Pesan</td>
                    <td> {{ $id_pesan}}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td> {{ $depes->status }}</td>
                  </tr>
                  <tr>
                    <td>Konfirmasi</td>
                    <td> {{ $depes->konfirmasi }}</td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td> {{ $depes->keterangan }}</td>
                  </tr>
                    <td>Gambar</td>
                    <?php $no = 0;?>
              @foreach($depe as $value)
              <?php $no++ ;?>
                    <td> Gambar {{$no}}<br/> <a class="example-image-link" href="{{ asset('Local/storage/app/'.$value->filename)}}" data-lightbox="example-set" >
                <img width="auto" height="100%" src="{{ asset('Local/storage/app/'.$value->filename)}}" alt="" class="example-image"/ style="max-height:100px;max-width:100px;margin-top:10px;"></a>
              @endforeach
                </td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>
@endsection
@push('js')
<script type="text/javascript">
  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: 200
  });
</script>
@endpush
