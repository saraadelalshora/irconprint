<?php $__env->startSection('content'); ?>

            <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><a href="<?php echo e(route('CategoriesNews.index')); ?>"> الأقسام الاخبارية</a></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                       <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4 class="m-b-0"> اضافة اقسام الاخبار</h4>
                                </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form class="p-t-20" method="POST" action="<?php echo e(route('CategoriesNews.store')); ?>"  method="post"  enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                        <div class="tab-content">        
                                                <div class="tab-content">        
                                                    <div class="tab-pane active" id="lang_ar" role="tabpanel">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="AR" class="control-label"> اسم قسم الاخبار عربي <span class="text-danger">*</span> </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input placeholder="اسم قسم الاخبار عربي"  class="form-control"  required name="ar_name"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="AR" class="control-label"> اسم قسم الاخبار انجليزي </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input placeholder="اسم قسم الاخبار انجليزي"  class="form-control" name="en_name"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                <div class="form-group">
                                                    <label class="control-label"> الحاله </label>
                                                        <select name="status" class="form-control">
                                                            <option value="1">تفعيل</option>
                                                            <option value="0">ايقاف</option>
                                                        </select>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                        <div class="text-left">
                                                    <div class="pull-left">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspحفظ</button>
                                                    </div>   
                                                    <div class="pull-right">
                                                        <a href="<?php echo e(route('CategoriesNews.index')); ?>" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
                                                    </div>                                     
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               

                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>