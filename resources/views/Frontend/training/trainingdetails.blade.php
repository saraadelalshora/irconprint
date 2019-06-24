@extends('layouts.front.master')
@section('meta')
@if(app()->getLocale() == 'ar')
<title>{{$training->name_ar}} </title>
<meta name="keywords" content="{{$training->tag_ar}}">
@else
<title> {{$training->name_en}} </title>
<meta name="keywords" content="{{$training->tag_en}}">
@endif
@endsection
@section('content')

<!-- start content page -->
<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{asset('/')}}/assetfront/images/sliders/slide-bg/8.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1>@if(app()->getLocale() == 'ar')
                            {{$training->name_ar}}
                            @else
                            {{$training->name_en}}
                            @endif</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if(app()->getLocale() == 'ar')
                            {{$training->name_ar}}
                            @else
                            {{$training->name_en}}
                            @endif</li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->

<section id="services-single" class="services services-single">
        <div class="container">
            <div class="row">
                @if(isset($all_training))
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <!-- Categories
    ============================================= -->
                    <div class="widget widget-categories">
                        <div class="widget-content">
                            <ul class="list-unstyled">
                            @foreach($all_training as $related_train)
                            @if($related_train->id != $training->id)
                                <li>
                                @if(app()->getLocale() == 'ar')
                               <a href="{{route('training.name',$related_train->slogen_ar)}}"> {{$related_train->name_ar}} </a>
                            @else
                               <a href="{{route('training.name',$related_train->slogen_en)}}"> {{$related_train->name_en}} </a>
                            @endif
                          
                                </li>
                                @endif
                           @endforeach
                          
                                 
                            </ul>
                        </div>
                    </div>
               @endif
                    <!-- Info
    ============================================= -->
                </div><!-- .col-lg-3 end -->
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-60">
                            <div class="chart--img">
                                <!-- "public/".str_replace("small","larg",$manufact->img) -->
                                <img src="{{asset(str_replace('larg','small',$training->image))}}" alt="chart" class="img-fluid">
                            </div>
                            <!-- .chart-img end -->
                        </div>
                        <!-- .col-lg-12 end -->

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="services--text">
                                <h3>@if(app()->getLocale() == 'ar')
                            {{$training->name_ar}}
                            @else
                            {{$training->name_en}}
                            @endif</h3>
                               

                            </div>
                            <!-- .services-text end -->
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="services--text">
                                       @if(app()->getLocale() == 'ar')
                            {!! $training->description_ar !!}
                            @else
                            {!! $training->description_en !!}
                            @endif
                                    </div>
                                    <!-- .services-text end -->
                                </div>
                        </div>
                        <!-- .col-lg-12 end -->
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-45">
                            @if($training->video != null)
                                <div class="video--content text-center">
                                    <div class="bg-section">
                                        <img src="{{asset('/')}}/assetfront/assets/images/video/1.jpg" alt="Background" />
                                    </div>
                                    <div class="video--button">
                                        <div class="video-overlay">
                                            <div class="pos-vertical-center">
                                                <a class="popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                                                    <span class="btn--animation"></span>
                                                    <i class="fa fa-play"></i>
                                                 </a>
                                            </div>
                                            <!-- .video-player end -->
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- .video-content end -->
                            </div>
                           
                            <!-- .col-lg-12 end -->
                                <!-- .col-lg-12 end -->
                    </div>
                </div>
                <!-- .col-lg-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
@endsection