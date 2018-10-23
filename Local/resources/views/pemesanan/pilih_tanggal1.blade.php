@extends('pagepel.template')
@section('main')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9" style="left: 150px;">
          <div class="box box-primary">
            <div class="box-body no-padding">

                <div id='calendar'></div>

                </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
       </section>
    <!-- /.content -->
  </div>
</div>

  <div class="control-sidebar-bg"></div>
</div>
@endsection
@push('js')
<script>
  $(function () {
     
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : ''
      },
      eventLimit: true,
      events    : [
                
                @foreach($pemesanans as $pemesanan)
                 {
                    title : '{{ $pemesanan->pukul }}',
                    start : '{{ $pemesanan->tanggal_foto }}',
                },
                @endforeach
            ],
        dayClick: function(date, jsEvent, view) {
            var id_paket = '{{$id_paket}}';
            var tipe = '{{$tipe}}';

            $.get("{{ route ('pemesanan.create') }}",
            {
                date: date.format(),
                id_paket: id_paket,
                tipe : tipe
            },
            function(data, status){
              console.log(tipe);
              var now = new Date(date);
              if (tipe == 'Wedding') {
                var start = new Date('{{ Carbon\Carbon::now()->addDays(7)->toDateString() }}');
                var message = 'Maaf Pemesanan Wedding Hanya bisa dilakukan H-7';
              } 
              else if (tipe == 'Prewedding') {
                var start = new Date('{{ Carbon\Carbon::now()->addDays(0)->toDateString() }}');
                var message = 'Maaf Pemesanan Prewedding Hanya bisa dilakukan H-1';
              } 
              else {
                var start = new Date('{{ Carbon\Carbon::now()->addDays(0)->toDateString() }}');
                var message = 'Maaf Pemesanan Foto Studio Hanya bisa dilakukan H-1';
              }
              console.log(now.getTime() > start.getTime());
              if(now.getTime() > start.getTime()) {
                window.open = "{{ route ('pemesanan.create') }}";
              } else {
                swal(message);
              }
              @if(session('alert'))
 swal({

  icon: "warning",
  title: "Maaf Pemesanan sudah penuh",
});

  @endif
            });
        }

    })

  })
 
</script>


@push('js')
