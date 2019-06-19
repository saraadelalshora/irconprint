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
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/inc/carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/inc/carousel/owl.theme.default.css">
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/inc/carousel/owl.theme.green.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/xzoom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/style.css">
     @if(app()->getLocale() == 'en')
    <link rel="stylesheet" href="{{asset('/')}}/assetfront/css/style-en.css">
    @endif
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <link href="{{url('/')}}/assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{asset('/')}}/assetfront/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="{{asset('/')}}/assetfront/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="{{url('/')}}/assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- start header   -->
    <header>
        <section class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="list-inline topBarNav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="false">
                                    <i class="fa fa-user mr-5"></i><span> @lang('massege.Profile') <i
                                            class="fa fa-angle-down ml-5"></i></span>
                                </a>
                                <ul class="dropdown-menu w-150" role="menu">
                                @guest
                                    <li><a href="{{route('login')}}">@lang('massege.Login')</a>
                                    </li>
                                    <li><a href="{{route('register')}}">@lang('massege.Register')</a>
                                    </li>
                                @endguest
                                @auth
                                <li><a href="{{route('Profile')}}">@lang('massege.Profile')</a>

                                <li><a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">@lang('massege.Log out')</a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    </li>
                                @endauth
                                    <li class="divider"></li>
                                    <li><a href="{{route('/Favorite')}}">@lang('massege.Favorites')</a>
                                    </li>
                                    <li><a href="shopping-cart.html">@lang('massege.Checkout')</a>
                                    </li>
                                    <li><a href="{{url('/Shopping-Cart-Show')}}">@lang('massege.Cart')</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                          
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="false">
                                    <img src="{{asset('/')}}/assetfront/images/egypt.png" class="mr-5" alt=""> <span> {{ trans('massege.'. App::getLocale()) }} <i
                                            class="fa fa-angle-down ml-5"></i></span>
                                </a>
                                <ul class="dropdown-menu w-100" role="menu">
                             
                                    @if (App::isLocale('en'))
                                    <li>
                                        <a href="{{URL::to('setlang/ar')}}" >
                                        <img src="{{asset('/')}}/assetfront/images/egypt.png" class="mr-5" alt="">
                                        <i class="fa fa-language" aria-hidden="true"></i>
                                        {{trans('massege.ar')}}
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{URL::to('setlang/en')}}" >
                                        <img src="{{asset('/')}}/assetfront/images/united-states-of-america.png" class="mr-5" alt=""> 
                                        <i class="fa fa-language" aria-hidden="true"></i>
                                        {{trans('massege.en')}}
                                        </a>
                                    </li>
                                    @endif
                                 
                           
                                          
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="false">
                                    <i class="fa fa-usd mr-5"></i>USD<i class="fa fa-angle-down ml-5"></i>
                                </a>
                                <ul class="dropdown-menu " role="menu">
                                    <li><a href="#"><i class="fa fa-eur mr-5"></i>KWD</a>
                                    </li>
                                    <li class=""><a href="#"><i class="fa fa-usd mr-5"></i>USA-USD</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"></i>Bahraini-BHD</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"></i>British-GBP </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"></i> Canada-CAD</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"> </i> Saudi-SAR</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"></i> Europe-EUR</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"></i> Kuwait-KWD</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"></i>Qatar-QAR </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"></i>Australian-AUD </a>
                                    <li><a href="#"><i class="fa fa-gbp mr-5"></i> United Arab Emirates-AED</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6  hidden-xs">
                        <div class="social pull-left">
                            <ul class="list-inline">
                            @if(isset($social))
                                <li><a @if($social->fb) href="{{"https://".$social->fb}}"@else href="#" @endif target="_blank" ><i class="fab fa-facebook-f"></i> </a></li>
                                <li><a @if($social->tw) href="{{"https://".$social->tw}}"@else href="#" @endif target="_blank" ><i class="fab fa-twitter"></i> </a></li>
                                <li><a @if($social->instegram) href="{{"https://".$social->instegram}}"@else href="#" @endif target="_blank" ><i class="fab fa-instagram"></i> </a></li>
                                <li><a @if($social->linkedin) href="{{"https://".$social->linkedin}}"@else href="#" @endif target="_blank" ><i class="fab fa-linkedin-in"></i> </a></li>
                                <li><a @if($social->youtube) href="{{"https://".$social->youtube}}"@else href="#" @endif target="_blank" ><i class="fab fa-youtube"></i> </a></li>
                                <li><a @if($social->pinterest) href="{{"https://".$social->pinterest}}"@else href="#" @endif target="_blank" ><i class="fab fa-pinterest-p"></i> </a></li>
                                <li><a @if($social->rss)href="{{"https://".$social->rss}}"@else href="#" @endif target="_blank"><i class="fas fa-rss"></i> </a></li>
                               @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="md-header ">
            <div class="container">
                <div class="row ">
                    <div class="col-md-2 col-sm-2">
                        <div class="logo">
                            <a href="#">
                            @if(isset($setting->logo_img))
                            <img src="{{asset($setting->logo_img)}}" alt="footer-logo" class="img-responsive" />
                            @else
                                <img src="#" alt="logo" class="img-responsive" />
                            @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 ">
                        <div class="search-bar">
                            <form action="{{url('search')}}" method="POST" role="search" >
                            {{ csrf_field() }}
                                <div class="row grid-space-1">
                                    <div class="col-md-7 col-sm-7 col-xs-9">
                                        <input type="text" name="keyword" class="form-control input-lg"
                                            placeholder="@lang('massege.Search')">
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-3 col-sm-3 hidden-xs">
                                   
                                        <select class="form-control input-lg" name="category">
                                            <option value="all">@lang('massege.Categories')</option>
                                            @foreach($categories as $category)
                                            <optgroup  @if(app()->getLocale() == 'ar')label="{{$category->name_ar}}" @else label="{{ucwords($category->name_en)}}" @endif>
                                                @foreach($category->subcategories as $sub)
                                                <option value="{{$sub->id}}">
                                                @if(app()->getLocale() == 'ar')
                                                {{$sub->name_ar}}
                                                 @else
                                                {{ucwords($sub->name_en)}}
                                                @endif
                                                </option>
                                                @endforeach
                                            </option>
                                            @endforeach
                                        </select>
                                  
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-2 col-sm-2 col-xs-3">
                                        <button type="submit" class="btn btn-default btn-block btn-lg" value=""><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 vertical-align header-items hidden-xs">
                        <div class="header-item mr-5">
                            <a href="{{route('/Favorite')}}" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Wishlist">
                                <i class="far fa-heart"></i> <sub>@if(!empty($favoriteheadercount)){{$favoriteheadercount}}@else 0 @endif</sub> </a>
                        </div>
                        <div class="header-item">
                            <a href="{{url('/Shopping-Cart-Show')}}" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Compare">
                                <i class="fas fa-shopping-basket"></i> <sub>@if(!empty($carheadercount)){{$carheadercount}}@else 0 @endif</sub>  </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- end top-header -->
        <!-- start navbar -->
        <div class="header" id="home">
            <div class="header-bottom">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header  visible-xs">
                        <div class="nav-toggle"></div>
                        <a class="nav-brand" href="#">
                        </a>
                        <div class="mobile-header header-items">

                            <div class="header-item mr-5">
                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Wishlist">
                                    <i class="far fa-heart"></i> <sub>32</sub> </a>
                            </div>
                            <div class="header-item">
                                <a href="{{url('/Shopping-Cart-Show')}}" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Compare">
                                    <i class="fas fa-shopping-basket"></i> <sub>{{$carheadercount}}</sub>  </a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="nav-menus-wrapper" style="transition-property: none;">
                            <ul class="nav-menu">
                                <li class="active"><a href="{{route('home')}}">@lang('massege.home')</a></li>
                                @if(app()->getLocale() == 'ar')
                                <li><a href="{{route('About',['slug'=>$page->first()->slogen_ar])}}" >@lang('massege.About Us')</a></li>

                                @else
                                <li><a href="{{route('About',['slug'=>$page->first()->slogen_en])}}" >@lang('massege.About Us')</a></li>

                                @endif
                                <!-- <li class="dropdown"><a href="category.html">الاقسام<span
                                            class="submenu-indicator"></span></a>
                                    <ul class="nav-dropdown nav-submenu main-drop" style="right: auto; display: none;">
                                        <li><a href="category.html">Services 1</a></li>
                                        <li><a href="category.html">Services 2</a></li>
                                        <li><a href="category.html">Services 3</a></li>
                                        <li class="sub-dropdown"><a href="single.html">Sub Services<span
                                                    class="submenu-indicator"></span></a>
                                            <ul class="nav-dropdown nav-submenu sup-drop" style="display: none;">
                                                <li><a href="single.html">Sub Services 1</a></li>
                                                <li><a href="single.html">Sub Services 2</a></li>
                                                <li><a href="single.html">Sub Services 3</a></li>
                                                <li><a href="single.html">Sub Services 4</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="category.html">Services 4</a></li>
                                    </ul>
                                </li> -->

                                @if(isset($categories))

                                @foreach($categories as $category)
                                @if(isset($category))
                                <li class="dropdown-mega">
                                @if(app()->getLocale() == 'ar')
                              <a href="{{route('category.name',$category->slogen_ar)}}"> {{$category->name_ar}}

                                @else
                                <a href="{{route('category.name',$category->slogen_en)}}">{{ucwords($category->name_en)}}
                                 @endif
                                </a>
                               
                                @if(isset($category->subcategories))
                                    <div class="megamenu-panel container">
                                        <div class="megamenu-lists">
                                            <div class="row m-b-20">
                                                
                                                 @foreach($category->subcategories as $sub)
                                                <div class="col-md-2 col-sm-12 col-xs-12">
                                                    <ul class="megamenu-list ">
                                                    @if(app()->getLocale() == 'ar')
                                                    <li class="megamenu-list-title"><a href="{{route('category.products',$sub->slogen_ar)}}"> {{$sub->name_ar}}</a>
                                                        </li>
                                                     
                                                        @else
                                                        <li class="megamenu-list-title"><a href="{{route('category.products',$sub->slogen_en)}}">{{ucwords($sub->name_en)}} </a></li>
                                                           
                                                        @endif
                                                       
                                                         @foreach($sub->filters as $categorycontent)
                                                         @if(app()->getLocale() == 'ar')
                                                         <li><a href="{{route('Subcategory.products',$categorycontent->name_ar)}}" >{{$categorycontent->name_ar}} </a></li>
                                                           
                                                        @else
                                                        <li><a href="{{route('Subcategory.products',$categorycontent->name_en)}}" >{{ucwords($categorycontent->name_en)}} </a></li>
                                                           
                                                        @endif

                                                       
                                                        @endforeach
                                                    </ul>
                                                </div>
                                             @endforeach
                                             
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                                @endif
                                @endforeach
                                @endif

                                <li><a href="{{route('Contact')}}">@lang('massege.contact')</a></li>
                            </ul>

                        </div>
                    </div>
                </nav>

            </div>
        </div>
        <!-- end navbar -->

    </header>
    <!-- end  header   -->

    <!-- <div class="container"> -->
    @include('flash-massege')    
        @yield('content')
    <!-- </div> -->
     <!-- start footer -->
     <footer>
        <div class="container">
            <div class="footer-md">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-col">
                        <div class="ft-content">
                            <div class="logo-footer">
                            @if(isset($setting->logo_img))
                            <img src="{{asset($setting->logo_img)}}" alt="footer-logo" class="img-responsive" />
                            @else
                                <img src="#" alt="logo" class="img-responsive" />
                            @endif
                               
                            </div>
                            <p> لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص
                                بالتصاميم </p>
                            <!-- <p>سواء
                                        كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع  </p> -->

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-col">
                        <div class="ft-content">

                            <h3 class="ft-title">  @lang('massege.Pages')</h3>
                            <ul class="list-unstyled">
                                @php $local=app()->getLocale();@endphp
                                @foreach($page as $page_1)
                                <!-- {locale}/page/{page} -->
                                
                           
                                @if(app()->getLocale() == 'ar')
                                <li>
                                <a href="{{route('page',$page_1->slogen_ar)}}">
                                       
                                       {{$page_1->title_ar}} </a></li>
                                @else
                                <li>
                                <a href="{{route('page',$page_1->slogen_en)}}">
                                       
                                       {{ucwords($page_1->title_en)}} </a></li>
                                @endif

                           
                               @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-col">
                        <div class="ft-content">

                            <h3 class="ft-title"> @lang('massege.Informations')</h3>
                            <ul class="list-unstyled">
                            @guest
                                    <li><a href="{{route('login')}}">@lang('massege.Login')</a>
                                    </li>
                                    <li><a href="{{route('register')}}">@lang('massege.Register')</a>
                                    </li>
                                @endguest                           
                                <li><a href="#"> @lang('massege.Checkout') </a></li>
                                <li><a href="#"> @lang('massege.Cart') </a></li>
                                @auth
                                <li><a href="#">@lang('massege.Profile')</a>
                                    </li>
                                <li><a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">@lang('massege.Log out')</a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    
                                @endauth
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-col">
                        <div class="ft-content">
                            <h3 class="ft-title"> @lang('massege.Contact info')</h3>
                            <ul class="list-unstyled">
                                <li><span>@lang('massege.Company Address'):</span> {{$setting->address}}</li>
                                <li><span> @lang('massege.call us now') :</span> {{$setting->phone}}</li>
                                <li><span>@lang('massege.E-mail') :</span> {{$setting->email}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer ">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="ft-app">
                            <strong>@lang('massege.download') :</strong>
                            <a href="#"><i class="fab fa-apple"></i></a>
                            <a href="#"><i class="fab fa-android"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="social pull-left">
                            <strong>@lang('massege.Follow'):</strong>
                            <ul class="list-inline  ">
                                <li class="fc"><a  @if($social->fb) href="{{"https://".$social->fb}}"@else href="#" @endif target="_blank" > <i class="fab fa-facebook-f"></i></a></li>
                                <li class="tw"><a @if($social->tw) href="{{"https://".$social->tw}}"@else href="#" @endif target="_blank" ><i class="fab fa-twitter"></i> </a></li>
                                <li class="in"><a @if($social->instegram) href="{{"https://".$social->instegram}}"@else href="#" @endif target="_blank" ><i class="fab fa-instagram"></i></a></li>
                                <li class="wp"><a href="{{$setting->whatsapp}}"> <i class="fab fa-whatsapp"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="end-footer">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <p> {{trans('massege.copyright')}}</p>
                    <a href="https://www.3hand.net/">@lang('massege.3hand')</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="ft-img pull-left">
                        <img src="{{asset('/')}}/assetfront/images/paypel.png" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- end footer -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('/')}}/assetfront/js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('/')}}/assetfront/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}/assetfront/inc/carousel/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
    <script src="{{asset('/')}}/assetfront/js/xzoom.min.js"></script>
    <script src="{{asset('/')}}/assetfront/js/custom.js"></script>

    @yield('js')
</body>

</html>