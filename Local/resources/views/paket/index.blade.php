@extends('admin.template')
@section('content')

<section class="content-header">
      <h1>
        Data Paket

      </h1>
      
    </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
  
            </div>
 
              <div class="col-sm-12"><a href="{{route ('paket.create')}}">
               <button type="button" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp; Input Paket</button></a>
             <br/>
            </div> 
           </br>
              @if (!empty($paket_list))
              <div class="box-body">
              <table id="paket" class="table table-bordered table-striped"">
                <thead>
                  <tr>
                    <th>Id Paket</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>DP</th>
                    <th>Tipe</th>
                    
                    <th style="width: 200px;">Keterangan</th>
                    
                   
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach( $paket_list as $paket): ?>
                  <tr>
                    <td>{{ $paket->id_paket }} </td>
                    <td>{{ $paket->nama_paket }} </td>
                    <td>{{ $paket->harga_paket }} </td>
                    <td>{{ $paket->dp }} </td>
                    <td>{{ $paket->tipe }} </td>
                    <td>{{ $paket->keterangan }} </td>
                    <td>
                      <div class="btn-group">
                          <a class="btn btn-primary" href="{{ route ('paket.edit',$paket->id) }}"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-success" href="{{ route ('paket.showw',$paket->id) }}"><i class="fa fa-eye"></i></a>
                       
                      </div>           

                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>                         

              @else
              <p>tidak ada data paket </p>
              @endif
            </div>
      </div>
    </div>
  </div>
</section>

       
@stop
@section('java')
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('paket').DataTable({
      "scrollX" : true
    });

  });
  $(function () {

    $('#paket').DataTable({
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
 --> <script type="text/javascript">

$('#paket').dataTable({
  "fnInitComplete": function() {
    $('#paket').find('.dataTable_scrollbar').jScrollPane();
  },
  "sScrollY": "500px"
});
</script>


<script type="text/javascript">
 
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

