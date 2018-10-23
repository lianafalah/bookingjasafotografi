
@extends('admin.template')
@section('content')

<div class="content">
<section class="content-header ">
      <h1>
       Data User
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Data Anggota</li>
      </ol>
    </section>

          <div class="box">
            <a href="{{ route ('users.create')}}"><button type="button" class="btn bg-maroon btn-flat margin">Tambah Data</button></a>
            <div class="box-body">
                @if (!empty($user_list))
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                    <th>ID Petugas</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach( $user_list as $user): ?>
                  <tr>
                    <td>{{ $user->name }} </td>
                    <td>{{ $user->id_petugas }} </td>
                    <td>{{ $user->email }} </td>
                    <td>{{ $user->jabatan }} </td>
                    <td>{{ $user->no_telp }} </td>
                    <td>{{ $user->alamat }} </td>
                     <td>

                      <div class="btn-group">
                        {!! Form::open(['method'=> 'DELETE','route' => ['user.destroy', $user->id ], 'onsubmit' =>'return myConfirm(this)']) !!}
                        <a class="btn btn-success" href="{{ route ('user.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                          <button  class="btn btn-danger"  type="submit" ><i class="fa fa-trash"></i></button>
                          
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
 @if(session('alert'))
 swal({

  icon: "success",
  title: "Data Berhasil Disimpan",
});

  @endif
  
</script>
@stop

