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
<?php if($category->subcategories->isEmpty() != true): ?>
<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
            <div class="title--heading">
                        <h1><?php echo app('translator')->getFromJson('massege.subcategory'); ?></h1>
                    </div>
            <div class="row">
            <!-- Case #1 -->
            <?php if($category->subcategories->isEmpty() != true): ?>
            <?php $__currentLoopData = $category->subcategories()->paginate(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="<?php echo e(asset($subcategory->image)); ?>" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                            <?php if(app()->getLocale() == 'ar'): ?>
                               <a href="<?php echo e(route('Subcategory.products',$subcategory->slogen_ar)); ?>" alt="<?php echo e($subcategory->name_ar); ?>">  </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('Subcategory.products',$subcategory->slogen_en)); ?>" alt="<?php echo e($subcategory->name_en); ?>">  </a>
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
                               <a href="<?php echo e(route('Subcategory.products',$subcategory->slogen_ar)); ?>"> <?php echo e($subcategory->name_ar); ?> </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('Subcategory.products',$subcategory->slogen_en)); ?>"> <?php echo e($subcategory->name_en); ?> </a>
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
                <?php echo $category->subcategories()->paginate(15)->appends(request()->except('page'))->links(); ?> 
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
                        <h1><?php echo app('translator')->getFromJson('massege.Products'); ?></h1>
                    </div>
            <div class="row">
            <!-- Case #1 -->
            <?php if($category->products->isEmpty() != true): ?>
            <?php $__currentLoopData = $category->products()->paginate(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="<?php echo e(asset($categoryproduct->images->first()->img)); ?>" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                            <?php if(app()->getLocale() == 'ar'): ?>
                               <a href="<?php echo e(route('product.name',$categoryproduct->slogen_ar)); ?>" alt="<?php echo e($categoryproduct->name_ar); ?>">  </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('product.name',$categoryproduct->slogen_en)); ?>" alt="<?php echo e($categoryproduct->name_en); ?>">  </a>
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
                               <a href="<?php echo e(route('product.name',$categoryproduct->slogen_ar)); ?>"> <?php echo e($categoryproduct->name_ar); ?> </a>
                            <?php else: ?>
                               <a href="<?php echo e(route('product.name',$categoryproduct->slogen_en)); ?>"> <?php echo e($categoryproduct->name_en); ?> </a>
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
                <?php echo $category->products()->paginate(15)->appends(request()->except('page'))->links(); ?> 
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