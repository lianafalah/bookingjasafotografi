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
                <li ><a href="{{ url ('homemember') }}">Home</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#">Paket <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{{ url ('paketmember/wedding') }}">Wedding</a></li>
                    <li><a tabindex="-1" href="{{ url ('paketmember/foto studio') }}">Foto Studio</a></li>
                    <li class="dropdown-submenu">
                      <a class="test" href="">Prewedding <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url ('paketmember/outdoor') }}">Outdoor</a></li>
                        <li><a href="{{ url ('paketmember/indoor') }}">Indoor</a></li>
                      </ul>
                    </li>
                  </ul>
                </li> 
                <li><a href="{{ route ('konfirmasipembayaran.create') }}">Konfirmasi Pembayaran</a></li>
                <li><a href="{{ url ('index_detailpemesanan_member') }}">Hasil Edit</a></li>
               
              <li>
              <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
              <span class="hidden-xs">{{ auth('member')->user()->nama }}</span>
                <img src="{{ asset('upload/gambar/'.Auth('member')->user()->gambar)}}" class="user-image" alt="User Image" style="width: 30px; height: 30px;">
            </a>
         
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('upload/gambar/'.Auth('member')->user()->gambar)}}" class="user-image"  style="width: 50px; height: 50px;  display: block;margin-left: auto;margin-right: auto;">

              
                <p align="center">{{ auth()->guard('member')->user()->nama }} </p>
              
                
              </li>

              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route ('member.edit',auth()->guard('member')->user()->id )}}" class="">Profile</a>
                </div>
                <div class="pull-right">
                
                  
                <a href="{{ route('member.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              
                </div>
                
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </li>
            </ul>
              
            </div>
          </div>
        </div>
      </div>
    </header>

