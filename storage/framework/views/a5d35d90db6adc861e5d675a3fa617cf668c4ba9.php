<?php $__env->startSection('meta'); ?>

<title><?php echo app('translator')->getFromJson('massege.All Video Categories'); ?></title>


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
                        <h1><?php echo app('translator')->getFromJson('massege.All Video Categories'); ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->getFromJson('massege.All Video Categories'); ?></li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->

<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
        <div class="title--heading">
            <h1><?php echo app('translator')->getFromJson('massege.All Video Categories'); ?></h1>
        </div>
        <div class="row">
            <!-- Case #1 -->
            <?php if(isset($all_Video)): ?>
            <?php $__currentLoopData = $all_Video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="<?php echo e(asset($category->image)); ?>" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                                <?php if(app()->getLocale() == 'ar'): ?>
                                <a href="<?php echo e(route('category.Videos',$category->slogen_ar)); ?>"
                                    alt="<?php echo e($category->name_ar); ?>"> </a>
                                <?php else: ?>
                                <a href="<?php echo e(route('category.Videos',$category->slogen_en)); ?>"
                                    alt="<?php echo e($category->name_en); ?>"> </a>
                                <?php endif; ?>
                            </div>
                            <!-- .case-action end -->
                        </div>
                        <!-- .case-hover end -->
                    </div>
                    <!-- .case-img end -->
                    <div class="case--content">

                        <div class="case--title">
                            <h4>
                                <?php if(app()->getLocale() == 'ar'): ?>
                                <a href="<?php echo e(route('category.Videos',$category->slogen_ar)); ?>">
                                    <?php echo e($category->name_ar); ?> </a>
                                <?php else: ?>
                                <a href="<?php echo e(route('category.Videos',$category->slogen_en)); ?>">
                                    <?php echo e($category->name_en); ?> </a>
                                <?php endif; ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- . case-item end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                <ul class="pagination mt-20">
                    <?php echo $all_Video->appends(request()->except('page'))->links(); ?>

                </ul>
            </div>
            <!-- .col-md-12 end -->
            <?php else: ?>
            <div class=" col-md-12 case-item filter-customer filter-tips">
                <div class="text-center">
                    <h2 style="color:#830C0C;"><?php echo e(trans('massege.notfoundcategory')); ?></h2>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>