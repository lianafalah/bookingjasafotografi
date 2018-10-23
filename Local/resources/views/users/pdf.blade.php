
            <div class="row">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                Laporan USer
              </header>
              @if (!empty($user_list))
              <table class="table" id="user" border="1">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach( $user_list as $user): ?>
                  <tr>
                    <td>{{ $user->name }} </td>
                    <td>{{ $user->username }} </td>
                    <td>{{ $user->email }} </td>
                    <td>{{ $user->jabatan }} </td>
                    <td>{{ $user->no_telp }} </td>
                    <td>{{ $user->alamat }} </td>
                  
                  </tr>
                  <?php endforeach ?>              
                </tbody>
              </table>
               @else
              <p>tidak ada data user </p>
              @endif

            </section>
          </div>
          </div>
