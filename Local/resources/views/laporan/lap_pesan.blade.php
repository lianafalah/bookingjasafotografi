@extends('admin.template')
@section('content')
<section class="content-header">
      <h1 style="text-align: center;">
        Lihat DataLaporan

      </h1>
    </section>
<section class="content">
<div class="row">
          <div class="col-lg-12">
            <section class="panel" >     
      <div class="panel-body">
        <div class="form" >
          <form class="form-validate form-horizontal" action="{{ Route('lap_pesan.store') }}" id="feedback_form" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            
                    <div class="form-group">
                      <label for="pilih tanggal" class="control-label col-lg-2"> Tanggal Awal<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal_awal" class="datepicker" id="datepicker" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pilih tanggal" class="control-label col-lg-2">Tanggal Akhir<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                             <input type="text" name="tanggal_az" class="datepicker" id="datepicker" >
                        </div>
                      </div>
                    </div>


            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit">Lihat</button>
                <button type="reset" class="btn btn-default" onclick="history.go(-1);">Cancel</button>
              </div>
            </div>
          </form>
      </div>
      </div>
      </section>
</div>
</div>
</section>

@endsection
@section('java')
<!-- <script type="text/javascript">
$('.tanggal_awal').datepicker({
      minDate : newDate(),
      format: 'yyyy-mm-dd',
      autoclose: true,
      
    })
$('#tanggal_akhir').datepicker({
      minDate : newDate(),
      format: 'yyyy-mm-dd',
      autoclose: true,
      
    })
</script> -->
<script type="text/javascript">
        $(document).on('focus', '.datepicker',function(){
            $(this).datepicker({
                todayHighlight:true,
                format:'yyyy-mm-dd',
                autoclose:true
            })
        });
    </script>
@stop