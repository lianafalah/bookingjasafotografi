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
        Form Detail Konfirmasi Pembayaran
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index') }}">Show Konfirmasi</a></li>
        <li class="active">Detail Konfirmasi</li>
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
                    <td> {{ $konfirmasipembayaran->id_pesan }}</td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td> {{ $konfirmasipembayaran->nama }}</td>
                  </tr>
                  <tr>
                    <td>Nama Bank</td>
                    <td> {{ $konfirmasipembayaran->nama_bank }}</td>
                  </tr>
                  <tr>
                    <td>No Rekening</td>
                    <td> {{ $konfirmasipembayaran->no_rekening }}</td>
                  </tr>
                  <tr>
                    <td>Nominal</td>
                    <td> {{ $konfirmasipembayaran->nominal }}</td>
                  </tr>
                  <tr>
                   <td>Tanggal</td>
                    <td> {{ $konfirmasipembayaran->tanggal }}</td>
                  </tr>
                  <tr>
                   <td>Status</td>
                    <td> {{ $konfirmasipembayaran->status }}</td>
                  </tr>
                  <tr>
                    <td>Gambar</td>
                    <td> 
                      <a class="example-image-link" href="{{ asset('upload/Bukti_transfer/'.$konfirmasipembayaran->foto_bukti)  }}" data-lightbox="example-set" >
                      <img src="{{ asset('upload/Bukti_transfer/'.$konfirmasipembayaran->foto_bukti)   }}" style="max-height:200px;max-width:200px;margin-top:10px;" id="showgambar" class="example-image"></a>
                      </td>
                  </tr>
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>

@stop