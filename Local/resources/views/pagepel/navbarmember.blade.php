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
          <div class="container">
              <div class="navbar-header" >
                <button type="button" data-toggle="collapse"  class="navbar-toggle"><span class="icon-bar" ></span></button><a href="{{url('/')}}" class="navbar-brand scroll-to" ><img  src="{{asset('Asset/agency/img/logo_copy.png')}}" alt="" ></a>
              </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li ><a href="{{ url ('/') }}">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Paket</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url ('paket/wedding') }}">Wedding</a></li>
                    <li><a href="{{ url ('paket/prewedding') }}">Prawedding</a></li>
                    <li><a href="{{ url ('paket/foto studio') }}">Foto Studio</a></li>                
                  </ul>
                </li>  
                <li><a href="{{ route ('konfirmasipembayaran.create') }}">Konfirmasi Pembayaran</a></li>
                <li><a href="{{ url ('aboutus') }}">Tukar Jadwal</a></li>
                <li><a href="{{ url ('cek_pemesanan') }}">Cek Pemesanan </a></li>
                <li><a href="{{ url ('testimoni') }}">Hasil Edit</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

