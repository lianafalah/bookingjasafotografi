
@extends('admin.template')
@section('content')

<div class="content">
<section class="content-header ">
      <h1>
       Data Testimoni
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
               @if (!empty($testi_list))
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                    <th>Email</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Status</th>                  
                    <th><i class="icon_cogs"></i> Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php foreach( $testi_list as $testi): ?>
                  <tr>
                     <form  action="{{ route ('testi.update',$testi->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <td>{{ $testi->nama }} </td>
                    <td>{{ $testi->email }} </td>
                    <td>{{ $testi->isi }} </td>
                    <td>{{ $testi->tanggal }} </td>
                    <td><select id="status" onchange="submit()" name="status" class="form-control input-sm m-bot15">
                      @if ($testi->status == 'Tampil')
                      
                            <option selected>Tampil</option>
                            <option>Tidak Tampil</option>
                          @elseif ($testi->status == 'Tidak Tampil')
                            <option >Tampil</option>
                            <option selected>Tidak Tampil</option>
                          @else
                            <option>Ubah Status</option>
                            <option>Tampil</option>
                            <option>Tidak Tampil</option>
                            
                      @endif
                      </select> </td>
                    <td>
                      </form>

                      <div class="btn-group">
                        {!! Form::open(['method'=> 'DELETE','route' => ['testi.destroy', $testi->id ], 'onsubmit' =>'return myConfirm(this)']) !!}
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
$(document).ready(function() {
    var table = $('#example1').DataTable();
} );
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

</script>
@stop

