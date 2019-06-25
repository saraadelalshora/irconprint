
@extends('layouts.front.master')
@section('meta')
@if(app()->getLocale() == 'ar')
<title>{{$servicedetails->title_ar}} </title>


@else
<title>{{$servicedetails->title_en}} </title>

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
                            {{$servicedetails->title_ar}}
                            @else
                            {{$servicedetails->title_en}}
                            @endif</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('massege.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{url('services')}}">@lang('massege.services')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if(App::getLocale() == 'en')
                            {{$servicedetails->title_en}}
                            @else
                            {{$servicedetails->title_ar}}
                            @endif
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


    <!-- Services #2============================================= -->
    <section id="services-single" class="services services-single">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <!-- Categories
      ============================================= -->
                    <div class="widget widget-categories">
                        <div class="widget-content">
                            <ul class="list-unstyled">
                            <li class="active"><a href="{{url('services')}}">@lang('massege.All services')</a></li>
                                @if(isset($serviceslist))
                                @foreach($serviceslist as $list)
                                @if($servicedetails->id != $list->id)
                                <li>
                                       @if(App::getLocale() == 'en')
                                        <a href="{{route('service',$list->slogen_en)}}">{{$list->title_en}} </a>
                                         @else
                                         <a href="{{route('service',$list->slogen_ar)}}">{{$list->title_ar}} </a>
                                          @endif
                                </li>
                                @endif
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- Info ============================================= -->
                </div><!-- .col-lg-3 end -->
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-60">
                        <div class="feature-card">
                             <div class="feature-card-icon text-center">
                            @if($servicedetails->img)
                            <i class="{{$servicedetails->img}}"></i>
                            @else
                            <i class="icon-presentation"></i>
                            @endif
                            </div>
                            </div>
                            <!-- .chart-img end -->
                        </div>
                        <!-- .col-lg-12 end -->

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="services--text text-center">
                            @if(App::getLocale() == 'en')
                            {!! $servicedetails->description_en !!}
                            @else
                            {!! $servicedetails->description_ar !!}
                            @endif
                            </div>
                            <!-- .services-text end -->
                        </div>
                        <!-- .col-lg-12 end -->


                        <div class="col-sm-12 col-md-12 col-md-12">
                            <div class="services--text mb-25">
                                <h3> </h3>
                            </div>
                            <div class="accordion accordion-1 mb-60" id="accordion01">
                            @if(isset($servicedetails->tag_ar))
                               @foreach(explode(',',$servicedetails->tag_ar) as $tags_ar)
                               <div class="card">
                                    <div class="card-heading">
                                        <a class="card-link collapsed" data-toggle="collapse" data-parent="#accordion01" href="#collapse01-1">{{$tags_ar}}</a>
                                    </div>
                                    <div id="collapse01-1" class="collapse" data-parent="#accordion01">
                                        <div class="card-body">{{$servicedetails->tag_ar}}</div>
                                    </div>
                                </div>
                                
                           
                            @endforeach
                       
                        @elseif(isset($servicedetails->tag_en))
                       
                            @foreach(explode(',',$servicedetails->tag_en) as $tags_en)
                            
                            <div class="card">
                                    <div class="card-heading">
                                        <a class="card-link collapsed" data-toggle="collapse" data-parent="#accordion01" href="#collapse01-1">{{$tags_en}}</a>
                                    </div>
                                    <div id="collapse01-1" class="collapse" data-parent="#accordion01">
                                        <div class="card-body">{{$servicedetails->tag_en}}</div>
                                    </div>
                                </div>
                            
                            @endforeach
                             @endif
                        </div>
                     
                        <!-- .col-lg-12 end -->

                    </div>
                </div>
                <!-- .col-lg-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #services-single end -->
    @endsection