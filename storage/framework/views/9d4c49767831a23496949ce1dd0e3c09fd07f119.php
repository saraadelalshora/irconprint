<?php $__env->startSection('meta'); ?>
<?php if(app()->getLocale() == 'ar'): ?>
<title><?php echo e($product->name_ar); ?> </title>
<meta name="keywords" content="<?php echo e($product->tag_ar); ?>">
<?php else: ?>
<title> <?php echo e($product->name_en); ?> </title>
<meta name="keywords" content="<?php echo e($product->tag_en); ?>">
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
                            <?php echo e($product->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($product->name_en); ?>

                            <?php endif; ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo e($product->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($product->name_en); ?>

                            <?php endif; ?></li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->
<!-- Shop
============================================= -->
<section id="shop" class="shop single-product bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <?php if($product->images->isEmpty() != true): ?>
                <div class="xzoom-container">
                    <img class="xzoom" id="xzoom-default" src="<?php echo e(asset($product->images->first()->img)); ?>" />
                    <div class="xzoom-thumbs">
                        <div class=" owl-carousel owl-theme owl-xzoom">
                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <a href="<?php echo e(asset($pro_img->img)); ?>">
                                    <img class="xzoom-gallery" src="<?php echo e(asset($pro_img->img)); ?>"
                                        xpreview="<?php echo e(asset($pro_img->img)); ?>" title="<?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo e($product->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($product->name_en); ?>

                            <?php endif; ?>">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- .col-lg-9 end -->
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="product-title">
                    <h3><?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo e($product->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($product->name_en); ?>

                            <?php endif; ?></h3>
                </div><!-- .product-title end -->
            
                <div class="product-desc">
                <?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo $product->description_ar; ?>

                            <?php else: ?>
                            <?php echo $product->description_en; ?>

                            <?php endif; ?>
                </div>
                <!-- .product-desc end -->
                <div class="product-details">
                    <h5><?php echo app('translator')->getFromJson('massege.Other Details'); ?> :</h5>
                    <ul class="list-unstyled">
                    
                        <li><?php echo app('translator')->getFromJson('massege.Code'); ?> : <span>#<?php echo e($product->code); ?></span></li>
                        <li><?php echo app('translator')->getFromJson('massege.Availabiltity'); ?> :<span>
                        <?php if($product->availbale == '1'): ?>
                        <?php echo app('translator')->getFromJson('massege.Yes'); ?>
                        <?php else: ?>
                        <?php echo app('translator')->getFromJson('massage.No'); ?>
                        <?php endif; ?>
                       </span></li>
                        <li><?php echo app('translator')->getFromJson('massege.Brand'); ?> : <span>
                              <?php if(app()->getLocale() == 'ar'): ?>
                               <?php echo e($product->manufactor->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($product->manufactor->name_en); ?>

                             <?php endif; ?>
                    </span></li>
                    </ul>
                </div><!-- .product-details end -->
                <!-- <div class="product-share">
                    <h5 class="share-title">share product: </h5>
                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                </div> -->
                <!-- .product-share end -->
            </div>
            <!-- .col-lg-3 end -->
        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->
</section>
<!-- #shop end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>