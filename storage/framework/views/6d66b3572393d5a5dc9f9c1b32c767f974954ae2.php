<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
        <div class="bg-section">
            <img src="<?php echo e(asset('/')); ?>/assetfront/images/sliders/slide-bg/8.jpg" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                    <div class="title title-6 text-center">
                        <div class="title--heading">
                            <h1> <?php if(App::getLocale() == 'en'): ?>
                        <?php echo e($lands->name_en); ?>

                        <?php else: ?>
                        <?php echo e($lands->name_ar); ?>

                        <?php endif; ?></h1>
                        </div>
                        <div class="clearfix"></div>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">  
                                 <?php if(App::getLocale() == 'en'): ?>
                        <?php echo e($lands->name_en); ?>

                        <?php else: ?>
                        <?php echo e($lands->name_ar); ?>

                        <?php endif; ?></li>
                        </ol>
                    </div><!-- .title end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section><!-- #page-title end -->


    <!-- about  #1
    ============================================= -->
    <section id="about1" class="about about-1  pt-110 pb-50">
        <div class="container">
            <div class="row">
            <?php if($lands->image): ?>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="heading">
                        <!-- <p class="heading--subtitle">

                        </p> -->
                        <h2 class="heading--title"><?php if(App::getLocale() == 'en'): ?>
                        <?php echo e($lands->name_en); ?>

                        <?php else: ?>
                        <?php echo e($lands->name_ar); ?>

                        <?php endif; ?></h2>
                    </div>
                    <div class="about--text">
                       <?php if(App::getLocale() == 'en'): ?>
                        <?php echo $lands->description_en; ?>

                        <?php else: ?>
                        <?php echo $lands->description_ar; ?>

                        <?php endif; ?>
                    </div>
                    <!-- <a href="#" class="btn btn--secondary btn--rounded mb-30-xs mb-30-sm">More About Us</a> -->
                </div>
                <!-- .col-lg-6 end -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about--img">
                        <img src="<?php echo e(asset($lands->image)); ?>" alt="img" class="img-fluid">
                    </div>
                </div>
                <!-- .col-lg-6 end -->
                <?php else: ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="heading">
                    <h2 class="heading--title"><?php if(App::getLocale() == 'en'): ?>
                        <?php echo e($lands->name_en); ?>

                        <?php else: ?>
                        <?php echo e($lands->name_ar); ?>

                        <?php endif; ?></h2>
                    </div>
                    <div class="about--text">
                       <?php if(App::getLocale() == 'en'): ?>
                        <?php echo $lands->description_en; ?>

                        <?php else: ?>
                        <?php echo $lands->description_ar; ?>

                        <?php endif; ?>
                    </div>
                    <!-- <a href="#" class="btn btn--secondary btn--rounded mb-30-xs mb-30-sm">More About Us</a> -->
                </div>
              <?php endif; ?>
            </div>
        </div>
        <!-- .container end -->
    </section>
    <!-- #about1 end -->

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>