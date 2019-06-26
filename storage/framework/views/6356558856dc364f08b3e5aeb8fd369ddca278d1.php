<?php $__env->startSection('meta'); ?>
<title>Ircon</title>
<meta name="description" <?php if(isset($setting->meta_description_ar)): ?>content="<?php echo e($setting->meta_description_ar); ?>"<?php endif; ?>>
<meta name="keywords" <?php if(isset($setting->meta_tags)): ?> content="<?php echo e($setting->meta_tags); ?>"<?php endif; ?> >

<meta name="author" <?php if(isset($setting->meta_title)): ?> content="<?php echo e($setting->meta_title); ?>"<?php endif; ?> >
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Hero Section
====================================== -->
<section id="slider" class="slider slide-overlay-black">
    <!-- START REVOLUTION SLIDER 5.0 -->
    <div class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>
                <!-- slide 1    -->
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i==1): ?>
                <li data-transition="zoomout" data-slotamount="default" data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut" data-masterspeed="2000">
                    <?php elseif($i==2): ?>
                <li data-transition="fadethroughdark" data-slotamount="default" data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut" data-masterspeed="2000">
                    <?php elseif($i==3): ?>
                <li data-transition="slidingoverlaydown" data-slotamount="default" data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut" data-masterspeed="2000">
                    <?php else: ?>
                <li data-transition="fadethroughdark" data-slotamount="default" data-easein="Power4.easeInOut"
                    data-easeout="Power4.easeInOut" data-masterspeed="2000">
                    <?php endif; ?>

                    <img src="<?php echo e(asset($slide->img)); ?>" alt="Slide Background Image" width="1920" height="1280">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption" data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['-45','-45','-20','0']" data-fontsize="['60', '50', '40', '30']"
                        data-lineheight="['60','60','60','60']" data-width="none" data-height="none"
                        data-transform_idle="o:1;"
                        data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-splitin="none" data-responsive_offset="on">
                        <div class="slide--headline text-center">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo $slide->title_en; ?>

                            <?php else: ?>
                            <?php echo $slide->title_ar; ?>

                            <?php endif; ?>

                        </div>
                    </div>

                    <!-- LAYER NR. 2 -->

                    <div class="tp-caption" data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['60','60','60','50']" data-fontsize="['16', '16', '16', '12']"
                        data-lineheight="['25','25','25','25']" data-width="none" data-height="none"
                        data-frames='[{"delay":1250,"speed":1500,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <?php if($slide->short_desc_ar): ?>
                        <div class="slide--bio text-center">
                            <?php if(App::getLocale() == 'ar'): ?>
                            <?php echo e($slide->short_desc_ar); ?>

                            <?php else: ?>
                            <?php echo e($slide->short_desc_en); ?>

                            <?php endif; ?>
                        </div>
                        <?php else: ?>
                        <div class="slide--bio text-center">
                            <?php if(App::getLocale() == 'ar'): ?>
                            <?php echo e(strip_tags($slide->description_ar)); ?>

                            <?php else: ?>
                            <?php echo e(strip_tags($slide->description_en)); ?>

                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- LAYER NR. 3 -->
                    <?php if($slide->link): ?>
                    <div class="tp-caption" data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['135','135','150','170']" data-width="none" data-height="none"
                        data-whitespace="nowrap"
                        data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                        data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <div class="slide-action">

                            <a class="btn btn--gradient btn--rounded" href="<?php echo e($slide->link); ?>">Invest Now!</a>

                        </div>
                    </div>
                    <?php endif; ?>
                </li>

                <?php
                if($i < 4){ $i++; }else{ $i=1; } ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </ul> </div> <!-- END REVOLUTION SLIDER -->
        </div>
        <!-- END OF SLIDER WRAPPER -->
</section>
<!-- #hero end -->
<!-- Featured #1
============================================= -->
<?php if(isset($services)): ?>
<section id="featured1" class="featured featured-1 pt-100">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Feature Card #1 -->
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="feature-card text-center">
                    <div class="feature-card-icon ">
                        <?php if($service->img): ?>
                        <i class="<?php echo e($service->img); ?>"></i>
                        <?php else: ?>
                        <i class="icon-presentation"></i>
                        <?php endif; ?>
                    </div>
                    <div class="feature-card-content text-center">
                        <h3 class="feature-card-title">
                            <?php if(App::getLocale() == 'ar'): ?>
                            <a href="<?php echo e(route('service',$service->slogen_en)); ?>"> <?php echo e($service->title_ar); ?> </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('service',$service->slogen_ar)); ?>"><?php echo e($service->title_en); ?></a>
                            <?php endif; ?>
                        </h3>
                        <p class="feature-card-desc">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo str_limit(strip_tags($service->description_en), $limit = 80, $end = '...'); ?>

                            <?php else: ?>
                            <?php echo str_limit(strip_tags($service->description_ar) , $limit = 80, $end = '...'); ?>

                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- .col-lg-3 end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- .row end -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                <a href="<?php echo e(url('services')); ?>" class="btn btn--gradient btn--rounded"><?php echo app('translator')->getFromJson('massege.All Services'); ?></a>
            </div>
            <!-- .col-lg-12 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #featured1 end -->
