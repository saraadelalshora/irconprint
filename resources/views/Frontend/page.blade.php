@extends('layouts.front.master')
@section('content')

@foreach ($land as $lands)
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{asset('/')}}/assetfront/images/sliders/slide-bg/8.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1> @if(App::getLocale() == 'en')
                            {{$lands->title_en}}
                            @else
                            {{$lands->title_ar}}
                            @endif</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('massege.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if(App::getLocale() == 'en')
                            {{$lands->title_en}}
                            @else
                            {{$lands->title_ar}}
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
            @if($lands->img)
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="heading">
                    <!-- <p class="heading--subtitle">

                        </p> -->
                    <h2 class="heading--title">@if(App::getLocale() == 'en')
                        {{$lands->title_en}}
                        @else
                        {{$lands->title_ar}}
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
                    <img src="{{asset($lands->img)}}" alt="img" class="img-fluid">
                </div>
            </div>
            <!-- .col-lg-6 end -->
            @else
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="heading">
                    <h2 class="heading--title">@if(App::getLocale() == 'en')
                        {{$lands->title_en}}
                        @else
                        {{$lands->title_ar}}
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

@if (Request::is('about'))
<!-- Blog Grid
======================================= -->
@if($lands->sections->isEmpty() != true)

<section id="blog" class="blog blog-grid pb-60 bg-gray">
    <div class="container">
        <div class="row ">

        </div>
        <!-- .row end -->
        <div class="row">
            @foreach($lands->sections as $section)
            <!-- Blog Entry #1 -->
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="blog-entry">
                    <div class="entry--img">
                        <a href="{{route('section',$section->slogen_en)}}">
                            <img src="{{asset($section->image)}}" alt="entry image" />
                        </a>
                    </div>
                    <!-- .entry-img end -->
                    <div class="entry--content">
                        <div class="entry--title">
                            @if(App::getLocale() == 'en')
                            <h4><a href="{{route('section',$section->slogen_en)}}">
                                    {{$section->name_en}}
                                </a></h4>
                            @else
                            <h4><a href="{{route('section',$section->slogen_ar)}}">
                                    {{$section->name_ar}}
                                </a></h4>
                            @endif
                        </div>
                        <div class="entry--date">

                        </div>
                        <div class="entry--bio">
                            @if(App::getLocale() == 'en')
                            {!! str_limit(strip_tags($section->description_en), $limit = 100, $end = '...') !!}
                            @else
                            {!! str_limit(strip_tags($section->description_ar) , $limit = 100, $end = '...') !!}
                            @endif

                        </div>
                    <div class="entry--more">
                            @if(App::getLocale() == 'en')
                            <a href="{{route('section',$section->slogen_en)}}"><i
                                    class="fa fa-plus"></i>@lang('massege.Read More')</a>
                            @else
                            <a href="{{route('section',$section->slogen_ar)}}"><i
                                    class="fa fa-plus"></i>@lang('massege.Read More')</a>
                            @endif
                        </div>
                    </div>
                    <!-- .entry-content end -->
                </div>
                <!-- .blog-entry end -->
            </div>
            <!-- .col-md-4 end -->
            @endforeach
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #blog end -->


@endif
@endif
@endforeach
@endsection