@extends('layouts.front.master')
@section('meta')
<title>Ircon</title>
<meta name="description" content="{{$setting->meta_description_ar}}">
<meta name="keywords" content="{{$setting->meta_tags}}">

<meta name="author" content="{{$setting->meta_title}}">
@endsection
@section('content')
<!-- Hero Section
====================================== -->
<section id="slider" class="slider slide-overlay-black">
    <!-- START REVOLUTION SLIDER 5.0 -->
    <div class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>
                <!-- slide 1    -->
                @foreach($sliders as $slide)
                @if($i==1)
                <li data-transition="zoomout" data-slotamount="default" data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut" data-masterspeed="2000">
                    @elseif($i==2)
                <li data-transition="fadethroughdark" data-slotamount="default" data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut" data-masterspeed="2000">
                    @elseif($i==3)
                <li data-transition="slidingoverlaydown" data-slotamount="default" data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut" data-masterspeed="2000">
                    @else
                <li data-transition="fadethroughdark" data-slotamount="default" data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut" data-masterspeed="2000">
                    @endif

                    <img src="{{asset($slide->img)}}" alt="Slide Background Image" width="1920" height="1280">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption" data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['-45','-45','-20','0']" data-fontsize="['60', '50', '40', '30']"
                        data-lineheight="['60','60','60','60']" data-width="none" data-height="none"
                        data-transform_idle="o:1;"
                        data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-splitin="none" data-responsive_offset="on">
                        <div class="slide--headline text-center">
                            @if(App::getLocale() == 'en')
                            {!! $slide->title_en !!}
                            @else
                            {!! $slide->title_ar !!}
                            @endif

                        </div>
                    </div>

                    <!-- LAYER NR. 2 -->

                    <div class="tp-caption" data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['60','60','60','50']" data-fontsize="['16', '16', '16', '12']"
                        data-lineheight="['25','25','25','25']" data-width="none" data-height="none"
                        data-frames='[{"delay":1250,"speed":1500,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        @if($slide->short_desc_ar)
                        <div class="slide--bio text-center">
                            @if(App::getLocale() == 'ar')
                            {{$slide->short_desc_ar}}
                            @else
                            {{$slide->short_desc_en}}
                            @endif
                        </div>
                        @else
                        <div class="slide--bio text-center">
                            @if(App::getLocale() == 'ar')
                            {{strip_tags($slide->description_ar)}}
                            @else
                            {{strip_tags($slide->description_en)}}
                            @endif
                        </div>
                        @endif
                    </div>

                    <!-- LAYER NR. 3 -->
                    @if($slide->link)
                    <div class="tp-caption" data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['135','135','150','170']" data-width="none" data-height="none"
                        data-whitespace="nowrap"
                        data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                        data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <div class="slide-action">

                            <a class="btn btn--gradient btn--rounded" href="{{$slide->link}}">Invest Now!</a>

                        </div>
                    </div>
                    @endif
                </li>

                @php
                if($i < 4){ $i++; }else{ $i=1; } @endphp @endforeach </ul> </div> <!-- END REVOLUTION SLIDER -->
        </div>
        <!-- END OF SLIDER WRAPPER -->
