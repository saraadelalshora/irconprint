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
                        <h1><?php echo app('translator')->getFromJson('massege.services'); ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo app('translator')->getFromJson('massege.services'); ?></li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


<!-- Featured #1
============================================= -->
<section id="featured1" class="featured featured-1 pb-60 text-center">
        <div class="container">
            <div class="row">
                <?php if(isset($services)): ?>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Feature Card #1 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                             <?php if($i==1): ?>
                            <i class="icon-presentation"></i>
                              <?php elseif($i==2): ?>
                              <i class="icon-search"></i>
                              <?php elseif($i==3): ?>
                              <i class="icon-piechart"></i>
                              <?php elseif($i==4): ?>
                            <i class="icon-map"></i>
                            <?php endif; ?>
                        </div>
                        <div class="feature-card-content">
                            <h3 class="feature-card-title">
                                 <?php if(App::getLocale() == 'en'): ?>
                            <a href="<?php echo e(route('service',$service1->slogen_en)); ?>">
                                    <?php echo e($service1->title_en); ?>

                                </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('service',$service1->slogen_ar)); ?>">
                                    <?php echo e($service1->title_ar); ?>

                                </a>
                            <?php endif; ?>
                            </h3>
                           <?php if(App::getLocale() == 'en'): ?>
                            <?php echo str_limit(strip_tags($service1->description_en), $limit = 100, $end = '...'); ?>

                            <?php else: ?>
                            <?php echo str_limit(strip_tags($service1->description_ar) , $limit = 100, $end = '...'); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- .col-lg-4 end -->
                <?php $i++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class=" col-md-12 case-item filter-customer filter-tips">
                <div class="text-center">
                    <h2 style="color:#830C0C;"><?php echo e(trans('massege.notfoundservice')); ?></h2>
                </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #featured1 end -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>