@extends('layouts.front.master')
@section('content')

@foreach ($section as $lands)
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
        <div class="bg-section">
            <img src="{{asset('/')}}/assetfront/images/sliders/slide-bg/8.jpg" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                    <div class="title title-6 text-center">
                        <div class="title--heading">
                            <h1> @if(App::getLocale() == 'en')
                        {{$lands->name_en}}
                        @else
                        {{$lands->name_ar}}
                        @endif</h1>
                        </div>
                        <div class="clearfix"></div>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('massege.home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">  
                                 @if(App::getLocale() == 'en')
                        {{$lands->name_en}}
                        @else
                        {{$lands->name_ar}}
                        @endif</li>
                        </ol>
                    </div><!-- .title end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section><!-- #page-title end -->


    <!-- about  #1
    ============================================= -->
    <section id="about1" class="about about-1  pt-110 pb-50">
        <div class="container">
            <div class="row">
            @if($lands->image)
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="heading">
                        <!-- <p class="heading--subtitle">

                        </p> -->
                        <h2 class="heading--title">@if(App::getLocale() == 'en')
                        {{$lands->name_en}}
                        @else
                        {{$lands->name_ar}}
                        @endif</h2>
                    </div>
                    <div class="about--text">
                       @if(App::getLocale() == 'en')
                        {!! $lands->description_en !!}
                        @else
                        {!! $lands->description_ar !!}
                        @endif
                    </div>
                    <!-- <a href="#" class="btn btn--secondary btn--rounded mb-30-xs mb-30-sm">More About Us</a> -->
                </div>
                <!-- .col-lg-6 end -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about--img">
                        <img src="{{asset($lands->image)}}" alt="img" class="img-fluid">
                    </div>
                </div>
                <!-- .col-lg-6 end -->
                @else
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="heading">
                    <h2 class="heading--title">@if(App::getLocale() == 'en')
                        {{$lands->name_en}}
                        @else
                        {{$lands->name_ar}}
                        @endif</h2>
                    </div>
                    <div class="about--text">
                       @if(App::getLocale() == 'en')
                        {!! $lands->description_en !!}
                        @else
                        {!! $lands->description_ar !!}
                        @endif
                    </div>
                    <!-- <a href="#" class="btn btn--secondary btn--rounded mb-30-xs mb-30-sm">More About Us</a> -->
                </div>
              @endif
            </div>
        </div>
        <!-- .container end -->
    </section>
    <!-- #about1 end -->

@endforeach
@endsection