<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Star Photo & Printing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap and Font Awesome css-->
    <!-- we use cdn but you can also include local files located in css directory-->
    <link rel="stylesheet" href="{{ url ('Asset/agency/css/font-awesome.min.css')}}">
    <link href="{{ url ('Asset/agency/css/themify-icons.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ url('Asset/agency/css/bootstrap.min.css')}}">
    <!-- Google fonts - Roboto Condensed for headings, Open Sans for copy-->
    <link rel="stylesheet" href="{{ url('Asset/agency/css/css.css')}}">
    <!-- theme stylesheet-->

  
    <link href="{{ url('Asset/agency/css/style.default.css')}}" rel="stylesheet"> 
    <!-- Custom stylesheet - for your changes-->

    <link href="{{ url ('Asset/agency/css/custom.css') }}" rel="stylesheet"> 
    <link href="{{ url ('Asset/himu/css/prettyPhoto.css') }}" rel="stylesheet">
     <link href="{{ url ('Asset/himu/css/animate.css') }}" rel="stylesheet">
     <link href="{{ url ('Asset/himu/css/jquery.sidr.dark.css') }}" rel="stylesheet">
     <link href="{{ url ('Asset/himu/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('Asset/lightbox.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet"> 
  </head>
  <body data-target="#navigation"  data-offset="120">

    <!-- intro-->
    <section id="intro" class="intro">

        <div id="main-carousel" class="carousel slide" data-ride="carousel">
          
          <!--/.carousel-indicators-->
          
          <div class="carousel-inner"  >
            <!-- <?php $gambar
             // = 'upload/gambar/'.$gallery_list->gambar;?> -->
             @foreach($slider as $key => $value)
            <div class="item @if($key == 0) active @endif img-responsive" style="background-image: url('{{ asset('upload/gambar/'.$value->gambar)}}'); animation: zoom 45s;">
              
              <div class="carousel-caption"><h3 style="margin-top: 200px;" class="caption"> {{$value->caption}}</h3> </div>
            </div>
            @endforeach
          </div>
           
          <!--/.carousel-inner-->
          <a class="carousel-left member-carousel-control hidden-xs" href="#main-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
          <a class="carousel-right member-carousel-control hidden-xs" href="#main-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
        </div>
        <a href="#navigation" class="icon faa-float animated scroll-to"><i class="fa fa-angle-down fa-5x" style="padding-top: 10px;"></i></a>
      
    </section>
    <!-- navbar-->
    <header class="header">
      <div class="sticky-wrapper">
        <div role="navigation" class="navbar navbar-default">
          <div class="container" style="padding-top:10px">
            <div class="navbar-header" >
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar" ></span></button><a href="#intro" class="navbar-brand scroll-to" ><img  src="Asset/agency/img/logo_copy.png" alt="" ></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#intro">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Galery <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url ('galery/wedding') }}">Wedding</a></li>
                    <li><a href="{{ url ('galery/prewedding') }}">Prawedding</a></li>
                    <li><a href="{{ url ('galery/foto_studio') }}">Foto Studio</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#">Paket <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{{ url ('paket/wedding') }}">Wedding</a></li>
                    <li><a tabindex="-1" href="{{ url ('paket/foto studio') }}">Foto Studio</a></li>
                    <li class="dropdown-submenu">
                      <a class="test" href="">Prewedding <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url ('paket/outdoor') }}">Outdoor</a></li>
                        <li><a href="{{ url ('paket/indoor') }}">Indoor</a></li>
                      </ul>
                    </li>
                  </ul>
                </li> 
               <!--  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" >Paket</a>
                  <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="{{ url ('paket/wedding') }}">Wedding</a></li>
                     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><a tabindex="-1" href="{{ url ('paket/foto studio') }}">Foto Studio</a></li>
                    <li class="dropdown-submenu">
                      <a href="{{ url ('paket/prewedding') }}">Prawedding <span class="dropdown"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Outdoor</a></li>
                        <li><a href="#">Indoor</a></li>
                      </ul>

                    </li>
                   
                  </ul>
              </li>   -->
                <li><a href="{{ url ('cek_pemesanan') }}">Cek Pemesanan </a></li>
            <!--     <li><a href="{{ url ('testimoni') }}">Testimoni</a></li> -->
                <li><a href="{{ url ('aboutus') }}">About Us</a></li>
                <li><a href="{{ url ('register_member') }}">Registrasi</a></li>
                <li><a href="{{ url ('member/login') }}"">Login</a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- /.navbar-->
    <!-- about us-->
    <section id="about">
      <div class="container clearfix">
        <div class="row margin-bottom">
          <div class="col-md-6 margin-bottom"> 
            <h2 class="heading">Star Photo & Printing</h2>
            <p style="text-align: center;">Star Photo & printing adalah perusahaan yang bergerak pada jasa fotografi dan printing,  yang  merupakan studio foto terbesar dan paling berpengalaman di kota Cilacap dan  memiliki gaya unik dengan berbagai tema kreatif dan modern.</p>

          </div>
          <div class="col-md-6 margin-bottom">
            <p><img src="Asset/agency/img/9a.jpeg" alt="" class="img-responsive"></p>
          </div>
        </div>
    </section>
    <!-- portfolio-->
    <section id="portfolio">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="heading">Recent Work</h2>
            <p>Karya terbaru kami Dari Wedding Photography, Wedding Videography, dan Photo Studio</p>
          </div>
        </div>

         @foreach($galery_list as $value)
        
      <div class="portfolio-items">
          <div class="col-sm-3 col-xs-12 portfolio-item html">

              <div class="portfolio-image" style="height: 200px;">
                <a class="example-image-link" href="{{ asset('upload/gambar/'.$value->gambar)}}" data-lightbox="example-set" >
                <img width="auto" height="100%" src="{{ asset('upload/gambar/'.$value->gambar)}}" alt="" class="example-image"/></a>
                
           
            </div>
          </div>
      </div>
          
      @endforeach
    </div>
    </section>
     
        <!-- Sections -->
       
    <section id="contact">
      <div class="container clearfix">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading">Contact Us</h2>
            <div class="row">
              <div class="col-md-6">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.7068017102397!2d109.01374861401162!3d-7.71457587856568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6512be740f03e5%3A0x44c7c8972c34c4cf!2sStar+Photo+%26+Printing!5e0!3m2!1sid!2sid!4v1512358279560"  width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
          <div class="contact-info">
          <div class="col-md-6">
            <ul>
              <li><i class="fa fa-home fa-2x"></i>&nbsp;Jl. Gatot Subroto No.65, Sidanegara, Cilacap Tengah, Kabupaten Cilacap, Jawa Tengah 52223</li>
              <li><i class="fa fa-phone fa-2x"></i>&nbsp; +6287837333992</li>
              <li><i class="fa fa-envelope fa-2x"></i>&nbsp; info@domain.net</li>
               
              <!-- <li><i class="fa fa-download fa-2x"></i>&nbsp; Download My Resume</li> -->
            </ul>
            <div class="jam">
              Jam Kantor&nbsp; : </br> 
              Senin-Sabtu   :   09:00 - 20:30 </br>
              Minggu       :   09:00 - 13:00 , 17:00 - 20:30 </br>
            </div>
         
          </div>
        </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- map-->
    <!-- <section id="map">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.7068017102397!2d109.01374861401162!3d-7.71457587856568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6512be740f03e5%3A0x44c7c8972c34c4cf!2sStar+Photo+%26+Printing!5e0!3m2!1sid!2sid!4v1512358279560"  width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section> -->
    @include('pagepel.footer')
    <!-- Javascript files-->
    <script src="{{ asset('Asset/agency/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{ asset('Asset/agency/js/bootstrap.min.js')}}"></script>


    <script src="{{ asset('Asset/agency/js/jquery.scrollTo.min.js') }}"></script>
      <script type="text/javascript" src="{{asset('Asset/sweetalert.min.js')}}"></script>
   
    <script src="{{ asset('Asset/agency/js/gmaps.js') }}"></script>

    <script src="{{ asset('Asset/agency/js/jquery.cookie.js')}}"></script>

    <script src="{{ asset('Asset/agency/js/front.js') }}"></script>

    <script src="{{ asset ('Asset/himu/js/smoothscroll.js') }}"></script>
    <script src="{{ asset ('Asset/himu/js/jquery.isotope.min.js')}}"></script>
    <script src="{{ asset ('Asset/himu/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset ('Asset/himu/js/jquery.parallax.js')}}"></script>
    <script src="{{asset('Asset/lightbox-plus-jquery.min.js')}}"></script>
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
    <script type="text/javascript">
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });

    </script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true
        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
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
   
<script type="text/javascript">
   @if(session('alert'))
 swal({

  icon: "success",
  title: "Testimoni Berhasil Disimpan",
});
  @endif
</script>

  </body>
</html>