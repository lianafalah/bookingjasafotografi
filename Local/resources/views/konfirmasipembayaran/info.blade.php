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


        
          <table>
            <tr>
              <td width="450"><h2>Bukti Pembayaran </h2></td>
              <td><img src="{{asset('Asset/agency/img/logo_copy.png')}}" alt="STAR" align="right" style="text-align: right;"></td>
            </tr>
          </table>
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
                  <td class="tj">DP</td>
               
                </tr>
                <tr>
                  <td class="ti">{{$paket->nama_paket}}</td>
                  <td class="ti">{{$paket->tipe}}</td>
                  <td class="ti">{{$paket->harga_paket}}</td>
                  <td class="ti">{{$konfirmasipembayaran->nominal}}</td>
              
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
                  <td class="ti">{{$add->id_pesan}}</td>
                  <td class="ti">{{$add->tanggal_foto}}</td>
                  <td class="ti">{{$add->pukul}}</td>
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
               
                <tr >
                  <td class="tf">
                    Batas Keterlambatan 10 menit dari jam yang sudah dijadwalkan
                    <br>
                    Tunjukan Form ini sebagai bukti telah melakukan Booking di Star Photo and Printting
                    <br>
                    Untuk pembatalan jadwal dapat menghubungi langsung Star Photo & Printing
                  </td>
                         
                </tr>
              </table>
          </div>
      </div>


</body>

