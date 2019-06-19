<?php $__env->startSection('meta'); ?>
<title><?php echo e($setting->store_name_ar); ?></title>
<meta name="description" content="<?php echo e($setting->meta_description_ar); ?>">
<meta name="keywords" content="<?php echo e($setting->meta_tags); ?>">

<meta name="author" content="<?php echo e($setting->meta_title); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- start slider -->
    <section class="main-slider p-30">
        <div class="container">
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="owl-carousel owl-theme owl-main">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img  src="<?php echo e(asset($slide->img)); ?>"  <?php if(App::getLocale() == 'ar'): ?> alt="<?php echo e($slide->title_ar); ?>" <?php else: ?> alt="<?php echo e($slide->title_en); ?>" <?php endif; ?> class="img-responsive">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
         
        </div>
    </section>
    <!-- end slider -->
    <!-- start status -->
    <section class="status">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="status-info">
                        <div class="st-icon"><i class="fas fa-shipping-fast"></i> </div>
                        <div class="st-dec">
                            <h4><?php echo app('translator')->getFromJson('massege.Free shipping & return'); ?></h4>
                            <p> <?php echo app('translator')->getFromJson('massege.Shipping to all governorates of Egypt and Arab countries'); ?>.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="status-info">
                        <div class="st-icon"><i class="far fa-money-bill-alt"></i> </div>
                        <div class="st-dec">
                            <h4><?php echo app('translator')->getFromJson('massege.Payment on receipt'); ?></h4>
                            <p><?php echo app('translator')->getFromJson('massege.  You can pay when you receive your order'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="status-info ls-status">
                        <div class="st-icon"><i class="far fa-life-ring"></i> </div>
                        <div class="st-dec">
                            <h4><?php echo app('translator')->getFromJson('massege.24/7 online support'); ?></h4>
                            <p> <?php echo app('translator')->getFromJson('massege.24/7 Technical Support'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
   
    <!-- start brand -->
    <section class="brand p-t-30">
        <div class="container">

            <div class="owl-carousel owl-theme owl-brand p-30">
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <a href="#">
                        <img  src="<?php echo e(asset($brand->img)); ?>" class="img-responsive">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- end brand -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>