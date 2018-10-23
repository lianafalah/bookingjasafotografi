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
                         
                          <a class="btn btn-success" href="{{ route ('detail_pemesanan.show',$depes->id_pesan) }}"><i class="fa fa-eye"></i></a>
                      
                      </div>           

                    </td>
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
  $(document).ready(function(){
    $('example1').DataTable({
      "scrollX" : true
    });

  });
  $(function () {

    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'scrollX' : true
    })
  })
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

