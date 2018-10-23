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

<div class="content">
<section class="content-header ">
      <h1>
       Data Pemesanan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Data Anggota</li>
      </ol>
    </section>

          <div class="box">
            
            <div class="box-body">
               @if (!empty($pemesanans))
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Pesan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Foto</th>
                    <th>Pukul</th>
                    <th>Status</th>
                   
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php foreach( $pemesanans as $pemesanan): ?>
                  <tr>
                
                      <td>{{ $pemesanan->id_pesan }} </td>
                    <td>{{ $pemesanan->id_member }} </td>
                    
                    <td>{{ $pemesanan->tanggal_foto }} </td>
                    <td>{{ $pemesanan->pukul }} </td>
                    <td>{{ $pemesanan->status }} </td>
                    <td> {{ $pemesanan->tanggal_ambil }}</td>
                    <td>
           
                      <div class="btn-group">
                       
                          <a class="btn btn-primary" href="{{ route ('pemesanan.edit',$pemesanan->id_pesan) }}"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-success" href="{{ route ('pemesanan.show',$pemesanan->id_pesan) }}"><i class="fa fa-eye"></i></a>

                      </div>           

                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                
              </table>
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>

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
      'scrollX' : true,
        "aaSorting":[[0, 'desc']]
    })
  })
  </script>
<!-- <script type="text/javascript">

$('#example1').dataTable({
  "fnInitComplete": function() {
    $('#example1').find('.dataTable_scrollbar').jScrollPane();
  },
   "aaSorting":[[0, 'desc']],
  "sScrollY": "500px"
});
</script> -->
<script type="text/javascript">
  // $(function(){
  //   $("#example1").DataTable(
  //   {
  //     "aaSorting":[[0, 'desc']],
  //   })
  // })
  $('.tanggal_ambil').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
      
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
      console.log("delete");
      return true;
    } else {
      swal("belum kehapus kok aman ");
      console.log("tidak didelete");
    }

  });
  
    console.log("pasti kepanggil");
    return false;
}

   @if(session('alert2'))
 swal({

  icon: "success",
  title: "Data Berhasil DiUbah",
});

  @endif
</script>
@stop

