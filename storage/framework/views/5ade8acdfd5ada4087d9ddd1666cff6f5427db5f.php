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
                                        <a class="logo" href="<?php echo e(url('/')); ?>"> <?php if(app()->getLocale() == 'ar'): ?>
                                            <?php if(isset($setting->logo_img)): ?>
                                            <img src="<?php echo e(asset($setting->logo_img)); ?>" alt="logo">
                                            <?php else: ?>
                                            <img src="<?php echo e(asset('/')); ?>/assetfront/images/logo/logo-colored.png"
                                                alt="logo">
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <?php if(isset($setting->log_img_en)): ?>
                                            <img src="<?php echo e(asset($setting->log_img_en)); ?>" alt="logo">
                                            <?php else: ?>
                                            <img src="<?php echo e(asset('/')); ?>/assetfront/images/logo/logo-colored.png"
                                                alt="logo">
                                            <?php endif; ?>
                                            <?php endif; ?>
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
                                                <p class="text-capitalize "><?php echo app('translator')->getFromJson('massege.address'); ?>:</p>
                                                <p class="font-heading"> <?php echo e(ucwords($setting->address)); ?> </p>
                                            </div>
                                        </div>

                                        <div class="contact-box pull-left">
                                            <div class="contact-box-icon pull-left">
                                                <i class="icon-document"></i>
                                            </div>
                                            <div class="contact-box-info">
                                                <p class="text-capitalize "><?php echo app('translator')->getFromJson('massege.email'); ?></p>
                                                <p class="font-heading"><?php echo e($setting->email); ?></p>
                                            </div>
                                        </div>

                                        <div class="contact-box pull-left">
                                            <div class="contact-box-icon pull-left">
                                                <i class="icon-phone"></i>
                                            </div>
                                            <div class="contact-box-info">
                                                <p class="text-capitalize"><?php echo app('translator')->getFromJson('massege.phone'); ?></p>
                                                <p class="text-capitalize font-heading"><?php echo e($setting->phone); ?></p>
                                            </div>
                                        </div>

                                        <!-- Module Social -->
                                        <div class="module module-social pull-left">
                                            <!--  <?php if($social->fb): ?> href="<?php echo e("https://".$social->fb); ?>"<?php else: ?> href="#" <?php endif; ?> target="_blank" -->
                                            <?php if($social->fb): ?> <a href="<?php echo e('https://'.$social->fb); ?>"><i
                                                    class="fab fa-facebook-f"></i></a> <?php endif; ?>
                                            <?php if($social->tw): ?><a href="<?php echo e('https://'.$social->tw); ?>"><i
                                                    class="fab fa-twitter"></i></a><?php endif; ?>
                                            <?php if($social->linkedin): ?><a href="<?php echo e('https://'.$social->linkedin); ?>"><i
                                                    class="fab fa-linkedin-in"></i></a><?php endif; ?>
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

                <a class="navbar-brand d-md-none d-xl-none" href="<?php echo e(url('/')); ?>">
                    <?php if(app()->getLocale() == 'ar'): ?>
                    <?php if(isset($setting->logo_img)): ?>
                    <img class="logo logo-light" src="<?php echo e(asset($setting->logo_img)); ?>" alt="Consultivo logo">
                    <?php else: ?>
                    <img class="logo logo-light" src="<?php echo e(asset('/')); ?>/assetfront/images/logo/logo-colored.png"
                        alt="Consultivo logo">
                    <?php endif; ?>
                    <?php else: ?>
                    <?php if(isset($setting->log_img_en)): ?>
                    <img class="logo logo-light" src="<?php echo e(asset($setting->log_img_en)); ?>" alt="logo">
                    <?php else: ?>
                    <img class="logo logo-light" src="<?php echo e(asset('/')); ?>/assetfront/images/logo/logo-colored.png"
                        alt="logo">
                    <?php endif; ?>
                    <?php endif; ?>

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
                            <a href="<?php echo e(url('/')); ?>" class="dropdown-toggle menu-item"><?php echo app('translator')->getFromJson('massege.home'); ?></a>
                        </li>
                        <!-- li end -->

                        <!-- Pages Menu -->
                        <li class="has-dropdown">
                            <a href="<?php echo e(route('About')); ?>" class="dropdown-toggle menu-item"
                                data-hover="pages"><?php echo app('translator')->getFromJson('massege.About Us'); ?></a>
                            <ul class="dropdown-menu">

                                <li>
                                    <a href="<?php echo e(route('President')); ?>"><?php echo app('translator')->getFromJson('massege.President`s word'); ?></a>
                                </li>

                            </ul>
                        </li>
                        <!-- li end -->
                        <!-- Products Menu -->
                        <li class="has-dropdown">
                            <a href="<?php echo e(route('products')); ?>" class="dropdown-toggle menu-item"
                                data-hover="pages"><?php echo app('translator')->getFromJson('massege.Products'); ?></a>
                            <ul class="dropdown-menu">
                                <?php if(isset($product_categories)): ?>
                                <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="dropdown-submenu">
                                    <?php if(App::getLocale() == 'en'): ?>
                                    <a href="<?php echo e(route('category.products',$pro_cat->slogen_en)); ?>"
                                        class="dropdown-toggle sub-item" data-hover="pages"><?php echo e($pro_cat->name_en); ?> </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('category.products',$pro_cat->slogen_ar)); ?>"
                                        class="dropdown-toggle sub-item" data-hover="pages"><?php echo e($pro_cat->name_ar); ?> </a>
                                    <?php endif; ?>
                                    <?php if($pro_cat->subcategories->isEmpty() != true): ?>
                                    <ul class="dropdown-menu">

                                        <?php $__currentLoopData = $pro_cat->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="has-dropdown">
                                            <?php if(App::getLocale() == 'en'): ?>
                                            <a href="<?php echo e(route('Subcategory.products',$pro_sub_cat->slogen_en)); ?>"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages"><?php echo e($pro_sub_cat->name_en); ?> </a>
                                            <?php else: ?>
                                            <a href="<?php echo e(route('Subcategory.products',$pro_sub_cat->slogen_ar)); ?>"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages"><?php echo e($pro_sub_cat->name_ar); ?> </a>
                                            <?php endif; ?>
                                            <?php if($pro_sub_cat->subtwocategories->isEmpty() != true): ?>
                                            <ul class="dropdown-menu">
                                                <?php $__currentLoopData = $pro_sub_cat->subtwocategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_sub_cat_two): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php if(App::getLocale() == 'en'): ?>
                                                    <a href="<?php echo e(route('Subcategorytwo.products',$pro_sub_cat_two->slogen_en)); ?>"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages"><?php echo e($pro_sub_cat_two->name_en); ?> </a>
                                                    <?php else: ?>
                                                    <a href="<?php echo e(route('Subcategorytwo.products',$pro_sub_cat_two->slogen_ar)); ?>"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages"><?php echo e($pro_sub_cat_two->name_ar); ?> </a>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>




                            </ul>
                        </li>
                        <!-- li end -->
                        <!-- Videos Menu -->
                        <li class="has-dropdown">
                            <a href="<?php echo e(route('Video.name')); ?>" class="dropdown-toggle menu-item" data-hover="pages"><?php echo app('translator')->getFromJson('massege.Videos'); ?></a>
                            <ul class="dropdown-menu">
                                <?php if(isset($video_categories)): ?>
                                <?php $__currentLoopData = $video_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_cat_video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="dropdown-submenu">
                                    <?php if(App::getLocale() == 'en'): ?>
                                    <a href="<?php echo e(route('category.Videos',$pro_cat_video->slogen_en)); ?>"
                                        class="dropdown-toggle sub-item" data-hover="pages"><?php echo e($pro_cat_video->name_en); ?>

                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('category.Videos',$pro_cat_video->slogen_ar)); ?>"
                                        class="dropdown-toggle sub-item" data-hover="pages"><?php echo e($pro_cat_video->name_ar); ?>

                                    </a>
                                    <?php endif; ?>
                                    <?php if($pro_cat_video->subcategories->isEmpty() != true): ?>
                                    <ul class="dropdown-menu">

                                        <?php $__currentLoopData = $pro_cat_video->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_sub_cat_video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="has-dropdown">
                                            <?php if(App::getLocale() == 'en'): ?>
                                            <a href="<?php echo e(route('Subcategory.Videos',$pro_sub_cat_video->slogen_en)); ?>"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages"><?php echo e($pro_sub_cat_video->name_en); ?> </a>
                                            <?php else: ?>
                                            <a href="<?php echo e(route('Subcategory.Videos',$pro_sub_cat_video->slogen_ar)); ?>"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages"><?php echo e($pro_sub_cat_video->name_ar); ?> </a>
                                            <?php endif; ?>
                                            <?php if($pro_sub_cat_video->subtwocategories->isEmpty() != true): ?>
                                            <ul class="dropdown-menu">
                                                <?php $__currentLoopData = $pro_sub_cat_video->subtwocategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_sub_cat_two_video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php if(App::getLocale() == 'en'): ?>
                                                    <a href="<?php echo e(route('Subcategorytwo.Videos',$pro_sub_cat_two_video->slogen_en)); ?>"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages"><?php echo e($pro_sub_cat_two_video->name_en); ?> </a>
                                                    <?php else: ?>
                                                    <a href="<?php echo e(route('Subcategorytwo.Videos',$pro_sub_cat_two_video->slogen_ar)); ?>"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages"><?php echo e($pro_sub_cat_two_video->name_ar); ?> </a>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>


                            </ul>
                        </li>
                        <!-- li end -->
                        <!-- Services Menu-->
                        <li class="has-dropdown">
                            <a href="<?php echo e(url('services')); ?>"
                                class="dropdown-toggle menu-item"><?php echo app('translator')->getFromJson('massege.services'); ?></a>
                            <ul class="dropdown-menu">
                                <?php if(isset($services)): ?>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicesss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php if(App::getLocale() == 'en'): ?>
                                    <a href="<?php echo e(route('service',$servicesss->slogen_en)); ?>"><?php echo e($servicesss->title_en); ?> </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('service',$servicesss->slogen_ar)); ?>"><?php echo e($servicesss->title_ar); ?> </a>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <!-- li end -->
                        <!-- Traning Menu-->
                        <li class="has-dropdown">
                            <a href="<?php echo e(route('training')); ?>" class="dropdown-toggle menu-item"><?php echo app('translator')->getFromJson('massege.Traning'); ?></a>
                            <ul class="dropdown-menu">
                                <?php if(isset($training_categories)): ?>
                                <?php $__currentLoopData = $training_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_cat_training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="dropdown-submenu">
                                    <?php if(App::getLocale() == 'en'): ?>
                                    <a href="<?php echo e(route('category.trainings',$pro_cat_training->slogen_en)); ?>"
                                        class="dropdown-toggle sub-item"
                                        data-hover="pages"><?php echo e($pro_cat_training->name_en); ?> </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('category.trainings',$pro_cat_training->slogen_ar)); ?>"
                                        class="dropdown-toggle sub-item"
                                        data-hover="pages"><?php echo e($pro_cat_training->name_ar); ?> </a>
                                    <?php endif; ?>
                                    <?php if($pro_cat_training->subcategories->isEmpty() != true): ?>
                                    <ul class="dropdown-menu">

                                        <?php $__currentLoopData = $pro_cat_training->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_sub_cat_training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="has-dropdown">
                                            <?php if(App::getLocale() == 'en'): ?>
                                            <a href="<?php echo e(route('Subcategory.trainings',$pro_sub_cat_training->slogen_en)); ?>"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages"><?php echo e($pro_sub_cat_training->name_en); ?> </a>
                                            <?php else: ?>
                                            <a href="<?php echo e(route('Subcategory.trainings',$pro_sub_cat_training->slogen_ar)); ?>"
                                                class="dropdown-toggle sub-item"
                                                data-hover="pages"><?php echo e($pro_sub_cat_training->name_ar); ?> </a>
                                            <?php endif; ?>
                                            <?php if($pro_sub_cat_training->subtwocategories->isEmpty() != true): ?>
                                            <ul class="dropdown-menu">
                                                <?php $__currentLoopData = $pro_sub_cat_training->subtwocategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_sub_cat_two_training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php if(App::getLocale() == 'en'): ?>
                                                    <a href="<?php echo e(route('Subcategorytwo.trainings',$pro_sub_cat_two_training->slogen_en)); ?>"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages"><?php echo e($pro_sub_cat_two_training->name_en); ?> </a>
                                                    <?php else: ?>
                                                    <a href="<?php echo e(route('Subcategorytwo.trainings',$pro_sub_cat_two_training->slogen_ar)); ?>"
                                                        class="dropdown-toggle sub-item"
                                                        data-hover="pages"><?php echo e($pro_sub_cat_two_training->name_ar); ?> </a>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <!-- li end -->

                        <!-- Blog Menu-->
                        <li class="has-dropdown">

                            <?php if(App::getLocale() == 'en'): ?>
                            <a href="<?php echo e(route('page',$eshop_page->slogen_en)); ?>"><?php echo e($eshop_page->title_en); ?> </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('page',$eshop_page->slogen_ar)); ?>"><?php echo e($eshop_page->title_ar); ?> </a>
                            <?php endif; ?>

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
                                data-hover="shop"><?php echo app('translator')->getFromJson('massege.Projects'); ?></a>
                        </li>
                        <!-- li end -->
                        <li class="has-dropdown">
                            <a href="security.html" class="dropdown-toggle menu-item"
                                data-hover="shop"><?php echo app('translator')->getFromJson('massege.Security Printing'); ?> </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($secure_page)): ?>
                                <?php $__currentLoopData = $secure_page; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>

                                    <?php if(App::getLocale() == 'en'): ?>
                                    <a href="<?php echo e(route('page',$secure->slogen_en)); ?>"><?php echo e($secure->title_en); ?> </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('page',$secure->slogen_ar)); ?>"><?php echo e($secure->title_ar); ?> </a>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <!-- li end -->

                        <!-- Elements Menu -->
                        <li class="has-dropdown mega-dropdown">
                            <a href="<?php echo e(url('news')); ?>" class="dropdown-toggle menu-item"><?php echo app('translator')->getFromJson('massege.News & Events'); ?></a>

                            <!-- .mega-dropdown-menu end -->
                        </li>
                    </ul>
                    <div class="module-container">
                        <!-- Module Search -->
                        <div class="module module-search pull-left">
                            <div class="module-icon search-icon">
                                <i class="fas fa-search"></i>
                                <span class="title"><?php echo app('translator')->getFromJson('massege.Search'); ?></span>
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
                            <a class="btn" href="<?php echo e(url('contact-us')); ?>"><?php echo app('translator')->getFromJson('massege.contact'); ?></a>
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
    <?php echo $__env->yieldContent('content'); ?>

    <section id="featured3" class="featured featured-2 featured-3 featured-left bg-dark3 pt-0 pb-0">
        <div class="container-fluid pr-0 pl-0">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-content">
                    <div class="heading">
                        <h2 class="heading--title color-white">We Are Here To Ease<br>The Financial Obstacles!</h2>
                        <p class="heading--desc color-white"> </p>
                    </div>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footersevice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Feature Card #1 -->
                    <div class="feature-card wow fadeInUp" data-wow-delay="100ms">
                        <div class="feature-card-icon ">
                            <?php if($footersevice->img): ?>
                            <i class="<?php echo e($footersevice->img); ?>"></i>
                            <?php else: ?>
                            <i class="icon-presentation"></i>
                            <?php endif; ?>
                        </div>
                        <div class="feature-card-content ">
                            <h3 class="feature-card-title">
                                <?php if(App::getLocale() == 'ar'): ?>
                                <?php echo e($footersevice->title_ar); ?>

                                <?php else: ?>
                                <?php echo e($footersevice->title_en); ?>

                                <?php endif; ?>
                            </h3>
                            <p class="feature-card-desc">
                                <?php if(App::getLocale() == 'en'): ?>
                                <?php echo str_limit(strip_tags($footersevice->description_en), $limit = 80, $end = '...'); ?>

                                <?php else: ?>
                                <?php echo str_limit(strip_tags($footersevice->description_ar) , $limit = 80, $end = '...'); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <!-- feature-card end -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <h3><?php echo app('translator')->getFromJson('massege.Doing the Right Thing, at the Right Time!'); ?></h3>
                </div>
                <!-- .col-lg-9 -->
                <div class="col-sm-12 col-md-12 col-lg-3 text-right">
                    <a href="<?php echo e(url('contact-us')); ?>" class="btn btn--white btn--bordered btn--rounded"><?php echo app('translator')->getFromJson('massege.Get
                        Started'); ?></a>
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
                            <img class="footer-logo" src="<?php echo e(asset('/')); ?>/assetfront/images/logo/logo-small.png"
                                alt="logo">
                            <?php if(App::getLocale() == 'ar'): ?>
                            <p><?php echo e($setting->description_ar); ?></p>
                            <?php else: ?>
                            <p><?php echo e($setting->description_en); ?></p>
                            <?php endif; ?>
                            <div class="social-icons">
                                <?php if($social->fb): ?> <a href="<?php echo e('https://'.$social->fb); ?>" class="facebook"> <i
                                        class="fab fa-facebook-f"></i></a> <?php endif; ?>
                                <?php if($social->tw): ?><a href="<?php echo e('https://'.$social->tw); ?>" class="twitter"><i
                                        class="fab fa-twitter"></i></a><?php endif; ?>
                                <?php if($social->linkedin): ?><a href="<?php echo e('https://'.$social->linkedin); ?>" class="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a><?php endif; ?>
                                <?php if($social->instegram): ?><a href="<?php echo e('https://'.$social->instegram); ?>" class="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a><?php endif; ?>
                                <?php if($social->youtube): ?><a href="<?php echo e('https://'.$social->youtube); ?>" class="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a><?php endif; ?>
                                <?php if($social->pinterest): ?><a href="<?php echo e('https://'.$social->pinterest); ?>" class="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a><?php endif; ?>

                            </div>
                        </div>
                    </div><!-- .col-md-3 end -->
                    <div class="col-12 col-sm-4 col-md-6 col-lg-2 footer--widget widget-links">
                        <div class="widget-title">
                            <h5><?php echo app('translator')->getFromJson('massege.Company'); ?></h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li><a href="<?php echo e(route('About')); ?>"><?php echo app('translator')->getFromJson('massege.About Us'); ?></a></li>
                                <li><a href="<?php echo e(route('President')); ?>"><?php echo app('translator')->getFromJson('massege.President`s word'); ?></a></li>
                                <li><a href="<?php echo e(url('contact-us')); ?>"><?php echo app('translator')->getFromJson('massege.contact'); ?></a></li>
                            </ul>
                        </div>
                    </div><!-- .col-md-2 end -->

                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 footer--widget widget-links widget-links-inline">
                        <div class="contact-box-icon pull-left">
                            <i class="icon-map-pin"></i>
                        </div>
                        <div class="contact-box-info">
                            <p class="text-capitalize "><?php echo app('translator')->getFromJson('massege.address'); ?>:</p>
                            <p class="font-heading"> <?php echo e(ucwords($setting->address)); ?> </p>
                        </div>
                    </div><!-- .col-md-4 end -->

                    <div class="col-12 col-md-6 col-lg-3 footer--widget widget-newsletter">

                        <div class="contact-box-info">
                            <p class="text-capitalize "><?php echo app('translator')->getFromJson('massege.email'); ?></p>
                            <p class="font-heading"><?php echo e($setting->email); ?></p>
                        </div>

                        <div class="contact-box-info">
                            <p class="text-capitalize"><?php echo app('translator')->getFromJson('massege.phone'); ?></p>
                            <p class="text-capitalize font-heading"><?php echo e($setting->phone); ?></p>
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
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.slideanims.min.js">
    </script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.navigation.min.js">
    </script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assetfront/inc/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <!-- RS Configration JS Files -->
    <script src="<?php echo e(asset('/')); ?>/assetfront/js/rsconfig.js"></script>

</body>

</html>