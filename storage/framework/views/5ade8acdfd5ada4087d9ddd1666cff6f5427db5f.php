<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php echo $__env->yieldContent('meta'); ?>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/css/bootstrap.min.css">
    <!-- bootstrap ar  -->
    <?php if(app()->getLocale() == 'ar'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/css/bootstrap-rtl.min.css">
    <?php endif; ?>
    <!-- <link rel="stylesheet" href="css/bootstrap-rtl.min.css"> -->
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/inc/carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/inc/carousel/owl.theme.default.css">
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/inc/carousel/owl.theme.green.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link
        href="http://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800%7CRoboto:300i,400,400i,500,500i,700"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/css/et-line.css">
    <!-- <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/css/external.css"> -->
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/css/style.css">
    <!-- style ar -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assetfront/css/style.css"> -->
    <!-- RS5.0 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/css/navigation.css">

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
                                            <a class="logo" href="index.html">
                                                <img src="<?php echo e(asset('/')); ?>/assetfront/images/logo/logo-colored.png" alt="logo">
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
                                                    <p class="text-capitalize ">Visit Us:</p>
                                                    <p class="font-heading"> 3168 Hafsa Bint Omer Riyadh <br> 13211-7317
                                                        Kingdom of Saudi Arabic </p>
                                                </div>
                                            </div>
    
                                            <div class="contact-box pull-left">
                                                <div class="contact-box-icon pull-left">
                                                    <i class="icon-document"></i>
                                                </div>
                                                <div class="contact-box-info">
                                                    <p class="text-capitalize ">email us</p>
                                                    <p class="font-heading">ali.alsalman@irconprint.com</p>
                                                </div>
                                            </div>
    
                                            <div class="contact-box pull-left">
                                                <div class="contact-box-icon pull-left">
                                                    <i class="icon-phone"></i>
                                                </div>
                                                <div class="contact-box-info">
                                                    <p class="text-capitalize">call us</p>
                                                    <p class="text-capitalize font-heading">+966114122806</p>
                                                </div>
                                            </div>
    
                                            <!-- Module Social -->
                                            <div class="module module-social pull-left">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
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
    
                    <a class="navbar-brand d-md-none d-xl-none" href="index.html">
                        <img class="logo logo-light" src="images/logo/logo-light.png" alt="Consultivo Logo">
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
                                <a href="index.html" class="dropdown-toggle menu-item">Home</a>
                            </li>
                            <!-- li end -->
    
                            <!-- Pages Menu -->
                            <li class="has-dropdown">
                                <a href="about.html" class="dropdown-toggle menu-item" data-hover="pages">About</a>
                                <ul class="dropdown-menu">
    
                                    <li>
                                        <a href="President.html">President's word</a>
                                    </li>
    
                                </ul>
                            </li>
                            <!-- li end -->
                            <!-- Products Menu -->
                            <li class="has-dropdown">
                                <a href="main-category.html" class="dropdown-toggle menu-item" data-hover="pages">Products</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a href="category.html" class="dropdown-toggle menu-item"
                                            data-hover="pages">Products</a>
                                        <ul class="dropdown-menu">
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
    
    
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="category.html" class="dropdown-toggle menu-item"
                                            data-hover="pages">Products</a>
                                        <ul class="dropdown-menu">
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
    
    
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="category.html" class="dropdown-toggle menu-item"
                                            data-hover="pages">Products</a>
                                        <ul class="dropdown-menu">
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="category.html" class="dropdown-toggle sub-item"
                                                    data-hover="pages">Products</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="single.html">Product 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single.html">Product 3</a>
                                                    </li>
    
                                                </ul>
                                            </li>
    
    
                                        </ul>
                                    </li>
    
    
    
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
                                <a href="service.html" class="dropdown-toggle menu-item">services</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="service-single.html">services 1</a>
                                    </li>
                                    <li>
                                        <a href="service-single.html">services 2</a>
                                    </li>
                                    <li>
                                        <a href="service-single.html">services 3</a>
                                    </li>
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
                                <a href="consumables.html" class="dropdown-toggle menu-item">consumables /
                                    E-Shop</a>
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
                                <a href="projects.html" class="dropdown-toggle menu-item" data-hover="shop">Projects</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="project-single.html">Project 1</a>
                                    </li>
                                    <li>
                                        <a href="project-single.html">Project 2</a>
                                    </li>
                                    <li>
                                        <a href="project-single.html">Project 3</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- li end -->
                            <li class="has-dropdown">
                                <a href="security.html" class="dropdown-toggle menu-item" data-hover="shop">Security
                                    Printing </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="project-single.html"> security inks for banknotes</a>
                                    </li>
                                    <li>
                                        <a href="project-single.html">security inks for id documents and passports </a>
                                    </li>
                                   
                                </ul>
                            </li>
                            <!-- li end -->
    
                            <!-- Elements Menu -->
                            <li class="has-dropdown mega-dropdown">
                                <a href="news.html" class="dropdown-toggle menu-item">News & Events</a>
    
                                <!-- .mega-dropdown-menu end -->
                            </li>
                        </ul>
                        <div class="module-container">
                            <!-- Module Search -->
                            <div class="module module-search pull-left">
                                <div class="module-icon search-icon">
                                    <i class="fas fa-search"></i>
                                    <span class="title">search</span>
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
                                <a class="btn" href="contact.html">Contact Us</a>
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


<section id="featured3" class="featured featured-2 featured-3 featured-left bg-dark3 pt-0 pb-0">
        <div class="container-fluid pr-0 pl-0">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-content">
                    <div class="heading">
                        <h2 class="heading--title color-white">We Are Here To Ease<br>The Financial Obstacles!</h2>
                        <p class="heading--desc color-white">The choice is in your hands: Where do you go to get an advice and where you purchase products?!!</p>
                    </div>
                    <!-- Feature Card #1 -->
                    <div class="feature-card wow fadeInUp" data-wow-delay="100ms">
                        <div class="feature-card-icon">
                            <i class="icon-refresh"></i>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">Innovative Solutions</h3>
                            <p class="feature-card-desc">Innovative Solutions offers services, development services and consulting to help you make the best technology.</p>
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
                            <p class="feature-card-desc">Mutual funds from many investors to purchase broad range of investments, such as stocks, goals, and dreams.</p>
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
                            <p class="feature-card-desc">We bring the right people business solutions to challenge established thinking and drive transformation.</p>
                        </div>
                    </div>
                    <!-- feature-card end -->
                </div>
                <!-- .col-lg-6 end -->
                <div class="col-sm-12 col-md-12 col-lg-6 pr-0">
                    <div class="banner--img">
                        <img src="<?php echo e(asset('/')); ?>/assetfront/images/banners/1.jpg" alt="banner img">
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
                            <img class="footer-logo" src="<?php echo e(asset('/')); ?>/assetfront/images/logo/logo-small.png" alt="logo">
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
                                <span> Copyright © 2019 Irconprint , <a href="#">Web Design Company</a> <a href="#">3Hand</a> All rights
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
    <script src="<?php echo e(asset('/')); ?>/assetfront/js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo e(asset('/')); ?>/assetfront/js/popper.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/js/plugins.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/js/custom.js"></script>
    <!-- RS5.0 Core JS Files -->
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <!-- RS Configration JS Files -->
    <script src="<?php echo e(asset('/')); ?>/assetfront/js/rsconfig.js"></script>

</body>

</html>