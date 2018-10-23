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
        Data Galery
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Data Galery</li>
      </ol>
    </section>

          <div class="box">
            <a href="{{ route ('galery.create')}}"><button type="button" class="btn bg-maroon btn-flat margin">Tambah Data</button></a>
            <div class="box-body">
               @if (!empty($galery_list))
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id galery</th>
                    <th>Nama galery</th>
                    <th>Tipe</th>
                    
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th >Gambar</th>
                   
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $galery_list as $galery): ?>
                  <tr>
                   <td>{{ $galery->id_galery }} </td>
                    <td>{{ $galery->nama_galery }} </td>
                    <td>{{ $galery->tipe }} </td>
                    
                    <td>{{ $galery->tanggal }} </td>
                    <td>{{ $galery->status}} </td>
                    <td>
                      <a class="example-image-link" href="{{ asset('upload/gambar/'.$galery->gambar)  }}" data-lightbox="example-set" >
                      <img src="{{ asset('upload/gambar/'.$galery->gambar)  }}"  style="max-height:100px;max-width:100px;margin-top:5px;" id="showgambar" class="example-image"></a>
                    </td>
              

                    <td>

                      <div class="btn-group">
                        {!! Form::open(['method'=> 'DELETE','route' => ['galery.destroy', $galery->id ], 'onsubmit' =>'return myConfirm(this)']) !!}

                          <a class="btn btn-primary" href="{{ route ('galery.edit',$galery->id) }}"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-success" href="{{ route ('galery.show',$galery->id) }}"><i class="fa fa-eye"></i></a>
                          <button class="btn btn-danger"  type="submit" ><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
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
      'scrollX' : true
    })
  })

// $('#example1').dataTable({
//   "fnInitComplete": function() {
//     $('#example1').find('.dataTable_scrollbar').jScrollPane();
//   },
//   "sScrollY": "500px"
// });
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

