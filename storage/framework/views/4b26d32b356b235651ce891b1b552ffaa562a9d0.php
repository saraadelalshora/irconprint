<?php $__env->startSection('meta'); ?>
<title> الخدمات</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">الخدمات</h4>
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
<!-- Start Service Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-wight m-b-0">اضف خدمة جديدة</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form class="p-t-20" method="POST" action="<?php echo e(route('Service.store')); ?>"
                        enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="tab-content">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab"
                                                href="#lang_ar" role="tab"><span class="hidden-sm-up"><i
                                                        class="flag-icon flag-icon-eg"></i></span>&nbsp&nbsp
                                                عربي <span class="hidden-xs-down"></span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lang_en"
                                                role="tab"><span class="hidden-sm-up"><i
                                                        class="flag-icon flag-icon-us"></i></span>
                                                <span class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="lang_ar" role="tabpanel">
                                        <div class="form-group">
                                            <div>
                                                <label for="AR" class="control-label">عنوان الخدمة <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="text" id="AR" class="form-control"
                                                            placeholder="اضف عنوان مناسب للخدمة" required
                                                            name="ar_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group live-preview">
                                                <label class="control-label">اختر ايقونه الخدمه</label>
                                                <select id="e1_element" name="e1_element">
                                                    <option >No icon</option>
                                                    <option value="icon-mobile">icon-mobile</option>
                                                    <option value="icon-laptop">icon-laptop</option>
                                                    <option value="icon-desktop">icon-desktop</option>
                                                    <option value="icon-tablet">icon-tablet</option>
                                                    <option value="icon-phone">icon-phone</option>
                                                    <option value="icon-document">icon-document</option>
                                                    <option value="icon-documents">icon-documents</option>
                                                    <option value="icon-search">icon-search</option>
                                                    <option value="icon-clipboard">icon-clipboard</option>
                                                    <option value="icon-newspaper">icon-newspaper</option>
                                                    <option value="icon-notebook">icon-notebook</option>
                                                    <option value="icon-calendar">icon-calendar</option>
                                                    <option value="icon-presentation">icon-presentation</option>
                                                    <option value="icon-picture">icon-picture</option>
                                                    <option value="icon-pictures">icon-pictures</option>
                                                    <option value="icon-video">icon-video</option>
                                                    <option value="icon-camera">icon-camera</option>
                                                    <option value="icon-printer">icon-printer</option>
                                                    <option value="icon-toolbox">icon-toolbox</option>
                                                    <option value="icon-briefcase">icon-briefcase</option>
                                                    <option value="icon-wallet">icon-wallet</option>
                                                    <option value="icon-gift">icon-gift</option>
                                            </select>
                                            </div>
                                            <hr>
                                            <div>
                                                <label for="textarea_ar">وصف الخدمة <span class="text-danger">*</span>
                                                </label>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="description_ar">
                                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">الحالة</label>
                                                <select name="status" class="form-control">
                                                    <option value="1">تفعيل</option>
                                                    <option value="0">ايقاف</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="lang_en" role="tabpanel">
                                        <div class="form-group">
                                            <div>
                                                <label for="AR" class="control-label">اسم الخدمة </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="text" id="AR" class="form-control"
                                                            placeholder="اضف عنوان مناسب الخدمة" name="en_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <label for="textarea_ar"> وصف الخدمة </label>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="description_en">
                                                                    </textarea>
                                                </div>
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
                                    <a href="<?php echo e(route('Service.index')); ?>" class="btn btn-rounded btn-danger">
                                        <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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

<!-- this js validate img form -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>