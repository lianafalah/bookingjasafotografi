@extends('pagepel.template')
@section('main')
<section id="testimonial" class="sections">
                <div class="container">
                    <div class="row">
                        <div class="heading">
                            <div class="title text-center arrow-left">
                                <img class="hidden-xs" src="asset/assets/images/left-arrow.png" alt="" />
                                <h4 class="">Testimonials </h4>
                            </div>
                        </div>
                    </div>            
                                        
                               <div class="col-md-8">
                                    <div id="testimonial-slider" class="owl-carousel" style="left: 150px;">
                                        @foreach($testi_list as $value)
                                        <div class="testimonial" style="margin: 0 15px">
                                            <div class="content">
                                                <p class="description">
                                                    {{ $value->isi }}
                                                </p>
                                            </div>
                                            <div class="testimonial-pic" style="width: 80px;height: 80px;border-radius: 50%;margin-left: 20px;">
                                                <img src="{{asset('Asset/agency/img/slider/images.png')}}" alt="">
                                            </div>
                                            <div class="testimonial-review">
                                                <h3 class="testimonial-title">{{ $value->nama }}</h3>
                                                <div class="grey-text">
                                                  {{ $value->email }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                    </div>
                                     
                                </div>
                </div>
                   
 </section>
</div>
@stop 