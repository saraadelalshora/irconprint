<?php $__env->startSection('meta'); ?>
<?php if(app()->getLocale() == 'ar'): ?>
<title><?php echo e($projects->name_ar); ?> </title>
<meta name="description" content="<?php echo e($projects->description_ar); ?>">
<meta name="keywords" content="<?php echo e($projects->tag_ar); ?>">

<?php else: ?>
<title><?php echo e($projects->name_en); ?> </title>
<meta name="description" content="<?php echo e($projects->description_en); ?>">
<meta name="keywords" content="<?php echo e($projects->tag_en); ?>">

<?php endif; ?>
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
                        <h1>  <?php if(App::getLocale() == 'en'): ?>
                            <?php echo e($projects->name_ar); ?>

                            <?php else: ?>
                            <?php echo e($projects->name_en); ?>

                            <?php endif; ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('projects')); ?>"><?php echo app('translator')->getFromJson('massege.Projects'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo e($projects->name_en); ?>

                            <?php else: ?>
                            <?php echo e($projects->name_ar); ?>

                            <?php endif; ?>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


<!-- case-study #2
============================================= -->
<section id="case-study-single" class="case-study case-study-single">
        <div class="container">
            <div class="row justify-content-center">
               
                <div class="col-sm-12 col-md-12 col-lg-9 ">
                    <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="chart--img">
                                            <img src="<?php echo e(asset($projects->image)); ?>" alt="chart" class="img-fluid">
                                        </div>
                                   
                                    <!-- .chart-img end -->
                                </div>
                                <!-- .col-lg-12 end -->
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="case--study-text">
                                <h3> </h3>
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo $projects->description_en; ?>

                            <?php else: ?>
                            <?php echo $projects->description_ar; ?>

                            <?php endif; ?>
                            </div>
                            <!-- .case-study-text end -->
                        </div>

                        <!-- .col-lg-12 end -->
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="accordion accordion-1 mb-50" id="accordion01">
                                <!-- Panel 01 -->
                                <?php if(isset($projects->tag_ar)): ?>
                               <?php $__currentLoopData = explode(',',$projects->tag_ar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="card">
                                    <div class="card-heading">
                                        <a class="card-link collapsed" data-toggle="collapse" data-parent="#accordion01" href="#collapse01-1"><?php echo e($tags_ar); ?></a>
                                    </div>
                                    <div id="collapse01-1" class="collapse" data-parent="#accordion01">
                                        <div class="card-body"><?php echo e($projects->tag_ar); ?></div>
                                    </div>
                                </div>
                                
                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        <?php elseif(isset($projects->tag_en)): ?>
                       
                            <?php $__currentLoopData = explode(',',$projects->tag_en); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_en): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="card">
                                    <div class="card-heading">
                                        <a class="card-link collapsed" data-toggle="collapse" data-parent="#accordion01" href="#collapse01-1"><?php echo e($tags_en); ?></a>
                                    </div>
                                    <div id="collapse01-1" class="collapse" data-parent="#accordion01">
                                        <div class="card-body"><?php echo e($projects->tag_en); ?></div>
                                    </div>
                                </div>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                               
                              
                            </div>
                            <!-- End .Accordion-->
                        </div>
                        <!-- .col-lg-12 end -->
                       
                    </div>
                </div>
                <!-- .col-md-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #case-study-single end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>