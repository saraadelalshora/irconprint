<?php $__env->startSection('meta'); ?>
<?php if(isset($category)): ?>
<?php if(app()->getLocale() == 'ar'): ?>

<title><?php echo e($category->name_ar); ?> </title>
<meta name="keywords" content="<?php echo e($category->tag_ar); ?>">
<?php else: ?>
<title><?php echo e($category->name_en); ?> </title>
<meta name="keywords" content="<?php echo e($category->tag_en); ?>">
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

<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
            <div class="title--heading">
                        <h1><?php echo app('translator')->getFromJson('massege.Products'); ?></h1>
                    </div>
            <div class="row">
            <!-- Case #1 -->
            <?php if($category->trainings->isEmpty() != true): ?>
            <?php $__currentLoopData = $category->trainings()->paginate(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorytraining): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="<?php echo e(asset($categorytraining->image)); ?>" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                            <?php if(app()->getLocale() == 'ar'): ?>
                               <a href="<?php echo e(route('training.name',$categorytraining->slogen_ar)); ?>" alt="<?php echo e($categorytraining->name_ar); ?>">  </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('training.name',$categorytraining->slogen_en)); ?>" alt="<?php echo e($categorytraining->name_en); ?>">  </a>
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
                               <a href="<?php echo e(route('training.name',$categorytraining->slogen_ar)); ?>"> <?php echo e($categorytraining->name_ar); ?> </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('training.name',$categorytraining->slogen_en)); ?>"> <?php echo e($categorytraining->name_en); ?> </a>
                            <?php endif; ?>
                                 
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- . case-item end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        <div class="row">
            <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                <ul class="pagination mt-20">
                <?php echo $category->trainings()->paginate(15)->appends(request()->except('page'))->links(); ?> 
                </ul>
            </div>
            <!-- .col-md-12 end -->
        </div>
          <?php else: ?>
          <div class=" col-md-12 case-item filter-customer filter-tips">
                <div class="text-center">
                    <h2 style="color:#830C0C;"><?php echo e(trans('massege.notfoundtraining')); ?></h2>
                </div>
          </div>
          <?php endif; ?>
        </div>
        <!-- .row end -->
      
      
    </div>
    <!-- .container end -->
</section>
<!-- #case carousel end -->
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>