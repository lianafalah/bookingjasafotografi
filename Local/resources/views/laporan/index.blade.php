@extends('admin.template')
@section('content')
            <div class="row">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                <h3 class="page-header"><i class="fa fa-table"></i>Pemesanan</h3>
                </header>
                <div class="box">
                  <div class="box-hearder">
                    <a onclick="periodeDorm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Atur Tanggal 
                    </a>
                    <a href="laporan/pdf/{{$awal}}/{{$akhir}}" target="_blank" class="btn btn-info"><i class="fa fa-file-pdf-o"></i>Export PDF</a>
                  </div>
                </div>
              @if (!empty($pemesanan_list))
              <table class="table" id="pemesanan">
                <thead>
                  <tr>
                    <th>Id Pesan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Foto</th>
                    <th>Pukul</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>               
                 <tr>
                     <?php foreach( $pemesanans as $pemesanan): ?>
                
                    <td>{{ $pemesanan->id_pesan }} </td>
                    <td>{{ $pemesanan->nama }} </td>
                    <td>{{ $pemesanan->tanggal_pesan }} </td>
                    <td>{{ $pemesanan->tanggal_foto }} </td>
                    <td>{{ $pemesanan->pukul }} </td>
                    <td>{{ $pemesanan->status }} </td>
                    
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>                         

              @else
              <p>tidak ada data pemesanan </p>
              @endif

        
        </section>
        </div></div>
        
 
 
@stop

@section('java')
@include('laporan.form')
@endsection
@section('script')
<script type="text/javascript">
  var table, awal, akhir;
  $(function(){
    $('#awal, #akhir') .datepicker({
      format : 'yyyy-mm-dd',
      autoclose : true

    });
    table = $('.tabel->laporan').DataTable({
      "dom" : 'Brt',
      "bSort" :false,
      "bPaginate" :false,
      "bProcessing" :true,
      "serverside" :true,
      "ajax" :{
        "url" : "laporan/data/{{ $awal}}/{{$akhir}}",
        "type" : "GET"
      }
    });
  });
  function perodeForm(){
    $('#modal-form') . modal('show');
  }
</script>

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#pemesanan').DataTable();
} );
$('.tanggal_ambil').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      
    })
</script>

@stop

