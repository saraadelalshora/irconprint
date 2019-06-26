<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    @yield('meta')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/bootstrap.min.css">
    <!-- bootstrap ar  -->
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/bootstrap-rtl.min.css">
    @endif
    <!-- <link rel="stylesheet" href="css/bootstrap-rtl.min.css"> -->
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/inc/carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/inc/carousel/owl.theme.default.css">
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/inc/carousel/owl.theme.green.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link
        href="http://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800%7CRoboto:300i,400,400i,500,500i,700"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/et-line.css">
    <!-- <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/external.css"> -->
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/style.css">
    <!-- style ar -->
    <!-- <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/style.css"> -->
    <!-- RS5.0 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assetfront/inc/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assetfront/inc/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/assetfront/inc/revolution/css/navigation.css">

    <!-- <link rel="stylesheet" href="css/style-en.css"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- start header   -->
    <header id="navbar-spy" class="header header-full">
        <div id="top-bar" class="contact-bar d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="top-bar-inner">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-3">
                                    <div class="navbar-header">
                                        <a class="logo" href="{{url('/')}}"> @if(app()->getLocale() == 'ar')
                                            @if(isset($setting->logo_img))
                                            <img src="{{asset($setting->logo_img)}}" alt="logo">
                                            @else
                                            <img src="{{asset('/')}}/assetfront/images/logo/logo-colored.png"
                                                alt="logo">
                                            @endif
                                            @else
                                            @if(isset($setting->log_img_en))
                                            <img src="{{asset($setting->log_img_en)}}" alt="logo">
                                            @else
                                            <img src="{{asset('/')}}/assetfront/images/logo/logo-colored.png"
                                                alt="logo">
                                            @endif
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <!-- .col-md-6 end -->
                                <div class="col-12 col-md-6 col-lg-9 top-bar-contact d-none d-lg-block">
                                    <div class="module-container">
                                        <div class="contact-box pull-left">
                                            <div class="contact-box-icon pull-left">
                                                <i class="icon-map-pin"></i>
                                            </div>
                                            <div class="contact-box-info">
                                                <p class="text-capitalize ">@lang('massege.address'):</p>
                                                @if(isset($setting->address)) <p class="font-heading"> {{ucwords($setting->address)}} </p> @endif
                                            </div>
                                        </div>

                                        <div class="contact-box pull-left">
                                            <div class="contact-box-icon pull-left">
                                                <i class="icon-document"></i>
                                            </div>
                                            <div class="contact-box-info">
                                                <p class="text-capitalize ">@lang('massege.email')</p>
                                                @if(isset($setting->email)) <p class="font-heading">{{$setting->email}}</p> @endif
                                            </div>
                                        </div>

                                        <div class="contact-box pull-left">
                                            <div class="contact-box-icon pull-left">
                                                <i class="icon-phone"></i>
                                            </div>
                                            <div class="contact-box-info">
                                                <p class="text-capitalize">@lang('massege.phone')</p>
                                              @if(isset($setting->phone))  <p class="text-capitalize font-heading">{{$setting->phone}}</p> @endif
                                            </div>
                                        </div>

                                        <!-- Module Social -->
                                        <div class="module module-social pull-left">
                                            @if(isset($social->fb)) <a href="{{'https://'.$social->fb}}"><i
                                                    class="fab fa-facebook-f"></i></a> @endif
                                            @if(isset($social->tw))<a href="{{'https://'.$social->tw}}"><i
                                                    class="fab fa-twitter"></i></a>@endif
                                            @if(isset($social->linkedin))<a href="{{'https://'.$social->linkedin}}"><i
                                                    class="fab fa-linkedin-in"></i></a>@endif
                                        </div><!-- .module-social end -->
                                    </div>
                                </div>
                                <!-- .col-md-6 end -->
                            </div>
                        </div>
                    </div>
                    <!-- .col-md-12 -->
                </div>
            </div>
        </div>
        <div class="container">
            <nav id="primary-menu" class="navbar navbar-expand-lg navbar-light bg-dark3">

                <a class="navbar-brand d-md-none d-xl-none" href="{{url('/')}}">
                    @if(app()->getLocale() == 'ar')
                    @if(isset($setting->logo_img))
                    <img class="logo logo-light" src="{{asset($setting->logo_img)}}" alt="Consultivo logo">
                    @else
                    <img class="logo logo-light" src="{{asset('/')}}/assetfront/images/logo/logo-colored.png"
                        alt="Consultivo logo">
                    @endif
                    @else
                    @if(isset($setting->log_img_en))
                    <img class="logo logo-light" src="{{asset($setting->log_img_en)}}" alt="logo">
                    @else
                    <img class="logo logo-light" src="{{asset('/')}}/assetfront/images/logo/logo-colored.png"
                        alt="logo">
                    @endif
                    @endif

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mr-auto">
                        <!-- Home Menu-->
                        <li class="has-dropdown active">
                            <a href="{{url('/')}}" class="dropdown-toggle menu-item">@lang('massege.home')</a>
                        </li>
                        <!-- li end -->

                        <!-- Pages Menu -->
                        <li class="has-dropdown">
                            <a href="{{route('About')}}" class="dropdown-toggle menu-item"
                                data-hover="pages">@lang('massege.About Us')</a>
                            <ul class="dropdown-menu">

                                <li>
                                    <a href="{{route('President')}}">@lang('massege.President`s word')</a>
                                </li>

                            </ul>
                        </li>
                        <!-- li end -->
                        <!-- Products Menu -->
                        <li class="has-dropdown">
                            <a href="{{route('products')}}" class="dropdown-toggle menu-item"
                                data-hover="pages">@lang('massege.Products')</a>
                            <ul class="dropdown-menu">
                                @if(isset($product_categories))
                                @foreach($product_categories as $pro_cat)

                                <li class="dropdown-submenu">
                                    @if(App::getLocale() == 'en')
                                    <a href="{{route('category.products',$pro_cat->slogen_en)}}"
                                        class="dropdown-toggle sub-item" data-hover="pages">{{$pro_cat->name_en}} </a>
                                    @else
                                    <a href="{{route('category.products',$pro_cat->slogen_ar)}}"
                                        class="dropdown-toggle sub-item" data-hover="pages">{{$pro_cat->name_ar}} </a>
                                    @endif
                                    @if($pro_cat->subcategories->isEmpty() != true)
                                    <ul class="dropdown-menu">

                                        @foreach($pro_cat->subcategories as $pro_sub_cat)
                                        <li class="has-dropdown">
                                            @if(App::getLocale() == 'en')
                                            <a href="{{route('Subcategory.products',$pro_sub_cat->slogen_en)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat->name_en}} </a>
                                            @else
                                            <a href="{{route('Subcategory.products',$pro_sub_cat->slogen_ar)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat->name_ar}} </a>
                                            @endif
                                            @if($pro_sub_cat->subtwocategories->isEmpty() != true)
                                            <ul class="dropdown-menu">
                                                @foreach($pro_sub_cat->subtwocategories as $pro_sub_cat_two)
                                                <li>
                                                    @if(App::getLocale() == 'en')
                                                    <a href="{{route('Subcategorytwo.products',$pro_sub_cat_two->slogen_en)}}"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages">{{$pro_sub_cat_two->name_en}} </a>
                                                    @else
                                                    <a href="{{route('Subcategorytwo.products',$pro_sub_cat_two->slogen_ar)}}"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages">{{$pro_sub_cat_two->name_ar}} </a>
                                                    @endif
                                                </li>
                                                @endforeach

                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach



                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                                @endif




                            </ul>
                        </li>
                        <!-- li end -->
                        <!-- Videos Menu -->
                        <li class="has-dropdown">
                            <a href="{{route('Video.name')}}" class="dropdown-toggle menu-item" data-hover="pages">@lang('massege.Videos')</a>
                            <ul class="dropdown-menu">
                                @if(isset($video_categories))
                                @foreach($video_categories as $pro_cat_video)

                                <li class="dropdown-submenu">
                                    @if(App::getLocale() == 'en')
                                    <a href="{{route('category.Videos',$pro_cat_video->slogen_en)}}"
                                        class="dropdown-toggle sub-item" data-hover="pages">{{$pro_cat_video->name_en}}
                                    </a>
                                    @else
                                    <a href="{{route('category.Videos',$pro_cat_video->slogen_ar)}}"
                                        class="dropdown-toggle sub-item" data-hover="pages">{{$pro_cat_video->name_ar}}
                                    </a>
                                    @endif
                                    @if($pro_cat_video->subcategories->isEmpty() != true)
                                    <ul class="dropdown-menu">

                                        @foreach($pro_cat_video->subcategories as $pro_sub_cat_video)
                                        <li class="has-dropdown">
                                            @if(App::getLocale() == 'en')
                                            <a href="{{route('Subcategory.Videos',$pro_sub_cat_video->slogen_en)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat_video->name_en}} </a>
                                            @else
                                            <a href="{{route('Subcategory.Videos',$pro_sub_cat_video->slogen_ar)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat_video->name_ar}} </a>
                                            @endif
                                            @if($pro_sub_cat_video->subtwocategories->isEmpty() != true)
                                            <ul class="dropdown-menu">
                                                @foreach($pro_sub_cat_video->subtwocategories as $pro_sub_cat_two_video)
                                                <li>
                                                    @if(App::getLocale() == 'en')
                                                    <a href="{{route('Subcategorytwo.Videos',$pro_sub_cat_two_video->slogen_en)}}"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages">{{$pro_sub_cat_two_video->name_en}} </a>
                                                    @else
                                                    <a href="{{route('Subcategorytwo.Videos',$pro_sub_cat_two_video->slogen_ar)}}"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages">{{$pro_sub_cat_two_video->name_ar}} </a>
                                                    @endif
                                                </li>
                                                @endforeach

                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach



                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                                @endif


                            </ul>
                        </li>
                        <!-- li end -->
                        <!-- Services Menu-->
                        <li class="has-dropdown">
                            <a href="{{url('services')}}"
                                class="dropdown-toggle menu-item">@lang('massege.services')</a>
                            <ul class="dropdown-menu">
                                @if(isset($services))
                                @foreach($services as $servicesss)
                                <li>
                                    @if(App::getLocale() == 'en')
                                    <a href="{{route('service',$servicesss->slogen_en)}}">{{$servicesss->title_en}} </a>
                                    @else
                                    <a href="{{route('service',$servicesss->slogen_ar)}}">{{$servicesss->title_ar}} </a>
                                    @endif
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        <!-- li end -->
                        <!-- Traning Menu-->
                        <li class="has-dropdown">
                            <a href="{{route('training')}}" class="dropdown-toggle menu-item">@lang('massege.Traning')</a>
                            <ul class="dropdown-menu">
                                @if(isset($training_categories))
                                @foreach($training_categories as $pro_cat_training)

                                <li class="dropdown-submenu">
                                    @if(App::getLocale() == 'en')
                                    <a href="{{route('category.trainings',$pro_cat_training->slogen_en)}}"
                                        class="dropdown-toggle sub-item"
                                        data-hover="pages">{{$pro_cat_training->name_en}} </a>
                                    @else
                                    <a href="{{route('category.trainings',$pro_cat_training->slogen_ar)}}"
                                        class="dropdown-toggle sub-item"
                                        data-hover="pages">{{$pro_cat_training->name_ar}} </a>
                                    @endif
                                    @if($pro_cat_training->subcategories->isEmpty() != true)
                                    <ul class="dropdown-menu">

                                        @foreach($pro_cat_training->subcategories as $pro_sub_cat_training)
                                        <li class="has-dropdown">
                                            @if(App::getLocale() == 'en')
                                            <a href="{{route('Subcategory.trainings',$pro_sub_cat_training->slogen_en)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat_training->name_en}} </a>
                                            @else
                                            <a href="{{route('Subcategory.trainings',$pro_sub_cat_training->slogen_ar)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat_training->name_ar}} </a>
                                            @endif
                                            @if($pro_sub_cat_training->subtwocategories->isEmpty() != true)
                                            <ul class="dropdown-menu">
                                                @foreach($pro_sub_cat_training->subtwocategories as
                                                $pro_sub_cat_two_training)
                                                <li>
                                                    @if(App::getLocale() == 'en')
                                                    <a href="{{route('Subcategorytwo.trainings',$pro_sub_cat_two_training->slogen_en)}}"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages">{{$pro_sub_cat_two_training->name_en}} </a>
                                                    @else
                                                    <a href="{{route('Subcategorytwo.trainings',$pro_sub_cat_two_training->slogen_ar)}}"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages">{{$pro_sub_cat_two_training->name_ar}} </a>
                                                    @endif
                                                </li>
                                                @endforeach

                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach



                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        <!-- li end -->

                        <!-- Blog Menu-->
                        @if(isset($eshop_page))
                        <li class="has-dropdown">

                            @if(App::getLocale() == 'en')
                            <a href="{{route('page',$eshop_page->slogen_en)}}">{{$eshop_page->title_en}} </a>
                            @else
                            <a href="{{route('page',$eshop_page->slogen_ar)}}">{{$eshop_page->title_ar}} </a>
                            @endif

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="category.html">consumables Prepress</a>
                                </li>
                                <li>
                                    <a href="category.html">consumables Press</a>
                                </li>
                                <li>
                                    <a href="category.html">Digital </a>
                                </li>
                                <li>
                                    <a href="category.html">consumables Post Press</a>
                                </li>
                                <li>
                                    <a href="category.html">Service Parts </a>
                                </li>


                            </ul>
                        </li>
                        @endif
                        <!-- li end -->

                        <!-- shop Menu -->
                        <li class="has-dropdown">
                            <a href="projects.html" class="dropdown-toggle menu-item"
                                data-hover="shop">@lang('massege.Projects')</a>
                        </li>
                        <!-- li end -->
                        <li class="has-dropdown">
                            <a href="security.html" class="dropdown-toggle menu-item"
                                data-hover="shop">@lang('massege.Security Printing') </a>
                            <ul class="dropdown-menu">
                                @if(isset($secure_page))
                                @foreach($secure_page as $secure)
                                <li>

                                    @if(App::getLocale() == 'en')
                                    <a href="{{route('page',$secure->slogen_en)}}">{{$secure->title_en}} </a>
                                    @else
                                    <a href="{{route('page',$secure->slogen_ar)}}">{{$secure->title_ar}} </a>
                                    @endif
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        <!-- li end -->

                        <!-- Elements Menu -->
                        <li class="has-dropdown mega-dropdown">
                            <a href="{{url('news')}}" class="dropdown-toggle menu-item">@lang('massege.News & Events')</a>

                            <!-- .mega-dropdown-menu end -->
                        </li>
                    </ul>
                    <div class="module-container">
                        <!-- Module Search -->
                        <div class="module module-search pull-left">
                            <div class="module-icon search-icon">
                                <i class="fas fa-search"></i>
                                <span class="title">@lang('massege.Search')</span>
                            </div>
                            <div class="module-content module-fullscreen module--search-box">
                                <div class="pos-vertical-center">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                                                <form class="form-search">
                                                    <input type="text" class="form-control" placeholder="Search...">
                                                </form><!-- .form-search end -->
                                            </div><!-- .col-md-8 end -->
                                        </div><!-- .row end -->
                                    </div><!-- .container end -->
                                </div>
                                <a class="module-cancel" href="#"><i class="fas fa-times"></i></a>
                            </div>
                        </div><!-- .module-search end -->

                        <!-- Module Consultation  -->
                        <div class="module module-consultation pull-left">
                            <a class="btn" href="{{url('contact-us')}}">@lang('massege.contact')</a>
                        </div>
                    </div>
                </div>
                <!-- /.navbar-collapse -->

            </nav>
        </div>
        <!-- /.container -->
    </header>
    <!-- end  header   -->
    <!-- Hero Section
