<?php $__env->startSection('content'); ?>
  <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">الاخبار</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">

                            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                                إضافة جديد</button> -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form class="p-t-20" method="POST"action="<?php echo e(route('News.update',$news->id)); ?>"  method="post"  enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PATCH')); ?>

                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-wight m-b-0">تعديل الاخبار </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                   
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                <div class="col-md-12 form-group">
                                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab"
                                                                href="#lang_ar" role="tab"><span class="hidden-sm-up"><i
                                                                        class="flag-icon flag-icon-eg"></i></span>&nbsp&nbsp
                                                                عربي <span class="hidden-xs-down"></span></a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab"
                                                                href="#lang_en" role="tab"><span class="hidden-sm-up"><i
                                                                        class="flag-icon flag-icon-us"></i></span>
                                                                <span class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="lang_ar" role="tabpanel">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="AR" class="control-label">اسم الخبر<span class="text-danger">*</span> 
                                                                </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" id="AR" class="form-control"
                                                                            placeholder="اضف عنوان مناسب للخبر" required name="ar_name" value="<?php echo e($news->title_ar); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <label for="textarea_ar">وصف الخبر <span class="text-danger">*</span> </label>
                                                                <div class="form-group">
                                                                    <textarea class="summernote" required name="description_ar">
                                                                    <?php echo e($news->description_ar); ?>

                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>وصف الميتا</label>
                                                                <textarea class="form-control" rows="5" name="meta_description_ar"><?php echo e($news->meta_description_ar); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lang_en" role="tabpanel">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="AR" class="control-label">اسم الخبر </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input type="" id="AR" class="form-control"
                                                                            placeholder="اضف عنوان مناسب للخبر" name="en_name" value="<?php echo e($news->title_en); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <label for="textarea_ar"> وصف الخبر </label>
                                                                <div class="form-group">
                                                                    <textarea class="summernote" name="description_en">
                                                                    <?php echo e($news->description_en); ?>

                                                               </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>وصف الميتا</label>
                                                                <textarea class="form-control" rows="5" name="meta_description_en"><?php echo e($news->meta_description_en); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-12 form-group">
                                            <div class="text-left">
                                                <div class="pull-left">
                                                    <button class="btn btn-rounded btn-success"><span class="fa fa-send">
                                                        </span>&nbsp&nbspحفظ</button>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="<?php echo e(route('News.index')); ?>" class="btn btn-rounded btn-danger">
                                                        <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
                                                </div>
                                            </div>
                                        </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-pane" id="home3" role="tabpanel">
                                    <div class="form-group" style="max-height: 210px;overflow-y: scroll;overflow-x: hidden;">
                                        <label class="control-label">اقسام الاخبار</label>
                                        <div class="form-group row p-t-20">
                                                <div class="col-sm-12">
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"  name="categories[]" value="<?php echo e($value->id); ?>" id="customCheck<?php echo e($value->id); ?>" 
                                                        <?php $__currentLoopData = $news->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <?php if($cat->id == $value->id): ?> 
                                                        checked
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> >
                                                        <label class="custom-control-label" for="customCheck<?php echo e($value->id); ?>"><?php echo e($value->name_ar); ?></label>
                                                    </div>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                    </div>

                                    <!--  -->

                                        <!--  -->
                                    <div class="form-group">
                                        <label class="control-label">الحالة</label>
                                        <select name="status" class="form-control">
                                           <option value="1"<?php echo e($news->status == 1 ? 'selected="selected"' : ''); ?> >تفعيل</option>
                                            <option value="0" <?php echo e($news->status == 0 ? 'selected="selected"' : ''); ?>>ايقاف</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-pane" id="home6" role="tabpanel">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="lang_en_seo" class="form-control" role="tabpanel">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="control-label">الكلمات المفاتحيه</label>
                                                    <br>
                                                    <div class="input-group-prepend">
                                                        <input type="text" name="tags" data-role="tagsinput" value="<?php echo e($news->tags); ?>" class="form-control">
                                                        <a href="#"><span class="input-group-text">اضف</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-pane" id="home5" role="tabpanel">
                                    <div class="form-group">
                                        <label class="control-label">اضف صورة الخبر</label>
                                        <p>20x20</p>
                                        <br>
                                        <input type="file" id="input-file-now" name="img"  <?php if(!empty($news->image)): ?> data-default-file="<?php echo e(asset($news->image)); ?>" <?php endif; ?> class="dropify" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                </form>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>