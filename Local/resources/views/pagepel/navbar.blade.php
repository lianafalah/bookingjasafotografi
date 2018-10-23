<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>
<header class="header">
      <div class="sticky-wrapper">
        <div role="navigation" class="navbar navbar-default">
          <div class="container" style="padding-top:10px">
            <div class="navbar-header" >
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar" ></span></button><a href="#intro" class="navbar-brand scroll-to" ><img  src="Asset/agency/img/logo_copy.png" alt="" ></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ url ('/') }}">Home</a></li>
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
    <script type="text/javascript">
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });

    </script>


