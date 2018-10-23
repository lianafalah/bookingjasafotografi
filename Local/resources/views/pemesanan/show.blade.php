
@extends('admin.template')

@section('content')

  <section class="content-header">
      <h1>
        Form Detail Pemesanan
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ url ('index_pemesanan') }}">Show Pemesanan</a></li>
        <li class="active">Detail Pemesanan</li>
      </ol>
    </section>
     
            <section class="content">
             <div class="row">
          <div class="col-lg-12">
            <section class="panel" >
              

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <td>ID Pesan</td>
                    <td> {{ $pemesanan->id_pesan }}</td>
                  </tr>
                  <tr>
                    <td>Nama Paket</td>
                    <td> {{ $pemesanan->id_paket }}</td>
                  </tr>
                  <tr>
                    <td>Nama Paket</td>
                    <td> {{ $pemesanan->nama_paket }}</td>
                  </tr>
                  <tr>
                    <td>Tanggal Pesan</td>
                    <td> {{ $pemesanan->tanggal_pesan }}</td>
                  </tr>
                  <tr>
                    <td>Tangal Foto</td>
                    <td> {{ $pemesanan->tanggal_foto }}</td>
                  </tr>
                  <tr>
                   <td>Status</td>
                    <td> {{ $pemesanan->status }}</td>
                  </tr>
                  <tr>
                   <td>Sisa Bayar</td>
                    <td> {{ $pemesanan->sisa }}</td>
                  </tr>
                  <tr>
                    <td>Tanggal Ambil</td>
                    <td> {{ $pemesanan->tanggal_ambil }}</td>
                  </tr>
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>
      

@stop