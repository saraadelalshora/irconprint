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
                                                <p class="font-heading"> {{ucwords($setting->address)}} </p>
                                            </div>
                                        </div>

                                        <div class="contact-box pull-left">
                                            <div class="contact-box-icon pull-left">
                                                <i class="icon-document"></i>
                                            </div>
                                            <div class="contact-box-info">
                                                <p class="text-capitalize ">@lang('massege.email')</p>
                                                <p class="font-heading">{{$setting->email}}</p>
                                            </div>
                                        </div>

                                        <div class="contact-box pull-left">
                                            <div class="contact-box-icon pull-left">
                                                <i class="icon-phone"></i>
                                            </div>
                                            <div class="contact-box-info">
                                                <p class="text-capitalize">@lang('massege.phone')</p>
                                                <p class="text-capitalize font-heading">{{$setting->phone}}</p>
                                            </div>
                                        </div>

                                        <!-- Module Social -->
                                        <div class="module module-social pull-left">
                                            <!--  @if($social->fb) href="{{"https://".$social->fb}}"@else href="#" @endif target="_blank" -->
                                            @if($social->fb) <a href="{{'https://'.$social->fb}}"><i
                                                    class="fab fa-facebook-f"></i></a> @endif
                                            @if($social->tw)<a href="{{'https://'.$social->tw}}"><i
                                                    class="fab fa-twitter"></i></a>@endif
                                            @if($social->linkedin)<a href="{{'https://'.$social->linkedin}}"><i
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
                            <a href="main-category.html" class="dropdown-toggle menu-item"
                                data-hover="pages">@lang('massege.Products')</a>
                            <ul class="dropdown-menu">
                                @if(isset($product_categories))
                                @foreach($product_categories as $pro_cat)

                                <li class="dropdown-submenu">
                                    @if(App::getLocale() == 'en')
                                    <a href="{{route('category.products',$pro_cat->id)}}"
                                        class="dropdown-toggle sub-item" data-hover="pages">{{$pro_cat->name_en}} </a>
                                    @else
                                    <a href="{{route('category.products',$pro_cat->id)}}"
                                        class="dropdown-toggle sub-item" data-hover="pages">{{$pro_cat->name_ar}} </a>
                                    @endif
                                    @if($pro_cat->subcategories->isEmpty() != true)
                                    <ul class="dropdown-menu">
                                  
                                     @foreach($pro_cat->subcategories as $pro_sub_cat)
                                        <li class="has-dropdown">
                                            @if(App::getLocale() == 'en')
                                            <a href="{{route('category.products',$pro_sub_cat->id)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat->name_en}} </a>
                                            @else
                                            <a href="{{route('category.products',$pro_sub_cat->id)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat->name_ar}} </a>
                                            @endif
                                            @if($pro_sub_cat->subtwocategories->isEmpty() != true)
                                            <ul class="dropdown-menu">
                                                @foreach($pro_sub_cat->subtwocategories as $pro_sub_cat_two)
                                                <li>
                                                @if(App::getLocale() == 'en')
                                            <a href="{{route('category.products',$pro_sub_cat_two->id)}}"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages">{{$pro_sub_cat_two->name_en}} </a>
                                            @else
                                            <a href="{{route('category.products',$pro_sub_cat_two->id)}}"
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
                            <a href="videos.html" class="dropdown-toggle menu-item" data-hover="pages">Videos</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="videos.html">Video 1</a>
                                </li>
                                <li>
                                    <a href="videos.html">Video 2</a>
                                </li>
                                <li>
                                    <a href="videos.html">Video 3</a>
                                </li>

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
                            <a href="training.html" class="dropdown-toggle menu-item">Traning</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="training-single.html">Traning For Offset</a>
                                </li>
                                <li>
                                    <a href="training-single.html">Traning for Project</a>
                                </li>
                                <li>
                                    <a href="training-single.html">Other Traning </a>
                                </li>
                            </ul>
                        </li>
                        <!-- li end -->

                        <!-- Blog Menu-->
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
                            <a href="{{url('news')}}" class="dropdown-toggle menu-item">@lang('massege.News &
                                Events')</a>

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
                        <p class="heading--desc color-white">The choice is in your hands: Where do you go to get an
                            advice and where you purchase products?!!</p>
                    </div>
                    <!-- Feature Card #1 -->
                    <div class="feature-card wow fadeInUp" data-wow-delay="100ms">
                        <div class="feature-card-icon">
                            <i class="icon-refresh"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Innovative Solutions</h3>
                            <p class="feature-card-desc">Innovative Solutions offers services, development services and
                                consulting to help you make the best technology.</p>
                        </div>
                    </div>
                    <!-- feature-card end -->
                    <!-- Feature Card #2 -->
                    <div class="feature-card wow fadeInUp" data-wow-delay="200ms">
                        <div class="feature-card-icon">
                            <i class="icon-speedometer"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">On Time Services</h3>
                            <p class="feature-card-desc">Mutual funds from many investors to purchase broad range of
                                investments, such as stocks, goals, and dreams.</p>
                        </div>
                    </div>
                    <!-- feature-card end -->
                    <!-- Feature Card #3 -->
                    <div class="feature-card wow fadeInUp" data-wow-delay="300ms">
                        <div class="feature-card-icon">
                            <i class="icon-lifesaver"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Best Support</h3>
                            <p class="feature-card-desc">We bring the right people business solutions to challenge
                                established thinking and drive transformation.</p>
                        </div>
                    </div>
                    <!-- feature-card end -->
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
                    <h3>Doing the Right Thing, at the Right Time!</h3>
                </div>
                <!-- .col-lg-9 -->
                <div class="col-sm-12 col-md-12 col-lg-3 text-right">
                    <a href="#" class="btn btn--white btn--bordered btn--rounded">Get Started</a>
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
                            <p>Experienced In Mortgage And Financial Advice!We don’t believe in the sales culture, but
                                instead we believe in the service culture. </p>
                            <div class="social-icons">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div><!-- .col-md-3 end -->
                    <div class="col-12 col-sm-4 col-md-6 col-lg-2 footer--widget widget-links">
                        <div class="widget-title">
                            <h5>Company</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Meet Our Team</a></li>
                                <li><a href="#">How It Works</a></li>
                                <li><a href="#">Latest News</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div><!-- .col-md-2 end -->

                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 footer--widget widget-links widget-links-inline">
                        <div class="widget-title">
                            <h5>Services</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li><a href="#">Finance & Restructuring</a></li>
                                <li><a href="#">Merchandise Consulting</a></li>
                                <li><a href="#">Insurance & Retirement</a></li>
                                <li><a href="#">Enterprise Consulting</a></li>
                                <li><a href="#">Strategy & Planning</a></li>
                                <li><a href="#">General Consultancy</a></li>
                                <li><a href="#">Audit & Evaluation</a></li>
                                <li><a href="#">Investment Planing</a></li>
                                <li><a href="#">Taxes & Efficiency</a></li>
                                <li><a href="#">Market Analysis</a></li>
                                <li><a href="#">Market Analysis</a></li>
                            </ul>
                        </div>
                    </div><!-- .col-md-4 end -->

                    <div class="col-12 col-md-6 col-lg-3 footer--widget widget-newsletter">
                        <div class="widget-title">
                            <h5>Stay Updated</h5>
                        </div>
                        <div class="widget-content">
                            <form class="form-newsletter mailchimp">
                                <input type="email" name="email" class="form-control"
                                    placeholder="Subscribe Our Newsletter">
                                <button type="submit"><i class="fas fa-long-arrow-alt-right"></i></button>
                            </form>
                            <div class="subscribe-alert"></div>
                            <div class="clearfix"></div>
                            <p>Get the latest updates and offers.</p>
                        </div>
                    </div><!-- .col-md-3 end -->
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
                            <span> Copyright © 2019 Irconprint , <a href="#">Web Design Company</a> <a
                                    href="#">3Hand</a> All rights
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