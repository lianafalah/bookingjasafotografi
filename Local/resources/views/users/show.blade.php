@extends('admin.template')
@section('content')

<div class="col-lg-12">
  <h3 class="page-header">KARYAWAN</h3>
    <ol class="breadcrumb">
      <li><a href="{{ url('index_user') }}"> Daftar Karyawan</a></li>
      <li class="active"> Detail Karyawan</li>
    </ol>
</div>

<section class="content">
<div class="row">
<div class="col-xs-9">
<div class="box">
  
  <header class="panel-heading">
    <p>Data Diri Karyawan</p>
  </header>
  
 <table class="table" style="border:0px">
  <tbody>
    <tr> </tr>
    <tr>
      <td>
        <tr>
          <td rowspan="6" width="200" > <img src="{{ asset('upload/gambar/'.$user->gambar )}}" 
            id="showfoto" width="200px" height="220px" >        
          </td>
          <td style="width:150px">Nama
          </td>
          <td style="width:30px">:
          </td>
          <td>{{ $user->name }}
          </td>
        </tr>
        <tr>
          <td>Id P etugas
          </td>
          <td>:
          </td>
          <td>{{ $user->id_petugas }}
          </td>
        </tr>
        <tr>
          <td>Email
          </td>
          <td>:
          </td>
          <td>{{ $user->email }}
          </td>
        </tr>
        <tr>
          <td>Alamat
          </td>
          <td>:
          </td>
          <td>{{ $user->alamat }}
          </td>
        </tr>
        <tr>
          <td>No Telp.
          </td>
          <td>:
          </td>
          <td>{{ $user->no_telp }}
          </td>
        </tr>
        <tr>
          <td>Jabatan
          </td>
          <td>:
          </td>
          <td>{{ $user->jabatan }}
          </td>
        </tr>
        
      </td>
      
    </tr>
  </tbody>
</table>

</div>
</div>
</div>
</section>

@stop