<?php $__env->startSection('meta'); ?>
<?php if(app()->getLocale() == 'ar'): ?>
<title><?php echo e($news->title_ar); ?> </title>
<meta name="description" content="<?php echo e($news->meta_description_ar); ?>">

<?php else: ?>
<title><?php echo e($news->title_en); ?> </title>
<meta name="description" content="<?php echo e($news->meta_description_en); ?>">

<?php endif; ?>
<meta name="keywords" content="<?php echo e($news->tags); ?>">
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
                        <h1><?php echo app('translator')->getFromJson('massege.news'); ?></h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('news')); ?>"><?php echo app('translator')->getFromJson('massege.news'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo e($news->title_en); ?>

                            <?php else: ?>
                            <?php echo e($news->title_ar); ?>

                            <?php endif; ?>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


<!-- Blog Standard Right Sidebar
============================================= -->
<section id="blog" class="blog blog-single blog-standard">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <?php if(isset($news)): ?>

                <!-- Blog Entry #1 -->
                <div class="blog-entry">
                    <div class="entry--img">
                        <a href="#">
                            <img src="<?php echo e(asset($news->image)); ?>" alt="entry image" />
                        </a>
                    </div>
                    <div class="entry--content clearfix">
                        <div class="entry--meta">
                            <a href="#"> <?php if(App::getLocale() == 'en'): ?>
                                <a href="#"><?php echo e($news->categories->first()->name_en); ?></a>
                                <?php else: ?>
                                <a href="#"><?php echo e($news->categories->first()->name_ar); ?></a>
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="entry--date">
                            <?php echo e(\Carbon\Carbon::parse($news->created_at)->format('d M  Y')); ?>

                        </div>
                        <div class="entry--title">
                            <h4> <?php if(App::getLocale() == 'en'): ?>
                                <a href="<?php echo e(route('new',$news->slogen_en)); ?>"><?php echo e($news->title_en); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e(route('new',$news->slogen_en)); ?>"><?php echo e($news->title_ar); ?></a>
                                <?php endif; ?></h4>
                        </div>
                        <div class="entry--bio">
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo $news->description_en; ?>

                            <?php else: ?>
                            <?php echo $news->description_ar; ?>

                            <?php endif; ?>
                        </div>

                        <!-- .entry-share end -->
                        <div class="entry--tags">
                            <?php $__currentLoopData = explode(',',$news->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#">
                                <?php echo e($tags); ?>

                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- .entry-cat end -->
                    </div>
                </div>
                <!-- .blog-entry end -->
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
                                    placeholder="<?php echo app('translator')->getFromJson('massege.Search'); ?>$news->isEmpty() != true
notfoundnews">
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
                                <a href="#"><?php echo e($categorynews->name_en); ?></a>

                                <?php else: ?>
                                <a href="#"><?php echo e($categorynews->name_ar); ?></a>

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