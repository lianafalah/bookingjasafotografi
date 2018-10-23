
@extends('member.template')

@section('main')

<h4 class="heading">Data Hasil Edit</h4>
     
            
             <div class="container">
             <div class="row">
          <div class="col-md-12">
            <section class="panel" >
              
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <td>ID Pesan</td>
                    <td> {{ $id_pesan}}</td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td> {{ $depes->status }}</td>
                  </tr>
                  <tr>
                    <td>Konfirmasi</td>
                    <td> {{ $depes->konfirmasi }}</td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td> {{ $depes->keterangan }}</td>
                  </tr>
                    <td>Gambar</td>
                    <?php $no = 0;?>
              @foreach($depe as $value)
              <?php $no++ ;?>
                    <td> Gambar {{$no}}<br/><a class="example-image-link" href="{{ asset('Local/storage/app/'.$value->filename)}}" data-lightbox="example-set" >
                <img width="auto" height="100%" src="{{ asset('Local/storage/app/'.$value->filename)}}" alt="" class="example-image"/ style="max-height:100px;max-width:100px;margin-top:10px;"></a>
              @endforeach
                </td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
        </div>
      
@endsection
