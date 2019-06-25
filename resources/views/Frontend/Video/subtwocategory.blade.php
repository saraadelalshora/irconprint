
@extends('layouts.front.master')
@section('meta')
@if(isset($category))
@if(app()->getLocale() == 'ar')

<title>{{$category->name_ar}} </title>
<meta name="keywords" content="{{$category->tag_ar}}">
@else
<title>{{$category->name_en}} </title>
<meta name="keywords" content="{{$category->tag_en}}">
@endif
@endsection
@section('content')


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
                            {{$category->name_ar}}
                            @else
                            {{$category->name_en}}
                            @endif</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">@lang('massege.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if(app()->getLocale() == 'ar')
                                {{$category->name_ar}}
                            @else
                                {{$category->name_en}}
                            @endif</li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
        <div class="title--heading">
            <h1>@lang('massege.Video')</h1>
        </div>
        <div class="row">
            <!-- Case #1 -->
            @if($category->videos->isEmpty() != true)
            @foreach($category->videos()->paginate(15) as $categoryvideo)
            <div class="col-sm-6 col-md-4 col-lg-4 mb-45">
                <div class="video--content text-center "
                    style="background-image: url({{asset('/')}}/assetfront/images/video/1.jpg);">

                    <div class="video--button">
                        <div class="video-overlay">
                            <div class="pos-vertical-center">
                                <a class="popup-video" >
                                    
                                            <span class="btn--animation"></span>
                                            <i class="fa fa-play"></i>
                                         </a>
                               
                                <video  controls>
                                    <source src="{{asset($categoryvideo->image)}}" >
                                   
                                </video>
                              

                            </div>
                            <!-- .video-player end -->
                        </div>
                    </div>
                </div>
                <!-- .video-content end -->
            </div>
            <!-- . case-item end -->
            @endforeach

            <div class="row">
                <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                    <ul class="pagination mt-20">
                        {!! $category->videos()->paginate(15)->appends(request()->except('page'))->links() !!}
                    </ul>
                </div>
                <!-- .col-md-12 end -->
            </div>
            @else
            <div class=" col-md-12 case-item filter-customer filter-tips">
                <div class="text-center">
                    <h2 style="color:#830C0C;">{{trans('massege.notfoundVideo')}}</h2>
                </div>
            </div>
            @endif
        </div>
        <!-- .row end -->


    </div>
    <!-- .container end -->
</section>
<!-- #case carousel end -->
@endif

@endsection