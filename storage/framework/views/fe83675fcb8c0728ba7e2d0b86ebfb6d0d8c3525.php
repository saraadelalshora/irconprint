<?php $__env->startSection('meta'); ?>
<?php if(isset($category)): ?>
<?php if(app()->getLocale() == 'ar'): ?>

<title><?php echo e($category->name_ar); ?> </title>
<meta name="keywords" content="<?php echo e($category->tag_ar); ?>">
<?php else: ?>
<title><?php echo e($category->name_en); ?> </title>
<meta name="keywords" content="<?php echo e($category->tag_en); ?>">
<?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


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
                            <?php echo e($category->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($category->name_en); ?>

                            <?php endif; ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo app('translator')->getFromJson('massege.home'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php if(app()->getLocale() == 'ar'): ?>
                            <?php echo e($category->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($category->name_en); ?>

                            <?php endif; ?></li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->

<!-- Shop #4
============================================= -->
<section id="shop" class="shop bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <?php if($category->eshops->isEmpty() != true): ?>
                    <?php $__currentLoopData = $category->eshops()->paginate(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Product #1 -->
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="product-item">
                            <div class="product--img">
                                <img src="<?php echo e(asset($categoryproduct->images->first()->img)); ?>" alt="Product" />
                                <div class="product--action">
                                <?php if(app()->getLocale() == 'ar'): ?>
                                        <a href="<?php echo e(route('productshop.name',$categoryproduct->slogen_ar)); ?>">
                                            </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('productshop.name',$categoryproduct->slogen_en)); ?>">
                                           </a>
                                        <?php endif; ?>
                                </div>
                            </div><!-- .product-img end -->
                            <div class="product--content">
                                <div class="product--title">
                                    <h3> <?php if(app()->getLocale() == 'ar'): ?>
                                        <a href="<?php echo e(route('productshop.name',$categoryproduct->slogen_ar)); ?>">
                                            <?php echo e($categoryproduct->name_ar); ?> </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('productshop.name',$categoryproduct->slogen_en)); ?>">
                                            <?php echo e($categoryproduct->name_en); ?> </a>
                                        <?php endif; ?></h3>
                                </div><!-- .product-title end -->

                            </div><!-- .product-bio end -->
                        </div><!-- .product end -->
                    </div><!-- .col-md-3 end -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div><!-- .row end -->
                <div class="row">
                    <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                        <ul class="pagination mt-20">
                            <?php echo $category->eshops()->paginate(15)->appends(request()->except('page'))->links(); ?>

                        </ul>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <?php else: ?>
                <div class=" col-md-12 case-item filter-customer filter-tips">
                    <div class="text-center">
                        <h2 style="color:#830C0C;"><?php echo e(trans('massege.notfoundproduct')); ?></h2>
                    </div>
                </div>
                <?php endif; ?>


                <!-- .col-md-12 end -->
                <!-- </div> -->
                <!-- .row end -->
            </div>
            <!-- .col-md-9 end -->
           
            <!-- .col-md-3 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #shop end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>