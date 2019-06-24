<?php $__env->startSection('meta'); ?>
<?php if(app()->getLocale() == 'ar'): ?>
<title><?php echo e($setting->store_name_ar); ?> | <?php echo e($product->name_ar); ?> </title>
<meta name="description" content="">
<meta name="keywords" content="<?php echo e($product->tag_ar); ?>">
<?php else: ?>
<title><?php echo e($setting->store_name_ar); ?> | <?php echo e($product->name_en); ?> </title>
<meta name="description" content="">
<meta name="keywords" content="<?php echo e($product->tag_en); ?>">
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <!-- start top page -->
 <section class="top-page">
        <div class="container">
                <ol class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>"><?php echo e(trans('massege.home')); ?></a></li>
                <?php if(app()->getLocale() == 'ar'): ?>
                    <li class="active"><?php echo e($product->subcategory->name_ar); ?></li>
                    <?php else: ?>
                    <li class="active"><?php echo e($product->subcategory->name_en); ?></li>
                <?php endif; ?>
                <?php if(app()->getLocale() == 'ar'): ?>
                    <li class="active"><?php echo e($product->name_ar); ?></li>
                    <?php else: ?>
                    <li class="active"><?php echo e($product->name_en); ?></li>
                <?php endif; ?>
            </ol>
        </div>
    </section>
    <!-- end top page -->
    <!-- start content page -->

    <section class="content-page ">
        <div class="container">
            <div class="det-all box_account">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?php if($product->images->isEmpty() != true): ?>
                       
                        <div class="xzoom-container">
                            <img class="xzoom" id="xzoom-default"  src="<?php echo e(asset($product->images->first()->img)); ?>" xoriginal="<?php echo e(asset($product->images->first()->img)); ?>" />
                            <div class="xzoom-thumbs">
                                <div class=" owl-carousel owl-theme owl-xzoom">
                           <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <a href="<?php echo e(asset($image->img)); ?>">
                                            <img class="xzoom-gallery"  src="<?php echo e(asset($image->img)); ?>"
                                                xpreview="<?php echo e(asset($image->img)); ?>" title="The description goes here">
                                        </a>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
                                   
                                </div>
                            </div>
                          
                        </div>
                     
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-details">
                            <div class="ads-info">
                           <?php if(app()->getLocale() == 'ar'): ?>
                                <h2> <?php echo e($product->name_ar); ?></h2>
                             <?php else: ?>

                               <h2> <?php echo e($product->name_en); ?>  </h2>
                            <?php endif; ?>

                                <ul class="rating">
                                    
                                <?php for( $i=0; $i < number_format($rate);$i++): ?>
                                                                        <li class="fas fa-star"></li>
                                                                    <?php endfor; ?>
                                                                    <?php for( $i=0;$i < (5-number_format($rate));$i++): ?>
                                                                     <li class="fas fa-star disable"></li>
                                                                    <?php endfor; ?>
                                                                       
                                </ul>
                                <?php if($product->discount_price): ?>                                                   
                                   <div class="price"><span>$ <?php echo e($product->price); ?></span> $<?php echo e($product->discount_price); ?></div>
                                <?php else: ?>
                                  <div class="price"> $<?php echo e($product->price); ?> </div>

                                <?php endif; ?>
                            </div>
                            <hr>
                            <div class="product-content">
                                <p>
                                <?php if(app()->getLocale() == 'ar'): ?> 
                                                     <?php echo str_limit($product->description_ar, $limit = 150, $end = '...'); ?>

                                                     <?php else: ?>
                                                     <?php echo str_limit($product->description_en, $limit = 150, $end = '...'); ?>

                               <?php endif; ?>
                                </p>
                                <div class="dt-info">
                                    <div class="number">
                                        <input type="text" value="1" />
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="dt-btn">
                                    <?php if(Auth::User()): ?>
                                    <a href="<?php echo e(url('/wishlist')); ?>/<?php echo e($product->id); ?>" class="btn btn-single"> <i class="far fa-heart"></i></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(url('/login')); ?>" class="btn btn-single"> <i class="far fa-heart"></i></a>
                                    <?php endif; ?>
                                    <a  href="<?php echo e(url('/Add-To-Cart')); ?>/<?php echo e($product->id); ?>" class="btn btn-single"> <i class="fas fa-shopping-basket"></i> </a>
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="list-inline links">
                                        <li><strong><?php echo app('translator')->getFromJson('massege.Category'); ?> :</strong></li>
                                        <?php if(app()->getLocale() == 'ar'): ?>
                                        <li><a href="#"><?php echo e($product->subcategory->category->name_ar); ?> </a></li>,
                                        <li><a href="<?php echo e(route('category.products',$product->subcategory->slogen_ar)); ?>"><?php echo e($product->subcategory->name_ar); ?></a></li>
                                       <?php else: ?>
                                       <li><a href="#"><?php echo e($product->subcategory->category->name_en); ?> </a></li>,
                                      <li><a href="<?php echo e(route('category.products',$product->subcategory->slogen_en)); ?>"><?php echo e($product->subcategory->name_en); ?></a></li>
                                       <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="det-all">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="details-info">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active">
                                        <a href="#sec1" role="tab" data-toggle="tab"><?php echo app('translator')->getFromJson('massege.Specifications'); ?>
                                        </a>
                                    </li>
                                    <li >
                                        <a href="#sec2" role="tab" data-toggle="tab"><?php echo app('translator')->getFromJson('massege.Comments'); ?> </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active " id="sec1">
                                        <h4 class="pro-title"></h4>
                                        <div class="table-responsive">
                                        <?php if(app()->getLocale() == 'ar'): ?> 
                                                     <?php echo $product->description_ar; ?>

                                                     <?php else: ?>
                                                     <?php echo $product->description_en; ?>

                                       <?php endif; ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade  " id="sec2">
                                        <div id="reviews">
                                            <div id="comments">
                                                <h4 class="pro-title"> <?php echo app('translator')->getFromJson('massege.Comments'); ?></h4>
                                                <ul class="commentlist">
                                                <?php if($product->comments): ?>
                                                <?php $__currentLoopData = $product->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($comment->approved == 1): ?>
                                                    <li class="review">
                                                        <div class="comment_info">
                                                            <img alt=""  src="<?php echo e(asset('/')); ?>/assetfront/images/1.jpg" class="avatar">
                                                            <div class="comment-text">
                                                                <div class="rate">
                                                                    <ul class="rating">
                                                                    <?php for( $i=0; $i < $comment->rate;$i++): ?>
                                                                        <li class="fas fa-star"></li>
                                                                    <?php endfor; ?>
                                                                    <?php for( $i=0;$i < (5-$comment->rate);$i++): ?>
                                                                     <li class="fas fa-star disable"></li>
                                                                    <?php endfor; ?>
                                                                       
                                                                    </ul>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong><?php echo e($comment->user->fname); ?></strong> – <time><?php echo e($comment->created_at->format('d/m/Y')); ?></time>:
                                                                </p>
                                                                <div class="description">
                                                                    <p><?php echo e($comment->comment); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  <?php endif; ?>
                                                  
                                                </ul>
                                            </div>
                                            <div class="review_form">
                                            <form class="comment-form" method="post" action="<?php echo e(route('review',$product->id)); ?>">
                                            <?php echo e(csrf_field()); ?> 
                                                <h4 class="pro-title"><?php echo app('translator')->getFromJson('massege.Add Comment'); ?>
                                                </h4>
                                                <div class="rating">
                                                    <span><?php echo app('translator')->getFromJson('massege.Rate Now'); ?></span>

                                                    <input type="radio" id="star5" name="rating" value="5" />
                                                    <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating"
                                                        value="4 and a half" />
                                                    <label class="half" for="star4half"
                                                        title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" />
                                                    <label class="full" for="star4"
                                                        title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating"
                                                        value="3 and a half" />
                                                    <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" />
                                                    <label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating"
                                                        value="2 and a half" />
                                                    <label class="half" for="star2half"
                                                        title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" />
                                                    <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating"
                                                        value="1 and a half" />
                                                    <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" />
                                                    <label class="full" for="star1"
                                                        title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" />
                                                    <label class="half" for="starhalf"
                                                        title="Sucks big time - 0.5 stars"></label>
                                                </div>
                                               
                                                    <div class="form-group">
                                                        <textarea name="comment" class="form-control"
                                                            rows="6"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-default"> <?php echo app('translator')->getFromJson('massege.send'); ?></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                <!-- start RELATED PRODUCTS  -->
                <div class="container">
                <section class="products  box_account">
                        <div class="sec-title">
                            <h3><?php echo app('translator')->getFromJson('massege.Related Product'); ?></h3>
                        </div>
                        <div class="row">
                        <?php if($product->images->isEmpty() != true): ?>
                        <div class=" text-center">
                            <h3 style="color:#ff5400;"><?php echo app('translator')->getFromJson('massege.Sorry there is No product Related'); ?></h3>
                        </div>
                        <?php else: ?>
                         <?php $__currentLoopData = $related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productrelated): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if($productrelated->id != $product->id): ?>
                            <div class="col-md-3 col-sm-3">
                                <div class="product-all">
                                    <div class="product-grid">
                                    <div class="product-image">
                                                    <a href="#" class="image">
                                                        <?php $__currentLoopData = $productrelated->images->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <img class="pic-1" src="<?php echo e(asset($image->img)); ?>">
                                                        <img class="pic-2" src="<?php echo e(asset($image->img)); ?>">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </a>
                                                    <!-- if product add at last 7 day will be new -->
                                                    <?php if($productrelated->created_at >=  date('Y-m-d H:i:s',strtotime('-7 days'))): ?>
                                                    <span class="product-sale-label"><?php echo app('translator')->getFromJson('massege.New'); ?></span>
                                                    <?php endif; ?>
                                                    <?php if($productrelated->discount_price): ?>
                                                    <span class="product-discount-label"><?php echo e(number_format((($productrelated->price-$productrelated->discount_price)*100/$productrelated->price))); ?>%</span>
                                                    <?php endif; ?>
                                        </div>
                                        <div class="product-content">
                                            <ul class="rating">
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star disable"></li>
                                            </ul>
                                                   <?php if(app()->getLocale() == 'ar'): ?>
                                                    <h3 class="title"><a href="<?php echo e(route('product.name',$productrelated->slogen_ar)); ?>"><?php echo e($productrelated->name_ar); ?></a></h3>
                                                    <?php else: ?>
                                                    <h3 class="title"><a href="<?php echo e(route('product.name',$productrelated->slogen_en)); ?>"><?php echo e($productrelated->name_en); ?></a></h3>
                                                    <?php endif; ?>

                                                    <?php if($productrelated->discount_price): ?>                                                   
                                                    <div class="price"><span>$ <?php echo e($productrelated->price); ?></span> $<?php echo e($productrelated->discount_price); ?></div>
                                                    <?php else: ?>
                                                    <div class="price"> $<?php echo e($productrelated->price); ?> </div>
                                                    <?php endif; ?>
                                           
                                            <div class="product-button-group">
                                            <?php if(Auth::User()): ?>
                                    <a href="<?php echo e(url('/wishlist')); ?>/<?php echo e($product->id); ?>" class="btn btn-single"> <i class="far fa-heart"></i></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(url('/login')); ?>" class="btn btn-single"> <i class="far fa-heart"></i></a>
                                    <?php endif; ?>
                                                <a class="add-to-cart" href="#"><i
                                                        class="fas fa-shopping-basket"></i>أضف للسلة</a>
                                                <a class="product-compare-icon" href="#"><i
                                                        class="fas fa-random"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </div>
                    </section>
                </div>
                <!-- end RELATED PRODUCTS  -->
          
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>