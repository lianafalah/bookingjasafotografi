@extends('admin.template')
@section('content')
<section class="content-header">
      <h1>
        Data Hasil Edit

      </h1>
      
    </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
  
            </div>
 
              <div class="col-sm-12"><a href="{{route ('detail_pemesanan.create')}}">
               <button type="button" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp; Input Hasil Edit</button></a>
             <br/>
            </div> 
           </br>
              @if (!empty($history))
              <div class="box-body">
              <table id="paket" class="table table-bordered table-striped"">
                <thead>
                  <tr>
                    <th>Id Pesan</th>
                    <th>Id Petugas</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                  
                  </tr>
                </thead>
                <tbody>

                  <?php foreach( $history as $depes): ?>
                  <tr>
                    <td>{{ $depes->id_pesan }} </td>
                    <td>{{ $depes->id_petugas }} </td>
                    <td>{{ $depes->status }} </td>
                    <td>{{ $depes->created_at }} </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>                         

              @else
              <p>tidak ada data hasil edit </p>
              @endif
            </div>
      </div>
    </div>
  </div>
</section>

        
        
 
 
@stop
@section('java')
<script type="text/javascript">

$('#paket').dataTable({
  "fnInitComplete": function() {
    $('#paket').find('.dataTable_scrollbar').jScrollPane();
  },
  "sScrollY": "500px"
});
</script>
<!-- <script>
  $(function () {

    $('#paket').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script> -->

<script type="text/javascript">
  function myConfirm(e) {
  swal({
    title: "Hapus nih?",
    text: "Beneran mau dihapus?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {

    if (willDelete) {
      swal("Udah dihapus",{
        icon: "success",
      });
      e.submit();
      return true;
    } else {
      swal("belum kehapus kok aman ");
    }
  });
    return false;
}
 @if(session('alert'))
 swal({

  icon: "success",
  title: "Data Berhasil Disimpan",
});

  @endif
   @if(session('alert2'))
 swal({

  icon: "success",
  title: "Data Berhasil DiUbah",
});

  @endif
</script>


@stop

