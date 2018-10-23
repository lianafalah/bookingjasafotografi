@extends('pagepel.template')
@section('main')
<section id="portfolio">
  <div class="container">
    <div class="row text-center">
      <div class="col-sm-8 col-sm-offset-2">
      <h2 class="title-one">Galery PreWedding</h2>
      </div>
      
    </div>
    <ul class="portfolio-filter text-center">
        <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
        <li><a class="btn btn-default" href="#" data-filter=".{{$f_keluarga}}">{{$f_keluarga}}</a></li>
        <li><a class="btn btn-default" href="#" data-filter=".{{$f_wisuda}}">Wisuda</a></li>
        <li><a class="btn btn-default" href="#" data-filter=".joomla">Anak</a></li>
        <li><a class="btn btn-default" href="#" data-filter=".megento">Teman</a></li>
    </ul>

    @foreach($galery_list as $value)
    @if ($value->status == 'Enable')
    <div class="portfolio-items">
      <div class="col-sm-3 col-xs-12 portfolio-item joomla">
        <div class="view efffect">
          <div class="portfolio-image">
            <a class="example-image-link" href="{{ asset('upload/gambar/'.$value->gambar)}}" data-lightbox="example-set" >
            <img width="auto" height="100%" src="{{ asset('upload/gambar/'.$value->gambar)}}" alt="" class="example-image" />
          </a>
          </div>
        </div>   
      </div>
      @endif
      @endforeach
    </div> 
  </div>
</section> <!--/#portfolio-->
@stop