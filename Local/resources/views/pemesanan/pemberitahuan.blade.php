
<body>
  <style type="text/css">
    .pemberitahuan{
    font-size: 15px;
margin-bottom: 10px;
}
   .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;overflow:hidden;border-width:0px;word-break:normal;border-color:#fff;color:#333;background-color:#fff;width: 50px;text-align: center;}
   .tg .tf {font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#333;background-color: #f9f9f9;width: 50px;text-align: left;}
 .tg{border-collapse:collapse;border-spacing:0;border-color:#fff;width: 100%; }
  .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#fff;color:#333;background-color:#e3e3e5;text-align: center;}
  .tg .tj{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#fff;color:#333;background-color: #f0f0f0;text-align: center;}
  .tg .ti{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#fff;color:#333;background-color: #fcf7f7;text-align: center;}
  .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
  </style>
          <table>
            <tr>
              <td width="450"><h2>Bukti Pemesanan </h2></td>
              <td><img src="{{asset('Asset/agency/img/logo_copy.png')}}" alt="STAR" align="right" style="text-align: right;"></td>
            </tr>
          </table>
          <div class="col-lg-12" style="text-align: left;">
    
              <div style="text-align: center;" class="tg-rv4w">
              <div>Untuk Informasi Pembayaran atau Informasi lainya bisa hubungi Call Center Star</div>
              <div>Terimakasi atas pemesanan Anda melalui Website Star Photo & Printing </div>
              <div>Anda harus membayar pemesanan ini dan melakukan konfirmasi pembayaran </div>
                <div>paling lambat tanggaloo  {{$coba}} </div>
              </div>
              <br>   
              <table class="tg" border="0">
                <tr>
                  <th colspan="4" style="text-align: center;">Detail Paket</th>
                </tr>
                <tr>
                  <td class="tj">Nama Paket</td>
                  <td class="tj">Tipe Paket</td>
                  <td class="tj">Harga</td>
                  <td class="tj">DP Harus Dibayar</td>
                </tr>
                <tr>
                  <td class="ti">{{$paket->nama_paket}}</td>
                  <td class="ti">{{$paket->tipe}}</td>
                  <td class="ti">{{$paket->harga_paket}}</td>
                  <td class="ti">{{$paket->dp}}</td>
                </tr>
              </table>
              <br>
              <table class="tg" border="0">
                <tr>
                  <th colspan="3" style="text-align: center;">Detail Pemesanan</th>
                </tr>
                <tr>
                  <td class="tj">ID Pesan</td>
                  <td class="tj">Tanggal Pesan</td>
                  <td class="tj">Pukul</td>
                </tr>
                <tr>
                  <td class="ti">{{$pemesanan->id_pesan}}</td>
                  <td class="ti">{{$pemesanan->tanggal_foto}}</td>
                  <td class="ti">{{$pemesanan->pukul}}</td>
                </tr>
              </table>
              <br>
              <table class="tg" >
                <tr>
                  <th style="text-align: center;">Info Pemesan</th>
                </tr>
                <tr>
                  <td class="tf">{{$member->id_member}}</td>
                </tr>
                <tr>
                      <td class="tf">{{$member->nama}}</td>
                </tr>
                <tr>
                  <td class="tf">{{$member->alamat}}</td>
                </tr>
                <tr>
                  <td class="tf">{{$member->no_telp}}</td>
                </tr>
              </table>
              <br>
              <table class="tg" border="0">
                <tr>
                  <th >Informasi</th>
                </tr>
                <tr>
                  <td class="tf">
                  <img src="{{asset('upload/gambar/mandiri-logo.jpg')}}" style="width: 100px;" > 900-0000-0000-0 a.n Star Photo & Printing 
                  </td>
                </tr>
                <tr >
                  <td class="tf">Pembayaran dapat dilakukan di ATM Bank dan <i>Payment Poin</i> (* Untuk beberapa Bank dapat melakukan pembayaran melalui Internet Banking, dan layanan lainya yang dimiliki) yang terdaftar sebagai berikut : </br>
                    <ol>
                      <li>Bank Mandiri</li>
                      <li>Bank BII Maybank</li>
                      <li>Bank BRI</li>
                      <li>Bank BPR KS</li>
                      <li>Bank OCBC NISP</li>
                      <li>Bpd DIY</li>
                      <li>Bank Panin</li>
                      <li>Bank CIMB Niaga</li>
                      <li>Bank BNI</li>
                      <li>Bank BCA</li>
                      <li>Bank BRI Syariah</li>
                      <li>Bank BRI Mayapada</li>
                      <li>Bank BRI Mega</li>
                      <li>Bank BTPN</li>
                      <li>BTN</li>
                    </ol>
                  </td>
                         
                </tr>
              </table>
          </div>
      </div> 
</body>

