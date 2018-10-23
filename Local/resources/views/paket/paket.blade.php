@extends('pagepel.template')
@section('main')

						<div class="container">
							<div class="row text-center clearfix">
								<div class="col-sm-8 col-sm-offset-2">
									<h2 class="title-one">Paket {{ $tipe }} </h2>
								</div>
							</div>

							<div class="row">
								@foreach($paket_list as $value)
								<div class="col-sm-4">
									<div class="single-blog">
										<h2 style="font-size: 16px;">{{ $value->nama_paket }}</h2>
										<div style="height: 200px;">
											<img width="auto" height="100%" src="{{ asset('upload/Paket/'.$value->gambar)}}" alt="" />
										</div>
										
										
										<div class="blog-content" style="height: 220px;">
											<p>Harga : {{ $value->harga_paket }}</p>
											<p>Dp : {{ $value->dp }}</p>
											<p>Keterangan : {{ $value->keterangan }}</p>
										</div>
										<div style="text-align: center;">
										<a href="{{ route ('pilih_tanggal.pilih_tanggal',$value->id_paket) }}" class="btn btn-primary" data-toggle="modal" >Order</a>
										</div>
									</div>
																
								</div>
								@endforeach
							</div>
						</div>		
					
@stop
