
<body>
  <style type="text/css">
    .pemberitahuan{
    font-size: 15px;
margin-bottom: 10px;
}
   .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;overflow:hidden;border-width:0px;word-break:normal;border-color:#fff;color:#333;background-color:#fff;width: 50px;text-align: center;}
   .tg .tf {font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#333;background-color: #fcf7f7;width: 50px;text-align: left;}
 .tg{border-collapse:collapse;border-spacing:0;border-color:#fff;width: 100%; }
  .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#fff;color:#333;background-color:#e3e3e5;text-align: center;}
  .tg .tj{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#fff;color:#333;background-color: #f0f0f0;text-align: center;}
  .tg .ti{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#fff;color:#333;background-color: #fcf7f7;text-align: center;}
  .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
  
 
  </style>


        
          <div class="col-lg-12" style="text-align: right;">
            <img src="{{asset('Asset/agency/img/logo_copy.png')}}" alt="STAR ">

          </div>
          <div class="col-lg-12" style="text-align: left;">
    
              <div style="text-align: center;" class="tg-rv4w">
              <div>Untuk Informasi Pembayaran atau Informasi lainya bisa hubungi Call Center Star</div>
              <div>Terimakasi atas pemesanan Anda melalui Website Star Photo & Printing </div>
         
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
                </tr>
                <tr>
                  <td class="ti">{{$pemesanan->nama_paket}}</td>
                  <td class="ti">{{$tipe}}</td>
                  <td class="ti">{{$pemesanan->harga}}</td>
                  <td class="ti">{{$dp}}</td>
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
                  <td class="tf">{{$pelanggan->identitas}}</td>
                            
                </tr>
                <tr>
                      <td class="tf">{{$pelanggan->nama}}</td>
                  
                </tr>
                <tr>
                  <td class="tf">{{$pelanggan->alamat}}</td>
                </tr>
                <tr>
                  <td class="tf">{{$pelanggan->no_telp}}</td>
                </tr>
              </table>
              <br>
              <table class="tg" border="0">
                <tr>
                  <th >Informasi</th>
                </tr>
               
                <tr >
                  <td class="tf">
                    Batas Keterlambatan 10 menit dari jam yang sudah dijadwalkan
                    <br>
                    Tunjukan Form ini sebagai bukti telah melakukan Booking di Star Photo and Printting
                  </td>
                         
                </tr>
              </table>
          </div>
      </div>


</body>

