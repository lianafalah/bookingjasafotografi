@extends('member.template')
@section('main')

<div class="container">
        <div class="row">
          <div class="col-lg-12" style="text-align: center;">
            
              <header class="panel-heading">
                <h3> Maaf  </h3>
              </header>


              <div class="pemberitahuan2"> Pemesanan atas id {{$pemesanan->id_pesan}} telah melewati masa batas 1 jam untuk konfirmasi pembayaran. Silahkan melakukan pemesanan ulang. </div>
            




          </div>
      </div>
  </div>
@stop