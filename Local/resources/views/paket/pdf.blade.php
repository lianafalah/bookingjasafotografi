

            <div class="row">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                <h3 class="page-header"><i class="fa fa-table"></i>Laporan Daftar Paket</h3>
              </header>

              @if (!empty($paket_list))
              <table class="table" id="paket" border="1">
                <thead>
                  <tr>
                    <th>Id Paket</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>DP</th>
                    <th>Tipe</th>
                    <th>Foto Studio</th>
                    <th style="width: 250px;">Keterangan</th>
                   
                  </tr>
                </thead>
                <tbody>

                  <?php foreach( $paket_list as $paket): ?>
                  <tr>
                    <td>{{ $paket->id_paket }} </td>
                    <td>{{ $paket->nama_paket }} </td>
                    <td>{{ $paket->harga_paket }} </td>
                    <td>{{ $paket->dp }} </td>
                    <td>{{ $paket->tipe }} </td>
                    <td>{{ $paket->foto_studio }} </td>
                    <td>{{ $paket->keterangan }} </td>
                    
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>                         

              @else
              <p>tidak ada data paket </p>
              @endif
        </section>
        </div></div>
        
 