====================================== -->
    @yield('content')

    <section id="featured3" class="featured featured-2 featured-3 featured-left bg-dark3 pt-0 pb-0">
        <div class="container-fluid pr-0 pl-0">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-content">
                    <div class="heading">
                        <h2 class="heading--title color-white">We Are Here To Ease<br>The Financial Obstacles!</h2>
                        <p class="heading--desc color-white"> </p>
                    </div>
                    @foreach($services as $footersevice)
                    <!-- Feature Card #1 -->
                    <div class="feature-card wow fadeInUp" data-wow-delay="100ms">
                        <div class="feature-card-icon ">
                            @if($footersevice->img)
                            <i class="{{$footersevice->img}}"></i>
                            @else
                            <i class="icon-presentation"></i>
                            @endif
                        </div>
                        <div class="feature-card-content ">
                            <h3 class="feature-card-title">
                                @if(App::getLocale() == 'ar')
                                {{$footersevice->title_ar}}
                                @else
                                {{$footersevice->title_en}}
                                @endif
                            </h3>
                            <p class="feature-card-desc">
                                @if(App::getLocale() == 'en')
                                {!! str_limit(strip_tags($footersevice->description_en), $limit = 80, $end = '...') !!}
                                @else
                                {!! str_limit(strip_tags($footersevice->description_ar) , $limit = 80, $end = '...') !!}
                                @endif
                            </p>
                        </div>
                    </div>
                    <!-- feature-card end -->
                    @endforeach
                </div>
                <!-- .col-lg-6 end -->
                <div class="col-sm-12 col-md-12 col-lg-6 pr-0">
                    <div class="banner--img">
                        <img src="{{asset('/')}}/assetfront/images/banners/1.jpg" alt="banner img">
                    </div>
                </div>
                <!-- .col-lg-6 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #featured3 end -->
    <!-- CTA #1
