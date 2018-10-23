@extends('pagepel.template')
@section('main')

<section id="about">
      <div class="container clearfix">
        <div class="row margin-bottom">
          <div class="col-md-6 margin-bottom"> 
            <h2 class="heading">Star Photo & Printing</h2>
            <p>Star Photo & printing adalah perusahaan yang bergerak pada jasa fotografi dan printing,  yang  merupakan studio foto terbesar dan paling berpengalaman di kota Cilacap dan  memiliki gaya unik dengan berbagai tema kreatif dan modern.</p>
            <p></p>
              
          </div>
          <div class="col-md-6 margin-bottom">
            <p><img src="{{asset('upload/gambar/aa.jpg')}}" alt="" class="img-responsive"></p>
          </div>
        </div>
    </section>
<section id="map">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.7068017102397!2d109.01374861401162!3d-7.71457587856568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6512be740f03e5%3A0x44c7c8972c34c4cf!2sStar+Photo+%26+Printing!5e0!3m2!1sid!2sid!4v1512358279560"  width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
<script type="text/javascript">
	$(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
@endsection