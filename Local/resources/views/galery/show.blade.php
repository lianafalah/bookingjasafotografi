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
        Form Detail Galery
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_galery') }}">Show Galery</a></li>
        <li class="active">Detail Galery</li>
      </ol>
    </section>

 <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
              <header class="panel-heading">
                Detail galery
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <td>ID galery</td>
                    <td> {{ $galery->id_galery }}</td>
                  </tr>
                  <tr>
                    <td>Nama galery</td>
                    <td> {{ $galery->nama_galery }}</td>
                  </tr>
                  <tr>
                    <td>Tipe</td>
                    <td> {{ $galery->tipe }}</td>
                  </tr>
                  <tr>
                   <td>Foto Studio</td>
                    <td> {{ $galery->foto_studio }}</td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td> {{ $galery->tanggal }}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td> {{ $galery->status }}</td>
                  </tr>
                  <tr>
                    <td>Terbaru</td>
                    <td> {{ $galery->terbaru }}</td>
                  </tr>
                  <tr>
                    <td>Gambar</td>
                    <td> <img src="{{ asset('upload/Galery/'.$galery->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;" id="showgambar">
</td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>

@stop