============================================= -->
    <section id="cta1" class="cta cta-1 bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <h3>@lang('massege.Doing the Right Thing, at the Right Time!')</h3>
                </div>
                <!-- .col-lg-9 -->
                <div class="col-sm-12 col-md-12 col-lg-3 text-right">
                    <a href="{{url('contact-us')}}" class="btn btn--white btn--bordered btn--rounded">@lang('massege.Get
                        Started')</a>
                </div>
                <!-- .col-lg-3 -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- #cta1 end -->
    <!-- start footer -->
    <footer id="footer" class="footer footer-1">
        <!-- Widget Section
        ============================================= -->
        <div class="footer-widget">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-12 col-md-6 col-lg-3 footer--widget widget-about">
                        <div class="widget-content">
                            <img class="footer-logo" src="{{asset('/')}}/assetfront/images/logo/logo-small.png"
                                alt="logo">
                            @if(isset($setting))
                            @if(App::getLocale() == 'ar')
                            <p>{{$setting->description_ar}}</p>
                            @else
                            <p>{{$setting->description_en}}</p>
                            @endif
                            @endif
                            <div class="social-icons">
                                @if(isset($social->fb)) <a href="{{'https://'.$social->fb}}" class="facebook"> <i
                                        class="fab fa-facebook-f"></i></a> @endif
                                @if(isset($social->tw))<a href="{{'https://'.$social->tw}}" class="twitter"><i
                                        class="fab fa-twitter"></i></a>@endif
                                @if(isset($social->linkedin))<a href="{{'https://'.$social->linkedin}}" class="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a>@endif
                                @if(isset($social->instegram))<a href="{{'https://'.$social->instegram}}" class="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a>@endif
                                @if(isset($social->youtube))<a href="{{'https://'.$social->youtube}}" class="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a>@endif
                                @if(isset($social->pinterest))<a href="{{'https://'.$social->pinterest}}" class="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a>@endif

                            </div>
                        </div>
                    </div><!-- .col-md-3 end -->
                    <div class="col-12 col-sm-4 col-md-6 col-lg-2 footer--widget widget-links">
                        <div class="widget-title">
                            <h5>@lang('massege.Company')</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li><a href="{{route('About')}}">@lang('massege.About Us')</a></li>
                                <li><a href="{{route('President')}}">@lang('massege.President`s word')</a></li>
                                <li><a href="{{url('contact-us')}}">@lang('massege.contact')</a></li>
                            </ul>
                        </div>
                    </div><!-- .col-md-2 end -->

                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 footer--widget widget-links widget-links-inline">
                        <div class="contact-box-icon pull-left">
                            <i class="icon-map-pin"></i>
                        </div>
                        <div class="contact-box-info">
                            <p class="text-capitalize ">@lang('massege.address'):</p>
                           @if(isset($setting->address)) <p class="font-heading"> {{ucwords($setting->address)}} </p>@endif
                        </div>
                    </div><!-- .col-md-4 end -->

                    <div class="col-12 col-md-6 col-lg-3 footer--widget widget-newsletter">

                        <div class="contact-box-info">
                            <p class="text-capitalize ">@lang('massege.email')</p>
                            @if(isset($setting->email))<p class="font-heading">{{$setting->email}}</p>@endif
                        </div>

                        <div class="contact-box-info">
                            <p class="text-capitalize">@lang('massege.phone')</p>
                            @if(isset($setting->phone))<p class="text-capitalize font-heading">{{$setting->phone}}</p>@endif
                        </div>
                    </div>
                    <!-- .col-md-3 end -->
                    <div class="clearfix"></div>
                </div>
            </div><!-- .container end -->
        </div><!-- .footer-widget end -->

        <!-- Copyrights
        ============================================= -->
        <div class="footer--bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-md-12 text-center footer--copyright">
                        <div class="copyright">
                            <span> Copyright © 2019 Irconprint , <a href="http://3hand.net">Web Design Company</a> <a
                                    href="http://3hand.net">3Hand</a> All rights
                                reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .row end -->
        </div><!-- .footer-copyright end -->
    </footer>


    <div id="back-to-top" class="backtop"><i class="fas fa-long-arrow-alt-up"></i></div>
    </div><!-- #wrapper end -->
    <!-- end footer -->
    <script src="{{asset('/')}}/assetfront/js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('/')}}/assetfront/js/popper.min.js"></script>
    <script src="{{asset('/')}}/assetfront/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}/assetfront/js/plugins.js"></script>
    <script src="{{asset('/')}}/assetfront/js/custom.js"></script>
    <!-- RS5.0 Core JS Files -->
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/extensions/revolution.extension.slideanims.min.js">
    </script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/extensions/revolution.extension.navigation.min.js">
    </script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="{{asset('/')}}/assetfront/inc/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <!-- RS Configration JS Files -->
    <script src="{{asset('/')}}/assetfront/js/rsconfig.js"></script>

</body>

</html>