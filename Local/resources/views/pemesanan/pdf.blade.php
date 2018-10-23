
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
              <td width="450"><h2>Laporan Harian </h2></td>
              <td><img src="{{asset('Asset/agency/img/logo_copy.png')}}" alt="STAR" align="right" style="text-align: right;"></td>
            </tr>
          </table>
              @if (!empty($data))
          <table class="tg" border="0">
            <tr>
                  <th colspan="6" style="text-align: center;">Laporan Harian</th>
                </tr>
                <tr>               
                 <td class="tj">Id Pesan</td>
                    <td class="tj">Nama Paket</td>
                    <td class="tj">Harga</td>
                    <td class="tj">Tanggal Pesan</td>
                    <td class="tj">Tanggal Foto</td>
                    <td class="tj">Pukul</td>
                 
                </tr>
                  <?php foreach( $data as $pemesanan): ?>
                  <tr>
                     
                
                    <td class="ti">{{ $pemesanan->id_pesan }} </td>
                    <td class="ti">{{ $pemesanan->nama_paket }} </td>
                    <td class="ti">{{ $pemesanan->harga_paket }} </td>
                    <td class="ti">{{ $pemesanan->tanggal_pesan }} </td>
                    <td class="ti">{{ $pemesanan->tanggal_foto }} </td>
                    <td class="ti">{{ $pemesanan->pukul }} </td>
                    
                  </tr>
                  <?php endforeach ?>
                <
              </table>
              
              
              @else
              <p>tidak ada data pemesanan </p>
              @endif

        
</body>