<?php endif; ?>


<!-- about  #1
    ============================================= -->
<section id="about1" class="about about-1 bg-gray pt-110 pb-50">
    <div class="container">
        <?php if(isset($about)): ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="heading">
                    <p class="heading--subtitle"><?php echo app('translator')->getFromJson('massege.All About Us'); ?></p>
                    <h2 class="heading--title">
                        <?php if(App::getLocale() == 'en'): ?>
                        <?php echo $about->title_en; ?>

                        <?php else: ?>
                        <?php echo $about->title_ar; ?>

                        <?php endif; ?>
                    </h2>
                </div>
                <div class="about--text">
                    <?php if(App::getLocale() == 'en'): ?>
                    <?php echo str_limit(strip_tags($about->description_en), $limit = 250, $end = '...'); ?>

                    <?php else: ?>
                    <?php echo str_limit(strip_tags($about->description_ar) , $limit = 250, $end = '...'); ?>

                    <?php endif; ?>
                </div>
                <a href="#" class="btn btn--secondary btn--rounded mb-30-xs mb-30-sm">More About Us</a>
            </div>
            <!-- .col-lg-6 end -->
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="about--img">
                    <img src="<?php echo e(asset($about->img)); ?>" alt="img" class="img-fluid">
                </div>
            </div>
            <!-- .col-lg-6 end -->
        </div>
        <?php endif; ?>
        <!-- .row end -->
        <div class="counter counter-1">
            <div class="row">
                <!-- count #1 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="count-box text-center">
                        <div class="counting"><?php echo e($videocount); ?></div>
                        <div class="count-title"><?php echo app('translator')->getFromJson('massege.Videos'); ?></div>
                    </div>
                </div>
                <!-- .col-md-3 end -->
                <!-- count #2 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="count-box text-center">
                        <div class="counting"><?php echo e($trainingcount); ?></div>
                        <div class="count-title"><?php echo app('translator')->getFromJson('massege.Training'); ?></div>
                    </div>
                </div>
                <!-- .col-md-3 end -->
                <!-- count #3 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="count-box text-center">
                        <div class="counting"><?php echo e($productcount); ?></div>
                        <div class="count-title"><?php echo app('translator')->getFromJson('massege.Products'); ?></div>
                    </div>
                </div>
                <!-- .col-md-3 end -->
                <!-- count #4 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="count-box text-center">
                        <div class="counting"><?php echo e($projectscount); ?></div>
                        <div class="count-title"><?php echo app('translator')->getFromJson('massege.Projects'); ?></div>
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
    <div class="bg-section"><img src="<?php echo e(asset('/')); ?>/assetfront/images/background/4.jpg" alt="background"></div>
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
                        <img src="<?php echo e(asset('/')); ?>/assetfront/images/video/2.jpg" alt="Background" />
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
                    <p class="heading--subtitle"><?php echo app('translator')->getFromJson('massege.Our Products'); ?></p>
                    <h2 class="heading--title"><?php echo app('translator')->getFromJson('massege.Products'); ?></h2>
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
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catefilter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li><a href="#" data-filter=".<?php echo e(str_replace(' ', '', $catefilter->name_en)); ?>">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo $catefilter->name_en; ?>

                            <?php else: ?>
                            <?php echo $catefilter->name_ar; ?>

                            <?php endif; ?>
                        </a></li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <!-- .gallery-filter end -->
        </div>
        <div id="gallery-all" class="row">

            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- gallery #1 -->
            <div class="col-12 col-md-4 col-lg-3 gallery-item <?php echo e(str_replace(' ', '', $pro_cat->category->name_en)); ?>">
                <div class="product-item">
                    <div class="product--img">
                        <img src="<?php echo e(asset($pro_cat->images->first()->img)); ?>" alt="Product" />
                        <div class="product--action">

                        </div>
                    </div><!-- .product-img end -->
                    <div class="product--content">
                        <div class="product--title">
                            <h3>
                                <?php if(app()->getLocale() == 'ar'): ?>
                                <a href="<?php echo e(route('product.name',$pro_cat->slogen_ar)); ?>"> <?php echo e($pro_cat->name_ar); ?> </a>
                                <?php else: ?>
                                <a href="<?php echo e(route('product.name',$pro_cat->slogen_en)); ?>"> <?php echo e($pro_cat->name_en); ?> </a>
                                <?php endif; ?>
                            </h3>
                        </div><!-- .product-title end -->

                    </div><!-- .product-bio end -->
                </div><!-- .product end -->
            </div><!-- . gallery-item end -->

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                    <h2 class="heading--title"><?php echo app('translator')->getFromJson('massege.Projects'); ?></h2>
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
                    <?php if(isset($projects)): ?>
                            <!-- Case #1 -->
                 <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projecthome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($x < 3): ?>
                    <div class="case-carousel-grid">
                        <div class="row">
                         
                            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                                <div class="case-item-container">
                                    <div class="case--img">
                                        <img src="<?php echo e(asset($projecthome->image)); ?>" alt="case Item">
                                        <div class="case--hover">
                                            <div class="case--action">
                                                <?php if(App::getLocale() == 'en'): ?>
                                                <a href="<?php echo e(route('Project',$projecthome->slogen_en)); ?>"></a>
                                                <?php else: ?>
                                                <a href="<?php echo e(route('Project',$projecthome->slogen_ar)); ?>"></a>
                                                <?php endif; ?></h4>

                                            </div>
                                            <!-- .case-action end -->
                                        </div>
                                        <!-- .case-hover end -->
                                    </div>
                                    <!-- .case-img end -->
                                    <div class="case--content">
                                        <?php if(isset($projecthome->tag_ar)): ?>
                                        <div class="case--cat">
                                            <?php $__currentLoopData = explode(',',$projecthome->tag_ar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="#">
                                                <?php echo e($tags_ar); ?>

                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php elseif(isset($projecthome->tag_en)): ?>
                                        <div class="case--cat">
                                            <?php $__currentLoopData = explode(',',$projecthome->tag_en); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_en): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="#">
                                                <?php echo e($tags_en); ?>

                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="case--title">
                                            <h4> <?php if(App::getLocale() == 'en'): ?>
                                                <a
                                                    href="<?php echo e(route('Project',$projecthome->slogen_en)); ?>"><?php echo e($projecthome->name_en); ?></a>
                                                <?php else: ?>
                                                <a href="<?php echo e(route('Project',$projecthome->slogen_ar)); ?>">
                                                    <?php echo e($projecthome->name_ar); ?></a>
                                                <?php endif; ?></h4>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                   <?php else: ?>
                    <div class="case-carousel-grid">
                        <div class="row">
                          
                        
                            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                                <div class="case-item-container">
                                    <div class="case--img">
                                        <img src="<?php echo e(asset($projecthome->image)); ?>" alt="case Item">
                                        <div class="case--hover">
                                            <div class="case--action">
                                                <?php if(App::getLocale() == 'en'): ?>
                                                <a href="<?php echo e(route('Project',$projecthome->slogen_en)); ?>"></a>
                                                <?php else: ?>
                                                <a href="<?php echo e(route('Project',$projecthome->slogen_ar)); ?>"></a>
                                                <?php endif; ?></h4>

                                            </div>
                                            <!-- .case-action end -->
                                        </div>
                                        <!-- .case-hover end -->
                                    </div>
                                    <!-- .case-img end -->
                                    <div class="case--content">
                                        <?php if(isset($projecthome->tag_ar)): ?>
                                        <div class="case--cat">
                                            <?php $__currentLoopData = explode(',',$projecthome->tag_ar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="#">
                                                <?php echo e($tags_ar); ?>

                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php elseif(isset($projecthome->tag_en)): ?>
                                        <div class="case--cat">
                                            <?php $__currentLoopData = explode(',',$projecthome->tag_en); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_en): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="#">
                                                <?php echo e($tags_en); ?>

                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="case--title">
                                            <h4> <?php if(App::getLocale() == 'en'): ?>
                                                <a
                                                    href="<?php echo e(route('Project',$projecthome->slogen_en)); ?>"><?php echo e($projecthome->name_en); ?></a>
                                                <?php else: ?>
                                                <a href="<?php echo e(route('Project',$projecthome->slogen_ar)); ?>">
                                                    <?php echo e($projecthome->name_ar); ?></a>
                                                <?php endif; ?></h4>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                    $x++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <a href="#">
                    <img src="<?php echo e(asset($brand->img)); ?>" class="img-responsive">
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- end brand -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>