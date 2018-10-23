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
        Form Detail Paket
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_paket') }}">Show Paket</a></li>
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
                    <td>ID Paket</td>
                    <td> {{ $paket->id_paket }}</td>
                  </tr>
                  <tr>
                    <td>Nama Paket</td>
                    <td> {{ $paket->nama_paket }}</td>
                  </tr>
                  <tr>
                    <td>Harga Paket</td>
                    <td> {{ $paket->harga_paket }}</td>
                  </tr>
                  <tr>
                    <td>DP</td>
                    <td> {{ $paket->dp }}</td>
                  </tr>
                  <tr>
                    <td>Tipe</td>
                    <td> {{ $paket->tipe }}</td>
                  </tr>
    
                  <tr>
                    <td>Keterangan</td>
                    <td> {{ $paket->keterangan }}</td>
                  </tr>
                  <tr>
                    <td>Gambar</td>
                    <td> <img src="{{ asset('upload/Paket/'.$paket->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;" id="showgambar">
</td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>

@stop