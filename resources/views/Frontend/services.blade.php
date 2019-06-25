@extends('layouts.front.master')
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
                        <h1>@lang('massege.services')</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('massege.home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @lang('massege.services')</li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


<!-- Featured #1
============================================= -->
<section id="featured1" class="featured featured-1 pb-60 text-center">
        <div class="container">
            <div class="row">
                @if(isset($services))
                @foreach($services as $service1)
                <!-- Feature Card #1 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                        @if($service1->img)
                            <i class="{{$service1->img}}"></i>
                            @else
                            <i class="icon-presentation"></i>
                            @endif
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">
                                 @if(App::getLocale() == 'en')
                            <a href="{{route('service',$service1->slogen_en)}}">
                                    {{$service1->title_en}}
                                </a>
                            @else
                            <a href="{{route('service',$service1->slogen_ar)}}">
                                    {{$service1->title_ar}}
                                </a>
                            @endif
                            </h3>
                           @if(App::getLocale() == 'en')
                            {!! str_limit(strip_tags($service1->description_en), $limit = 100, $end = '...') !!}
                            @else
                            {!! str_limit(strip_tags($service1->description_ar) , $limit = 100, $end = '...') !!}
                            @endif
                        </div>
                    </div>
                </div>
                <!-- .col-lg-4 end -->
                @php $i++ @endphp
                @endforeach
                @else
                <div class=" col-md-12 case-item filter-customer filter-tips">
                <div class="text-center">
                    <h2 style="color:#830C0C;">{{trans('massege.notfoundservice')}}</h2>
                </div>
                </div>
                @endif
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #featured1 end -->
    @endsection