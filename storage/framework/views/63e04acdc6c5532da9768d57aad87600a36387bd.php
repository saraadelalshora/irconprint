<?php $__env->startSection('meta'); ?>
<?php if(app()->getLocale() == 'ar'): ?>
<title><?php echo e($training->name_ar); ?> </title>
<meta name="keywords" content="<?php echo e($training->tag_ar); ?>">
<?php else: ?>
<title> <?php echo e($training->name_en); ?> </title>
<meta name="keywords" content="<?php echo e($training->tag_en); ?>">
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- start content page -->
<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="<?php echo e(asset('/')); ?>/assetfront/images/sliders/slide-bg/8.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1><?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo e($training->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($training->name_en); ?>

                            <?php endif; ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo e($training->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($training->name_en); ?>

                            <?php endif; ?></li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->

<section id="services-single" class="services services-single">
        <div class="container">
            <div class="row">
                <?php if(isset($all_training)): ?>
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <!-- Categories
    ============================================= -->
                    <div class="widget widget-categories">
                        <div class="widget-content">
                            <ul class="list-unstyled">
                            <?php $__currentLoopData = $all_training; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_train): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($related_train->id != $training->id): ?>
                                <li>
                                <?php if(app()->getLocale() == 'ar'): ?>
                               <a href="<?php echo e(route('training.name',$related_train->slogen_ar)); ?>"> <?php echo e($related_train->name_ar); ?> </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('training.name',$related_train->slogen_en)); ?>"> <?php echo e($related_train->name_en); ?> </a>
                            <?php endif; ?>
                          
                                </li>
                                <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                                 
                            </ul>
                        </div>
                    </div>
               <?php endif; ?>
                    <!-- Info
    ============================================= -->
                </div><!-- .col-lg-3 end -->
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-60">
                            <div class="chart--img">
                                <!-- "public/".str_replace("small","larg",$manufact->img) -->
                                <img src="<?php echo e(asset($training->image)); ?>" alt="chart" class="img-fluid">
                            </div>
                            <div class="case--cat ">
                            <ul class="list-inline">
                            <li> <i class="far fa-calendar-alt"></i> <span><?php echo app('translator')->getFromJson('massege.starts'); ?> <?php echo e(\Carbon\Carbon::parse($training->course_date)->format('d M  Y')); ?></span></li>
                                <li class="ml-30"> <i class="far fa-clock"></i> <span><?php echo e($training->course_hour); ?> <?php echo app('translator')->getFromJson('massege.hour'); ?></span> </li>
                            </ul>

                        </div>
                            <!-- .chart-img end -->
                        </div>
                        <!-- .col-lg-12 end -->

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="services--text">
                                <h3><?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo e($training->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($training->name_en); ?>

                            <?php endif; ?></h3>
                               

                            </div>
                            <!-- .services-text end -->
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="services--text">
                                       <?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo $training->description_ar; ?>

                            <?php else: ?>
                            <?php echo $training->description_en; ?>

                            <?php endif; ?>
                                    </div>
                                    <!-- .services-text end -->
                                </div>
                        </div>
                        <!-- .col-lg-12 end -->
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-45">
                            <?php if($training->video != null): ?>
                                <div class="video--content text-center">
                                    <div class="bg-section">
                                        <img src="<?php echo e(asset('/')); ?>/assetfront/assets/images/video/1.jpg" alt="Background" />
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
                                <?php endif; ?>
                                <!-- .video-content end -->
                            </div>
                           
                            <!-- .col-lg-12 end -->
                                <!-- .col-lg-12 end -->
                    </div>
                </div>
                <!-- .col-lg-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>