@extends('pagepel.template')
@section('main')
        <div class="row">
          
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>Form Input Pemesanan</h3>
              </header>
              <div class="panel-body">
                <div class="form">

                  <form class="form-validate form-horizontal" id="feedback_form" action="{{ Route('pemesanan.store') }}" method="POST" >
                    {{csrf_field()}}

                    <div class="form-group ">
                      <label for="id_pesan" class="control-label col-lg-2">ID Pesan </label>
                      <div class="col-lg-10">
                        <input class="form-control" id="id_pesan" name="id_pesan" maxlength="15"  type="text"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="id_paket" class="control-label col-lg-2">Id Paket</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="id_paket" type="text" value="{{ $paket->id_paket }}" readonly name="id_paket" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="nama_paket" class="control-label col-lg-2">Name Paket</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="nama_paket" name="nama_paket" type="text"  value="{{ $paket->nama_paket }}" readonly />

                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="harga" class="control-label col-lg-2">Harga</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="harga" type="text" name="harga" value="Rp. {{ $paket->harga_paket }}" readonly  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="dp" class="control-label col-lg-2">DP</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="dp" type="text" name="dp" value="Rp. {{ $paket->dp }}" readonly />
                      </div>
                    </div>
                  
                    <div class="form-group ">
                      <label for="tanggal_pesan" class="control-label col-lg-2">Tanggal Pesan</label>
                      <div class="col-lg-10">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input class="form-control " id="tanggal_pesan" type="text" value="{{ date('Y-m-d') }}" name="tanggal_pesan" readonly />
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="tanggal_foto" class="control-label col-lg-2">Tanggal Foto</label>
                      <div class="col-lg-10">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input class="form-control " id="tanggal_foto" type="text"  name="tanggal_foto" value="{{ session('tglfoto') }}" readonly />
                        </div>
                      </div>
                    </div>
                    
                  <div class="bootstrap-timepicker">
                    <div class="form-group ">
                      <label for="pukul" class="control-label col-lg-2">Pukul</label>
                      <div class="col-lg-10">                      
                        <div class="input-group">
                            <input type="text" class="form-control timepicker" id="pukul"  name="pukul">
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                               </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Pesan</button>
                        
                        <button class="btn btn-default" type="button" onclick="history.go(-1);">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
@stop