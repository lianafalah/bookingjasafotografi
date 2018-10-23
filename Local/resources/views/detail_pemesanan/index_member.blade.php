@extends('member.template')
@section('main')
<h4 class="heading">Data Hasil Edit</h4>

 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
              @if (!empty($detailpemesanan_list))
              <div class="box-body">
              <table id="example1" class="table table-bordered table-striped"">
                <thead>
                  <tr>
                    <th>Id Pesan</th>
                    <th>Status</th>
                    <th>Konfirmasi</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach( $detailpemesanan_list as $depes): ?>
                  <tr>
                    <td>{{ $depes->id_pesan }} </td>
                    <td>{{ $depes->status }} </td>
                    <td>{{ $depes->konfirmasi }} </td>
                    <td>
                      <div class="btn-group">
                          <a class="btn btn-primary" href="{{ route ('detail_pemesanan_member.edit',$depes->id_pesan) }}"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-success" href="{{ route ('detail_pemesanan_member.show',$depes->id_pesan) }}"><i class="fa fa-eye"></i></a>
                      
                      </div>           

                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>                         

              @else
              <p> 
              xjijtidak ada data hasil edit </p>
              @endif
            </div>
      </div>
    </div>
  </div>
  </div>


 
@stop
@section('java')
<script type="text/javascript">

$('#example1').dataTable({
  "fnInitComplete": function() {
    $('#example1').find('.dataTable_scrollbar').jScrollPane();
  },
  "sScrollY": "500px"
});
</script>

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
