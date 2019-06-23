@extends('layouts.front.master')
@section('meta')
@if(app()->getLocale() == 'ar')
<title>{{$projects->name_ar}} </title>
<meta name="description" content="{{$projects->description_ar}}">
<meta name="keywords" content="{{$projects->tag_ar}}">

@else
<title>{{$projects->name_en}} </title>
<meta name="description" content="{{$projects->description_en}}">
<meta name="keywords" content="{{$projects->tag_en}}">

@endif
@endsection
@section('content')


<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{asset('/')}}/assetfront/images/sliders/slide-bg/8.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1>  @if(App::getLocale() == 'en')
                            {{$projects->name_ar}}
                            @else
                            {{$projects->name_en}}
                            @endif</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('massege.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{url('projects')}}">@lang('massege.Projects')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if(App::getLocale() == 'en')
                            {{$projects->name_en}}
                            @else
                            {{$projects->name_ar}}
                            @endif
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


<!-- case-study #2
============================================= -->
<section id="case-study-single" class="case-study case-study-single">
        <div class="container">
            <div class="row justify-content-center">
               
                <div class="col-sm-12 col-md-12 col-lg-9 ">
                    <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="chart--img">
                                            <img src="{{asset($projects->image)}}" alt="chart" class="img-fluid">
                                        </div>
                                   
                                    <!-- .chart-img end -->
                                </div>
                                <!-- .col-lg-12 end -->
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="case--study-text">
                                <h3> </h3>
                            @if(App::getLocale() == 'en')
                            {!! $projects->description_en !!}
                            @else
                            {!! $projects->description_ar !!}
                            @endif
                            </div>
                            <!-- .case-study-text end -->
                        </div>

                        <!-- .col-lg-12 end -->
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="accordion accordion-1 mb-50" id="accordion01">
                                <!-- Panel 01 -->
                                @if(isset($projects->tag_ar))
                               @foreach(explode(',',$projects->tag_ar) as $tags_ar)
                               <div class="card">
                                    <div class="card-heading">
                                        <a class="card-link collapsed" data-toggle="collapse" data-parent="#accordion01" href="#collapse01-1">{{$tags_ar}}</a>
                                    </div>
                                    <div id="collapse01-1" class="collapse" data-parent="#accordion01">
                                        <div class="card-body">{{$projects->tag_ar}}</div>
                                    </div>
                                </div>
                                
                           
                            @endforeach
                       
                        @elseif(isset($projects->tag_en))
                       
                            @foreach(explode(',',$projects->tag_en) as $tags_en)
                            
                            <div class="card">
                                    <div class="card-heading">
                                        <a class="card-link collapsed" data-toggle="collapse" data-parent="#accordion01" href="#collapse01-1">{{$tags_en}}</a>
                                    </div>
                                    <div id="collapse01-1" class="collapse" data-parent="#accordion01">
                                        <div class="card-body">{{$projects->tag_en}}</div>
                                    </div>
                                </div>
                            
                            @endforeach
                        </div>
                        @endif
                               
                              
                            </div>
                            <!-- End .Accordion-->
                        </div>
                        <!-- .col-lg-12 end -->
                       
                    </div>
                </div>
                <!-- .col-md-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #case-study-single end -->
@endsection