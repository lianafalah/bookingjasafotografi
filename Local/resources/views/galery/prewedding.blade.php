@extends('pagepel.template')
@section('main')
<section id="portfolio" style="margin-left: 120px;">
  <div class="container">
    <div class="row text-center">
      <div class="col-sm-8 col-sm-offset-2">
      <h2 class="title-one">Galery Prewedding</h2>
    </div>  
    </div>
      
    <div class="portfolio-items">
      <div class="col-sm-12 col-xs-12 portfolio-item html">
        <div class="grid">
        @foreach($galery_list as $value)
     
          <div class="grid-item" width="auto" height="100%" >
            <a class="example-image-link" href="{{ asset('upload/Galery/'.$value->gambar)}}" data-lightbox="example-set" >
            <img style="{{$value->style}}" src="{{ asset('upload/Galery/'.$value->gambar)}}" >
          </a>
          </div>

        @endforeach
        </div>
       </div>
    </div> 
  </div>
</section>
 <!--/#portfolio-->
@endsection

@push('js')
<script type="text/javascript">
  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: 200
  });
</script>
@endpush