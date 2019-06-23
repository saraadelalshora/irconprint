<?php $__env->startSection('meta'); ?>
<?php if(app()->getLocale() == 'ar'): ?>
<title><?php echo e($servicedetails->title_ar); ?> </title>


<?php else: ?>
<title><?php echo e($servicedetails->title_en); ?> </title>

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
                            <?php echo e($servicedetails->title_ar); ?>

                            <?php else: ?>
                            <?php echo e($servicedetails->title_en); ?>

                            <?php endif; ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('services')); ?>"><?php echo app('translator')->getFromJson('massege.services'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo e($servicedetails->title_en); ?>

                            <?php else: ?>
                            <?php echo e($servicedetails->title_ar); ?>

                            <?php endif; ?>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


    <!-- Services #2============================================= -->
    <section id="services-single" class="services services-single">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <!-- Categories
      ============================================= -->
                    <div class="widget widget-categories">
                        <div class="widget-content">
                            <ul class="list-unstyled">
                            <li class="active"><a href="<?php echo e(url('services')); ?>"><?php echo app('translator')->getFromJson('massege.All services'); ?></a></li>
                                <?php if(isset($serviceslist)): ?>
                                <?php $__currentLoopData = $serviceslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($servicedetails->id != $list->id): ?>
                                <li>
                                       <?php if(App::getLocale() == 'en'): ?>
                                        <a href="<?php echo e(route('service',$list->slogen_en)); ?>"><?php echo e($list->title_en); ?> </a>
                                         <?php else: ?>
                                         <a href="<?php echo e(route('service',$list->slogen_ar)); ?>"><?php echo e($list->title_ar); ?> </a>
                                          <?php endif; ?>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Info ============================================= -->
                </div><!-- .col-lg-3 end -->
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-60">
                            <div class="chart--img">
                                <img src="<?php echo e(asset('/')); ?>/assetfront/images/shop/full/11.jpg" alt="chart" class="img-fluid">
                            </div>
                            <!-- .chart-img end -->
                        </div>
                        <!-- .col-lg-12 end -->

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="services--text">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo $servicedetails->description_en; ?>

                            <?php else: ?>
                            <?php echo $servicedetails->description_ar; ?>

                            <?php endif; ?>
                            </div>
                            <!-- .services-text end -->
                        </div>
                        <!-- .col-lg-12 end -->


                        <div class="col-sm-12 col-md-12 col-md-12">
                            <div class="services--text mb-25">
                                <h3> </h3>
                            </div>
                            <div class="accordion accordion-1 mb-60" id="accordion01">
                            <?php if(isset($servicedetails->tag_ar)): ?>
                               <?php $__currentLoopData = explode(',',$servicedetails->tag_ar); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="card">
                                    <div class="card-heading">
                                        <a class="card-link collapsed" data-toggle="collapse" data-parent="#accordion01" href="#collapse01-1"><?php echo e($tags_ar); ?></a>
                                    </div>
                                    <div id="collapse01-1" class="collapse" data-parent="#accordion01">
                                        <div class="card-body"><?php echo e($servicedetails->tag_ar); ?></div>
                                    </div>
                                </div>
                                
                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        <?php elseif(isset($servicedetails->tag_en)): ?>
                       
                            <?php $__currentLoopData = explode(',',$servicedetails->tag_en); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags_en): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="card">
                                    <div class="card-heading">
                                        <a class="card-link collapsed" data-toggle="collapse" data-parent="#accordion01" href="#collapse01-1"><?php echo e($tags_en); ?></a>
                                    </div>
                                    <div id="collapse01-1" class="collapse" data-parent="#accordion01">
                                        <div class="card-body"><?php echo e($servicedetails->tag_en); ?></div>
                                    </div>
                                </div>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endif; ?>
                        </div>
                     
                        <!-- .col-lg-12 end -->

                    </div>
                </div>
                <!-- .col-lg-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #services-single end -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>