</section>
<!-- #hero end -->
<!-- Featured #1
============================================= -->
@if(isset($services))
<section id="featured1" class="featured featured-1 pt-100">
    <div class="container">
        <div class="row">
            @foreach($services as $service)
            <!-- Feature Card #1 -->
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="feature-card text-center">
                    <div class="feature-card-icon ">
                        @if($service->img)
                        <i class="{{$service->img}}"></i>
                        @else
                        <i class="icon-presentation"></i>
                        @endif
                    </div>
                    <div class="feature-card-content text-center">
                        <h3 class="feature-card-title">
                            @if(App::getLocale() == 'ar')
                            <a href="{{route('service',$service->slogen_en)}}"> {{$service->title_ar}} </a>
                            @else
                            <a href="{{route('service',$service->slogen_ar)}}">{{$service->title_en}}</a>
                            @endif
                        </h3>
                        <p class="feature-card-desc">
                            @if(App::getLocale() == 'en')
                            {!! str_limit(strip_tags($service->description_en), $limit = 80, $end = '...') !!}
                            @else
                            {!! str_limit(strip_tags($service->description_ar) , $limit = 80, $end = '...') !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <!-- .col-lg-3 end -->
            @endforeach
        </div>
        <!-- .row end -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                <a href="{{url('services')}}" class="btn btn--gradient btn--rounded">@lang('massege.All Services')</a>
            </div>
            <!-- .col-lg-12 end {{--route('service',$servicesss->slogen_en)--}}-->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #featured1 end -->
@endif


<!-- about  #1
    ============================================= -->
<section id="about1" class="about about-1 bg-gray pt-110 pb-50">
    <div class="container">
        @if(isset($about))
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="heading">
                    <p class="heading--subtitle">@lang('massege.All About Us')</p>
                    <h2 class="heading--title">
                        @if(App::getLocale() == 'en')
                        {!! $about->title_en !!}
                        @else
                        {!! $about->title_ar !!}
                        @endif
                    </h2>
                </div>
                <div class="about--text">
                    @if(App::getLocale() == 'en')
                    {!! str_limit(strip_tags($about->description_en), $limit = 250, $end = '...') !!}
                    @else
                    {!! str_limit(strip_tags($about->description_ar) , $limit = 250, $end = '...') !!}
                    @endif
                </div>
                <a href="#" class="btn btn--secondary btn--rounded mb-30-xs mb-30-sm">More About Us</a>
            </div>
            <!-- .col-lg-6 end -->
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="about--img">
                    <img src="{{asset($about->img)}}" alt="img" class="img-fluid">
                </div>
            </div>
            <!-- .col-lg-6 end -->
        </div>
        @endif
        <!-- .row end -->
        <div class="counter counter-1">
            <div class="row">
                <!-- count #1 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="count-box text-center">
                        <div class="counting">{{$videocount}}</div>
                        <div class="count-title">@lang('massege.Videos')</div>
                    </div>
                </div>
                <!-- .col-md-3 end -->
                <!-- count #2 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="count-box text-center">
                        <div class="counting">{{$trainingcount}}</div>
                        <div class="count-title">@lang('massege.Training')</div>
                    </div>
                </div>
                <!-- .col-md-3 end -->
                <!-- count #3 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="count-box text-center">
                        <div class="counting">{{$productcount}}</div>
                        <div class="count-title">@lang('massege.Products')</div>
                    </div>
                </div>
                <!-- .col-md-3 end -->
                <!-- count #4 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="count-box text-center">
                        <div class="counting">{{$projectscount}}</div>
                        <div class="count-title">@lang('massege.Projects')</div>
                    </div>
                </div>
                <!-- .col-md-3 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .counter end -->
    </div>
    <!-- .container end -->
</section>
<!-- #about1 end -->

<!-- video  #2
============================================= -->
<section id="video2" class="video-2 bg-overlay bg-overlay-dark2 text-center pb-0">
    <div class="bg-section"><img src="{{asset('/')}}/assetfront/images/background/4.jpg" alt="background"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1">
                <div class="heading">
                    <p class="heading--subtitle">All About Us</p>
                    <h2 class="heading--title color-white mb-0">Internal Accounting, Sales Data & Market Economic
                        Indicators</h2>
                </div>
            </div>
            <!-- .col-lg-10 end -->
        </div>
        <!-- .row end -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="video--content text-center">
                    <div class="bg-section">
                        <img src="{{asset('/')}}/assetfront/images/video/2.jpg" alt="Background" />
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
                <!-- .video-content end -->
            </div>
            <!-- .col-lg-12 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
    <div class="section-divider"></div>
</section>
<!-- #video2 end -->
<!-- gallery 3 Column
============================================= -->
<section id="gallery" class="gallery gallery-standard gallery-3col bg-white">
    <div class="container">
        <div class="row flipInX" data-wow-delay="100ms">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading heading-2 mb-30 text--center">
                    <p class="heading--subtitle">@lang('massege.Our Products')</p>
                    <h2 class="heading--title">@lang('massege.Products')</h2>
                    <p class="heading--desc mb-0">We monitor the spectrum of available business investment and alert
                        our users to market moving events as and when it happens.</p>
                </div>
            </div>
            <!-- .col-lg-6 end -->
        </div>
        <div class="row">
            <!-- gallery Filter
                ============================================= -->
            <div class="col-12 col-md-12 col-md-12 gallery-filter">
                <ul class="list-inline mb-0">
                    <li><a class="active-filter" href="#" data-filter="*">All</a></li>
                    @foreach($categories as $catefilter)

                    <li><a href="#" data-filter=".{{str_replace(' ', '', $catefilter->name_en)}}">
                            @if(App::getLocale() == 'en')
                            {!! $catefilter->name_en !!}
                            @else
                            {!! $catefilter->name_ar !!}
                            @endif
                        </a></li>

                    @endforeach
                </ul>
            </div>
            <!-- .gallery-filter end -->
        </div>
        <div id="gallery-all" class="row">

            @foreach($product as $pro_cat )
            <!-- gallery #1 -->
            <div class="col-12 col-md-4 col-lg-3 gallery-item {{str_replace(' ', '', $pro_cat->category->name_en)}}">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{asset($pro_cat->images->first()->img)}}" alt="Product" />
                        <div class="product--action">

                        </div>
                    </div><!-- .product-img end -->
                    <div class="product--content">
                        <div class="product--title">
                            <h3>
                                @if(app()->getLocale() == 'ar')
                                <a href="{{route('product.name',$pro_cat->slogen_ar)}}"> {{$pro_cat->name_ar}} </a>
                                @else
                                <a href="{{route('product.name',$pro_cat->slogen_en)}}"> {{$pro_cat->name_en}} </a>
                                @endif
                            </h3>
                        </div><!-- .product-title end -->

                    </div><!-- .product-bio end -->
                </div><!-- .product end -->
            </div><!-- . gallery-item end -->

            @endforeach

            <!-- .row end -->
            <!-- <div class="row">
                <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                  <ul class="pagination mt-20">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li>
                      <a href="#" aria-label="Next">
                          <span aria-hidden="true"><i class="fa fa-long-arrow-alt-right"></i></span>
                      </a>
                    </li>
                  </ul>
                </div>
            </div> -->
            <!-- .row end -->
        </div><!-- .container end -->
