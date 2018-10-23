
<body>
  <div class="preloader">
    <div class="preloder-wrap">
      <div class="preloder-inner"> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div>
      </div>
    </div>
  </div><!--/.preloader-->
  <header id="navigation"> 
    <div class="navbar navbar-inverse navbar-fixed-top" role="banner"> 
      <div class="container"> 
        <div class="navbar-header"> 
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
          </button> 
          
        </div> 
        <div class="collapse navbar-collapse" style="padding-left: 100px;"> 
          <ul class="nav navbar-nav navbar-center"> 
            <li class="scroll"><a href="{{ url ('home') }}">Home</a></li> 
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Galery</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url ('galery/wedding') }}">Wedding</a></li>
                    <li><a href="{{ url ('galery/prewedding') }}">Prawedding</a></li>
                    <li><a href="{{ url ('galery/fotostudio') }}">Foto Studio</a>
                    </li>
                  </ul>
                </li> 
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Paket</a>
              <ul class="dropdown-menu">
                    <li><a href="alamat.html">Wedding</a></li>
                    <li><a href="kebijakan.html">Prawedding</a></li>
                    <li><a href="{{ url ('paket/studiofoto') }}">Foto Studio</a></li>
                  </ul>
              </li>  
              <li class="scroll"><a href="{{ url ('pemesanan/konfirmasi_pemesanan') }}">Konfirmasi Pembayaran</a></li>
            <li><a class="scroll"><img src="Asset/himu/images/logo_copy.png" alt="STAR"></a></li> 
             
            <li class="scroll"><a href="#portfolio">Cek Pemesanan</a></li> 
            <li class="scroll"><a href="#clients">Testimoni</a></li> 
             @if(Auth::user()->jabatan =='Admin')
            <li class=""dropdown""><a class="dropdown-toggle" data-toggle="dropdown" href="#our-team">User</a></li>
            <ul class="dropdown-menu">
                    <li><a href="{{ route('register') }}">Registrasi</a></li>
                    <li><a href="kebijakan.html">Show User</a></li>
                  </ul>
            @endif
            @if(Auth::user()->jabatan =='Manager')
            <li class="scroll"><a href="#clients">Laporan</a></li>
            @endif 
            <li class="scroll"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                 
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              
              <li>
                  
                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </li>
              
            </ul>
          </li>
          </ul> 
        </div> 
      </div> 
    </div><!--/navbar--> 
  </header> <!--/#navigation--> 
</body>