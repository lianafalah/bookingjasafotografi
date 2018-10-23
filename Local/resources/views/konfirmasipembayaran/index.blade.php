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
       Data Konfirmasi Pembayaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Data Konfirmasi Pembayaran</li>
      </ol>
    </section>

          <div class="box">
            
            <div class="box-body">
               @if (!empty($konfirmasipembayaran_list))
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                    <th>Id Pesan</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Nominal</th>
                    <th width="20px">Tanggal Konfirmasi</th>
                    <th>Status</th>
                    <th>Foto Bukti</th>              
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $konfirmasipembayaran_list as $konfirmasipembayaran): ?>
                  <tr>
                    <form  action="{{ route ('konfirmasipembayaran.update',$konfirmasipembayaran->id_pesan) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <td>{{ $konfirmasipembayaran->id_pesan }} </td>
                    <td>{{ $konfirmasipembayaran->nama }} </td>
                    <td>{{ $konfirmasipembayaran->nama_bank }} </td>
                    <td>{{ $konfirmasipembayaran->no_rekening }} </td>
                    <td>{{ $konfirmasipembayaran->nominal }} </td>
                    <td>{{ $konfirmasipembayaran->tanggal }} </td>
                    <td>{{ $konfirmasipembayaran->status }} </td>
                    <!-- <td><select id="status" onchange="submit()" name="status" class="form-control input-sm m-bot15">
                      @if ($konfirmasipembayaran->status == 'Belum Bayar')
                      
                            <option selected>Belum Bayar</option>
                            <option>Sudah Bayar</option>
                          @elseif ($konfirmasipembayaran->status == 'Sudah Bayar')
                            <option selected>Sudah Bayar</option>
                            
                          @elseif ($konfirmasipembayaran->status == 'Expired')
                            <option selected>Expired</option>
                          @else
                            <option>Konfirmasi</option>
                            <option>Sudah Bayar</option>
                            <option>Tidak Cocok</option>
                      @endif
                      </select> </td> -->
                     
                    <td>
                      <a class="example-image-link" href="{{ asset('upload/Bukti_transfer/'.$konfirmasipembayaran->foto_bukti)  }}" data-lightbox="example-set" >
                      <img src="{{ asset('upload/Bukti_transfer/'.$konfirmasipembayaran->foto_bukti)  }}"  style="max-height:100px;max-width:100px;margin-top:5px;" id="showgambar" class="example-image"></a>
                    </td>
                    <td>
                    </form>
                      <div class="btn-group">
                          <a class="btn btn-success" href="{{ route ('konfirmasipembayaran.show',$konfirmasipembayaran->id_pesan) }}"><i class="fa fa-eye"></i></a>
                          <a class="btn btn-primary" href="{{ route ('konfirmasipembayaran.edit',$konfirmasipembayaran->id_pesan) }}"><i class="fa fa-pencil"></i></a>
                           
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
      "aaSorting":[[0, 'desc']],

    })
  })
</script>
<script type="text/javascript">


$('#show_kp').on('show.bs.modal', function (event) {  
  var button = $(event.relatedTarget);
var modal = $(this);

  
  var recipient = button.data('whatever')
  var status1 = button.data('status')
  var nominal1=button.data('nominal')
  
  modal.find('#id_pesan').val(recipient);
  modal.find('#status').val(status1);
  modal.find('#nominal').val(nominal1);
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

   @if(session('alert2'))
 swal({

  icon: "success",
  title: "Data Berhasil DiUbah",
});

  @endif

     @if(session('alert3'))
 swal({

  icon: "success",
  title: "Pembayaran dan Email Gateway Berhasil",
});

  @endif

  

 </script>

@stop

