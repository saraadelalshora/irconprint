<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $land; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="<?php echo e(asset('/')); ?>/assetfront/images/sliders/slide-bg/8.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1> <?php if(App::getLocale() == 'en'): ?>
                            <?php echo e($lands->title_en); ?>

                            <?php else: ?>
                            <?php echo e($lands->title_ar); ?>

                            <?php endif; ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo e($lands->title_en); ?>

                            <?php else: ?>
                            <?php echo e($lands->title_ar); ?>

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
            <?php if($lands->img): ?>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="heading">
                    <!-- <p class="heading--subtitle">

                        </p> -->
                    <h2 class="heading--title"><?php if(App::getLocale() == 'en'): ?>
                        <?php echo e($lands->title_en); ?>

                        <?php else: ?>
                        <?php echo e($lands->title_ar); ?>

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
                    <img src="<?php echo e(asset($lands->img)); ?>" alt="img" class="img-fluid">
                </div>
            </div>
            <!-- .col-lg-6 end -->
            <?php else: ?>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="heading">
                    <h2 class="heading--title"><?php if(App::getLocale() == 'en'): ?>
                        <?php echo e($lands->title_en); ?>

                        <?php else: ?>
                        <?php echo e($lands->title_ar); ?>

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

<?php if(Request::is('about')): ?>
<!-- Blog Grid
======================================= -->
<?php if($lands->sections->isEmpty() != true): ?>

<section id="blog" class="blog blog-grid pb-60 bg-gray">
    <div class="container">
        <div class="row ">

        </div>
        <!-- .row end -->
        <div class="row">
            <?php $__currentLoopData = $lands->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Blog Entry #1 -->
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="blog-entry">
                    <div class="entry--img">
                        <a href="<?php echo e(route('section',$section->slogen_en)); ?>">
                            <img src="<?php echo e(asset($section->image)); ?>" alt="entry image" />
                        </a>
                    </div>
                    <!-- .entry-img end -->
                    <div class="entry--content">
                        <div class="entry--title">
                            <?php if(App::getLocale() == 'en'): ?>
                            <h4><a href="<?php echo e(route('section',$section->slogen_en)); ?>">
                                    <?php echo e($section->name_en); ?>

                                </a></h4>
                            <?php else: ?>
                            <h4><a href="<?php echo e(route('section',$section->slogen_ar)); ?>">
                                    <?php echo e($section->name_ar); ?>

                                </a></h4>
                            <?php endif; ?>
                        </div>
                        <div class="entry--date">

                        </div>
                        <div class="entry--bio">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo str_limit(strip_tags($section->description_en), $limit = 100, $end = '...'); ?>

                            <?php else: ?>
                            <?php echo str_limit(strip_tags($section->description_ar) , $limit = 100, $end = '...'); ?>

                            <?php endif; ?>

                        </div>
                    <div class="entry--more">
                            <?php if(App::getLocale() == 'en'): ?>
                            <a href="<?php echo e(route('section',$section->slogen_en)); ?>"><i
                                    class="fa fa-plus"></i><?php echo app('translator')->getFromJson('massege.Read More'); ?></a>
                            <?php else: ?>
                            <a href="<?php echo e(route('section',$section->slogen_ar)); ?>"><i
                                    class="fa fa-plus"></i><?php echo app('translator')->getFromJson('massege.Read More'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- .entry-content end -->
                </div>
                <!-- .blog-entry end -->
            </div>
            <!-- .col-md-4 end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #blog end -->


<?php endif; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>