@extends('layouts.front.master')
@section('content')


<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
        <div class="bg-section">
            <img src="{{asset('/')}}/assetfront/images/sliders/slide-bg/8.jpg" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                    <div class="title title-6 text-center">
                        <div class="title--heading">
                            <h1>@lang('massege.Projects')</h1>
                        </div>
                        <div class="clearfix"></div>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('massege.home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">  
                            @lang('massege.Projects')</li>
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
           
                            <div class="row">
                             @if($projects->isEmpty() != true)   
                            @foreach ($projects as $lands)
                                <!-- Case #1 -->
                                <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                                    <div class="case-item-container">
                                        <div class="case--img">
                                            <img src="{{asset($lands->image)}}" alt="case Item">
                                            <div class="case--hover">
                                                <div class="case--action">
                                                    <a href="#" title="case Item"></a>
                                                </div>
                                                <!-- .case-action end -->
                                            </div>
                                            <!-- .case-hover end -->
                                        </div>
                                        <!-- .case-img end -->
                                        <div class="case--content">
                                            <div class="case--cat">
                                                <a href="#" data-role="tagsinput">
                                                     @if(App::getLocale() == 'en')
                                                     {{$lands->tag_en}} 
                                                     @else 
                                                     {{$lands->tag_ar}} 
                                                     @endif
                                                    </a>
                                            </div>
                                            <div class="case--title">
                                                <h4><a href="case-study-single.html">@if(App::getLocale() == 'en')
                                                     {{$lands->name_en}} 
                                                     @else 
                                                     {{$lands->name_ar}} 
                                                     @endif</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- . case-item end -->
                                @endforeach
                                @else
                                <div class=" col-md-12 case-item filter-customer filter-tips">
                                <div class="text-center">   
                                     <h2 style="color:#830C0C;">{{trans('massege.notfoundproduct')}}</h2>
                                   </div>
                                </div>
                                @endif
                            </div>
                            <!-- .row end -->
                       
        </div>
        <!-- .container end -->
    </section>
    <!-- #case carousel end -->

@endsection