</section><!-- #gallery end -->

<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
        <div class="row flipInX" data-wow-delay="100ms">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading heading-2 mb-30 text--center">
                    <p class="heading--subtitle">Our Projects</p>
                    <h2 class="heading--title">@lang('massege.Projects')</h2>
                    <p class="heading--desc mb-0">We monitor the spectrum of available business investment and alert
                        our users to market moving events as and when it happens.</p>
                </div>
            </div>
            <!-- .col-lg-6 end -->
        </div>
        <!-- .row end -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="carousel owl-carousel carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true"
                    data-nav="false" data-dots="true" data-space="0" data-loop="true" data-speed="800">
                    @if(isset($projects))
                            <!-- Case #1 -->
                 @foreach($projects as $projecthome)
                   @if($x < 3)
                    <div class="case-carousel-grid">
                        <div class="row">
                         
                            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                                <div class="case-item-container">
                                    <div class="case--img">
                                        <img src="{{asset($projecthome->image)}}" alt="case Item">
                                        <div class="case--hover">
                                            <div class="case--action">
                                                @if(App::getLocale() == 'en')
                                                <a href="{{route('Project',$projecthome->slogen_en)}}"></a>
                                                @else
                                                <a href="{{route('Project',$projecthome->slogen_ar)}}"></a>
                                                @endif</h4>

                                            </div>
                                            <!-- .case-action end -->
                                        </div>
                                        <!-- .case-hover end -->
                                    </div>
                                    <!-- .case-img end -->
                                    <div class="case--content">
                                        @if(isset($projecthome->tag_ar))
                                        <div class="case--cat">
                                            @foreach(explode(',',$projecthome->tag_ar) as $tags_ar)
                                            <a href="#">
                                                {{$tags_ar}}
                                            </a>
                                            @endforeach
                                        </div>
                                        @elseif(isset($projecthome->tag_en))
                                        <div class="case--cat">
                                            @foreach(explode(',',$projecthome->tag_en) as $tags_en)
                                            <a href="#">
                                                {{$tags_en}}
                                            </a>
                                            @endforeach
                                        </div>
                                        @endif
                                        <div class="case--title">
                                            <h4> @if(App::getLocale() == 'en')
                                                <a
                                                    href="{{route('Project',$projecthome->slogen_en)}}">{{$projecthome->name_en}}</a>
                                                @else
                                                <a href="{{route('Project',$projecthome->slogen_ar)}}">
                                                    {{$projecthome->name_ar}}</a>
                                                @endif</h4>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                   @else
                    <div class="case-carousel-grid">
                        <div class="row">
                          
                        
                            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                                <div class="case-item-container">
                                    <div class="case--img">
                                        <img src="{{asset($projecthome->image)}}" alt="case Item">
                                        <div class="case--hover">
                                            <div class="case--action">
                                                @if(App::getLocale() == 'en')
                                                <a href="{{route('Project',$projecthome->slogen_en)}}"></a>
                                                @else
                                                <a href="{{route('Project',$projecthome->slogen_ar)}}"></a>
                                                @endif</h4>

                                            </div>
                                            <!-- .case-action end -->
                                        </div>
                                        <!-- .case-hover end -->
                                    </div>
                                    <!-- .case-img end -->
                                    <div class="case--content">
                                        @if(isset($projecthome->tag_ar))
                                        <div class="case--cat">
                                            @foreach(explode(',',$projecthome->tag_ar) as $tags_ar)
                                            <a href="#">
                                                {{$tags_ar}}
                                            </a>
                                            @endforeach
                                        </div>
                                        @elseif(isset($projecthome->tag_en))
                                        <div class="case--cat">
                                            @foreach(explode(',',$projecthome->tag_en) as $tags_en)
                                            <a href="#">
                                                {{$tags_en}}
                                            </a>
                                            @endforeach
                                        </div>
                                        @endif
                                        <div class="case--title">
                                            <h4> @if(App::getLocale() == 'en')
                                                <a
                                                    href="{{route('Project',$projecthome->slogen_en)}}">{{$projecthome->name_en}}</a>
                                                @else
                                                <a href="{{route('Project',$projecthome->slogen_ar)}}">
                                                    {{$projecthome->name_ar}}</a>
                                                @endif</h4>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    @endif
                    @php
                    $x++;
                    @endphp
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #case carousel end -->

<!-- start brand -->
<section class="brand p-t-30">
    <div class="container">

        <div class="owl-carousel owl-theme owl-brand p-30">
            @foreach($brands as $brand)
            <div class="item">
                <a href="#">
                    <img src="{{asset($brand->img)}}" class="img-responsive">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end brand -->
@endsection