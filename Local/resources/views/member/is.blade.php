@extends('member.template')
@section('main')
       
       <div class="container">
        <div class="row">
         
          <div class="col-lg-12">
           
              <header class="panel-heading">
                <h3 ><i class="fa fa-files-o"></i> terimakasih telah melakukan pemesanan </h3>
              </header>
            </div>
          </div>
        </div>
   
@endsection
@push('js')
<script type="text/javascript">

   @if(session('urlPDF'))
   window.open("{{ session('urlPDF') }}");
  @endif
</script>
<script type="text/javascript">
  @if(session('alert4'))
 swal({

  icon: "success",
  title: "Data Berhasil Disimpan",
});

  @endif
</script>
@endpush