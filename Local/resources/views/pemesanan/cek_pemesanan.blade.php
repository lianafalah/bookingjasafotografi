@extends('pagepel.template')
@section('main')
<div class="container">
    <div class="row">
          <div class="col-lg-12">
            <div class="tittle">
              <h2 class="title-one" ><i class="fa fa-table"></i>Cek Pemesanan</h2>
            </div>
          </div>
      <div class="col-lg-12">
        <div class="panel-body">
          <div clas="row">{!! Form::open(['method'=>'GET','url'=>'cek_pemesanan','role'=>'search']) !!} 
            <table border="0">
              <tr>
                <td style="text-align:center;"><label>Input Kode Pesan</label></td>
              </tr>
              <tr>
                <td style="text-align:center;">
                <input  type="text" class="form-control" name="id_pesan" placeholder="Id Pesan">
                </td>
              </tr>
              <tr>
                <td style="text-align:center;width: 2000px;"><button class="btn btn-group-default" type="submit"><i class="fa fa-search"></i> Cari</button></td>
              </tr>
            </table>
            {!! Form::close() !!}
          </div>
        </div>
      </div>

              @if (!empty($pemesanan_list))
              <table class="display responsive nowrap" id="pemesanan">
                <thead>
                  <tr>
                    <th>ID Pesan</th>
                    <th>Nama Paket</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Foto</th>
                    <th>Pukul</th>
                    <th>Sisa</th>
                    <th>Tanggal Ambil</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach( $pemesanan_list as $pemesanan): ?>
                  <tr>
                    <td>{{ $pemesanan->id_pesan }} </td>
                    <td>{{ $pemesanan->nama_paket }} </td>
                    <td>{{ $pemesanan->tanggal_pesan }} </td>
                    <td>{{ $pemesanan->tanggal_foto }} </td>
                    <td>{{ $pemesanan->pukul }} </td>
                    <td>{{ $pemesanan->sisa }} </td>
                    <td>{{ $pemesanan->tanggal_ambil }} </td>
                    <td>{{ $pemesanan->status }} </td>

                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>                         
              @else
                  
              @endif
    </div>
        
 </div>
 
@stop
@section('java')
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#pemesanan').DataTable();
} );
@if(session('alert5'))
 swal({

  icon: "warning",
  title: "Maaf Data Pemesanan tidak tersedia",
});

  @endif
</script>

@stop

