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

<?php if($category->subtwocategories->isEmpty() != true): ?>
<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
            <div class="title--heading">
                        <h1><?php echo app('translator')->getFromJson('massege.subcategory'); ?></h1>
                    </div>
            <div class="row">
            <!-- Case #1 -->
            <?php if($category->subtwocategories->isEmpty() != true): ?>
            <?php $__currentLoopData = $category->subtwocategories()->paginate(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="<?php echo e(asset($subcategory->image)); ?>" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                            <?php if(app()->getLocale() == 'ar'): ?>
                               <a href="<?php echo e(route('Subcategorytwo.Videos',$subcategory->slogen_ar)); ?>" alt="<?php echo e($subcategory->name_ar); ?>">  </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('Subcategorytwo.Videos',$subcategory->slogen_en)); ?>" alt="<?php echo e($subcategory->name_en); ?>">  </a>
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
                               <a href="<?php echo e(route('Subcategorytwo.Videos',$subcategory->slogen_ar)); ?>"> <?php echo e($subcategory->name_ar); ?> </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('Subcategorytwo.Videos',$subcategory->slogen_en)); ?>"> <?php echo e($subcategory->name_en); ?> </a>
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
                <?php echo $category->subtwocategories()->paginate(15)->appends(request()->except('page'))->links(); ?> 
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
<!-- #case carousel end -->
<?php else: ?>

<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
        <div class="title--heading">
            <h1><?php echo app('translator')->getFromJson('massege.Video'); ?></h1>
        </div>
        <div class="row">
            <!-- Case #1 -->
            <?php if($category->videos->isEmpty() != true): ?>
            <?php $__currentLoopData = $category->videos()->paginate(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryvideo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-md-4 col-lg-4 mb-45">
                <div class="video--content text-center "
                    style="background-image: url(<?php echo e(asset('/')); ?>/assetfront/images/video/1.jpg);">

                    <div class="video--button">
                        <div class="video-overlay">
                            <div class="pos-vertical-center">
                                <a class="popup-video" >
                                    
                                            <span class="btn--animation"></span>
                                            <i class="fa fa-play"></i>
                                         </a>
                               
                                <video  controls>
                                    <source src="<?php echo e(asset($categoryvideo->image)); ?>" >
                                   
                                </video>
                              

                            </div>
                            <!-- .video-player end -->
                        </div>
                    </div>
                </div>
                <!-- .video-content end -->
            </div>
            <!-- . case-item end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="row">
                <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                    <ul class="pagination mt-20">
                        <?php echo $category->videos()->paginate(15)->appends(request()->except('page'))->links(); ?>

                    </ul>
                </div>
                <!-- .col-md-12 end -->
            </div>
            <?php else: ?>
            <div class=" col-md-12 case-item filter-customer filter-tips">
                <div class="text-center">
                    <h2 style="color:#830C0C;"><?php echo e(trans('massege.notfoundVideo')); ?></h2>
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
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>