<?php $__env->startSection('meta'); ?>

<title><?php echo app('translator')->getFromJson('massege.Projects'); ?></title>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="<?php echo e(asset('/')); ?>/assetfront/images/sliders/slide-bg/8.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1><?php echo app('translator')->getFromJson('massege.Projects'); ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo app('translator')->getFromJson('massege.Projects'); ?></li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">

        <div class="row">
            <?php if($projects->isEmpty() != true): ?>
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Case #1 -->
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="<?php echo e(asset($lands->image)); ?>" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                                <a href="#" title="case Item"></a>
                            </div>
                            <!-- .case-action end -->
                        </div>
                        <!-- .case-hover end -->
                    </div>
                    <!-- .case-img end -->
                    <div class="case--content">
                        <?php if(isset($lands->tag_ar)): ?>
                        <div class="case--cat">
                            <?php $__currentLoopData = explode(',',$lands->tag_ar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#">
                                <?php echo e($tags_ar); ?>

                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php elseif(isset($lands->tag_en)): ?>
                        <div class="case--cat">
                            <?php $__currentLoopData = explode(',',$lands->tag_en); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_en): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#">
                                <?php echo e($tags_en); ?>

                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                       
                        <div class="case--title">
                            <h4><?php if(App::getLocale() == 'en'): ?>
                            <a href="<?php echo e(route('Project',$lands->slogen_en)); ?>"><?php echo e($lands->name_en); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('Project',$lands->slogen_ar)); ?>"> <?php echo e($lands->name_ar); ?></a>
                                    <?php endif; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- . case-item end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class=" col-md-12 case-item filter-customer filter-tips">
                <div class="text-center">
                    <h2 style="color:#830C0C;"><?php echo e(trans('massege.notfoundproject')); ?></h2>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->
</section>
<!-- #case carousel end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>