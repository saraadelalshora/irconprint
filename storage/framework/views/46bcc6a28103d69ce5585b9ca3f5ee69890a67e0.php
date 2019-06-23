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
                        <h1><?php echo app('translator')->getFromJson('massege.news'); ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo app('translator')->getFromJson('massege.news'); ?></li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->

<!-- Blog Standard Right Sidebar
============================================= -->
<section id="blog" class="blog blog-standard">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
             <?php if($news->isEmpty() != true): ?>
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsdetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Blog Entry #1 -->
                <div class="blog-entry">
                    <div class="entry--img">
                        <a href="#">
                            <img src="<?php echo e(asset($newsdetails->image)); ?>" alt="entry image" />
                            <div class="entry--overlay"></div>
                        </a>
                    </div>
                    <!-- .entry-img end -->
                    <div class="entry--content">
                        <div class="entry--meta">
                            <?php if(App::getLocale() == 'en'): ?>
                            <a href="#"><?php echo e($newsdetails->categories->first()->name_en); ?></a>
                            <?php else: ?>
                            <a href="#"><?php echo e($newsdetails->categories->first()->name_ar); ?></a>
                            <?php endif; ?>

                        </div>
                        <div class="entry--date">
                            <?php echo e(\Carbon\Carbon::parse($newsdetails->created_at)->format('d M  Y')); ?>

                        </div>
                        <div class="entry--title">
                            <h4>
                                <?php if(App::getLocale() == 'en'): ?>
                                <a href="<?php echo e(route('new',$newsdetails->slogen_en)); ?>"><?php echo e($newsdetails->title_en); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e(route('new',$newsdetails->slogen_en)); ?>"><?php echo e($newsdetails->title_ar); ?></a>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <div class="entry--bio">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo str_limit(strip_tags($newsdetails->description_en), $limit = 100, $end = '...'); ?>

                            <?php else: ?>
                            <?php echo str_limit(strip_tags($newsdetails->description_ar) , $limit = 100, $end = '...'); ?>

                            <?php endif; ?>
                        </div>
                        <div class="entry--footer">
                            <div class="entry--more">
                                <?php if(App::getLocale() == 'en'): ?>
                                <a href="<?php echo e(route('new',$newsdetails->slogen_en)); ?>"><i
                                        class="fa fa-plus"></i><?php echo app('translator')->getFromJson('massege.Read More'); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e(route('new',$newsdetails->slogen_ar)); ?>"><i
                                        class="fa fa-plus"></i><?php echo app('translator')->getFromJson('massege.Read More'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- .entry-content end -->
                </div>
                <!-- .blog-entry end -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="text--center">
                    <ul class="pagination">
                        <?php echo $news->appends(request()->except('page'))->links(); ?>

                    </ul>
                </div>
                <?php else: ?>
                <div class="text-center">
                    <h2 style="color:#830C0C;"><?php echo e(trans('massege.notfoundnews')); ?></h2>
                </div>
                <?php endif; ?>
            </div><!-- .col-md-8 end -->
            <div class="col-sm-12 col-md-12 col-lg-4">
                <!-- Search
    ============================================= -->
                <div class="widget widget-search">
                    <div class="widget--title">
                        <h5><?php echo app('translator')->getFromJson('massege.Search Bar'); ?></h5>
                    </div>
                    <div class="widget--content">
                        <form action="<?php echo e(url('search')); ?>" method="POST" role="search">
                            <?php echo e(csrf_field()); ?>

                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword"
                                    placeholder="<?php echo app('translator')->getFromJson('massege.Search'); ?>">
                                <span class="input-group-btn">
                                    <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>
                </div>
                <!-- .widget-search end -->
                <!-- Categories
    ============================================= -->
                <?php if(isset($newscategories)): ?>
                <div class="widget widget-categories">
                    <div class="widget--title">
                        <h5><?php echo app('translator')->getFromJson('massege.Categories'); ?></h5>
                    </div>
                    <div class="widget--content">
                        <ul class="list-unstyled">
                            <?php $__currentLoopData = $newscategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorynews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <?php if(App::getLocale() == 'en'): ?>
                                <a href="<?php echo e(route('Newscategory',$categorynews->id)); ?>"><?php echo e($categorynews->name_en); ?></a>

                                <?php else: ?>
                                <a href="<?php echo e(route('Newscategory',$categorynews->id)); ?>"><?php echo e($categorynews->name_ar); ?></a>

                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </li>
                        </ul>
                    </div>
                </div> <!-- .widget-categories end -->
                <?php endif; ?>
            </div><!-- .col-lg-4 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #blog end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>