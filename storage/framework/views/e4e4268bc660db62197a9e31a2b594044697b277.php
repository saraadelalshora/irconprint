<?php $__env->startSection('content'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><a href="<?php echo e(route('Video.index')); ?>"> الفيديو </a> </h4>
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
                <h4 class="card-white m-b-0">الفيديو</h4>
            </div>
            <div class="card-body">
                <div class="col-md-12 form-group">
                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1"
                                role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                    class="hidden-xs-down"> الفيديو </span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><span
                                    class="hidden-sm-up"><i class="fa fa-link"></i></span> <span class="hidden-xs-down">
                                    روابط </span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home6" role="tab"><span
                                    class="hidden-sm-up"><i class="fa fa-tags"></i></span> <span
                                    class="hidden-xs-down">الكلمات المفتاحيه<span></a> </li>
                        <ul>
                </div>
                <div class="form-group">
                    <form class=" p-t-20" method="POST" action="<?php echo e(route('Video.store')); ?>"
                        enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="tab-content">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab"
                                                href="#lang_ar" role="tab"><span class="hidden-sm-up"><i
                                                        class="flag-icon flag-icon-eg"></i></span>&nbsp&nbsp عربي <span
                                                    class="hidden-xs-down"></span></a> </li>
                                        <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#lang_en"
                                                role="tab"><span class="hidden-sm-up"><i
                                                        class="flag-icon flag-icon-us"></i></span> <span
                                                    class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a> </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="lang_ar" role="tabpanel">
                                        <div class="form-group">
                                            <div>
                                                <label for="AR" class="control-label"> اسم الفيديو<span
                                                        class="text-danger">*</span> </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="text" id="AR" class="form-control"
                                                            placeholder=" اسم الفيديو" name="name_ar" required
                                                            data-validation-required-message="هذا الحقل مطلوب">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="lang_en" role="tabpanel">
                                        <div class="form-group">
                                            <div>
                                            <label for="AR" class="control-label"> اسم الفيديو </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="" id="AR" class="form-control"
                                                            placeholder="اسم القسم" name="name_en">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                    <div class="col-lg-12 col-md-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <input type="file"  name="pro_image" id="input-file-now"  accept="video/*" />
                                                                </div>
                                                            </div>
                                          </div>
                                </div> 
                                </div>
                                <div class="form-group">
                                    <label class="control-label">الحالة </label>
                                    <select name="status" class="form-control">
                                        <option value="1">تفعيل</option>
                                        <option value="0">ايقاف</option>
                                    </select>
                                </div>
                            </div>


                            <div class="tab-pane" id="home3" role="tabpanel">

                                <div class="form-group">
                                    <label class="control-label">القسم الرئيسي<span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control m-b-10 select2-multiple" name="category_id"
                                        id="Category" required data-validation-required-message="هذا الحقل مطلوب">
                                        <option disabled="disabled" selected="selected">Select</option>
                                        <?php if(isset($categories)): ?>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_ar); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">القسم الفرعي </label>
                                    <select name="subcategory" id="subcategory"
                                        class="form-control m-b-10 select2-multiplel" 
                                        data-validation-required-message="هذا الحقل مطلوب">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">تصنفيات الاقسام الفرعية</label>
                                    <select name="subsubcategory" id="filter"
                                        class="form-control m-b-10 select2-multiplel" 
                                        data-validation-required-message="هذا الحقل مطلوب">
                                    </select>
                                </div>
                                
                            </div>


                            <div class="tab-pane" id="home6" role="tabpanel">
                                <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#lang_en"
                                            role="tab"><span class="hidden-sm-up"><i
                                                    class="flag-icon flag-icon-eg"></i></span>&nbsp&nbsp عربي <span
                                                class="hidden-xs-down"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lang_ar_seo"
                                            role="tab"><span class="hidden-sm-up"><i
                                                    class="flag-icon flag-icon-us"></i></span> <span
                                                class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a> </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="lang_en_seo" class="form-control" role="tabpanel">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <br>
                                                <br>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="flag-icon flag-icon-eg"></i></span>
                                                    <input type="text" data-role="tagsinput" name="tag_ar"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="lang_ar_seo" role="tabpanel">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <br>
                                                <br>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="flag-icon flag-icon-us"></i></span>
                                                    <input type="text" class="form-control" name="tag_en"
                                                        data-role="tagsinput">
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
                                    <a href="<?php echo e(route('Video.index')); ?>" class="btn btn-rounded btn-danger"> <span
                                            class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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
<?php $__env->startSection('js'); ?>

<script type="text/javascript">
    $('#Category').change(function () {
        $("#subcategory").empty();
        $("#filter").empty();
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('admin/subcategory-list')); ?>?category_id=" + countryID,
                success: function (res) {
                    if (res) {
                        $("#subcategory").empty();
                        $("#subcategory").append('<option disabled="disabled" selected="selected" >Select</option>');
                        $.each(res, function (key, value) {
                            $("#subcategory").append('<option value="' + key + '">' +
                                value + '</option>');
                        });

                    } else {
                        $("#subcategory").empty();
                    }
                }
            });
        } else {
            $("#subcategory").empty();
            $("#filter").empty();

        }
    });
    $('#subcategory').on('change', function () {
        $("#filter").empty();

        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('admin/filter-list')); ?>?subcategory_id=" + stateID,
                success: function (res) {
                    if (res) {
                        $("#filter").empty();
                        $("#filter").append('<option disabled="disabled" selected="selected" >Select</option>');
                        $.each(res, function (key, value) {
                            $("#filter").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {
                        $("#filter").empty();

                    }
                }
            });
        } else {
            $("#filter").empty();
            // $(".specification").empty();
            // $(".specification_details").empty();
        }

    });
</script>
<script>
    $(document).ready(function () {
        document.getElementById('pro-image').addEventListener('change', readImage, false);

        $(".preview-images-zone").sortable();

        $(document).on('click', '.image-cancel', function () {
            let no = $(this).data('no');
            $(".preview-image.preview-show-" + no).remove();
        });
    });

    var num = 4;

    function readImage() {
        if (window.File && window.FileList && window.FileReader) {
            var files = event.target.files; //FileList object
            var output = $(".preview-images-zone");
            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')) continue;
                var picReader = new FileReader();
                picReader.addEventListener('load', function (event) {
                    var picFile = event.target;
                    var html = '<div class="preview-image preview-show-' + num + '">' +
                        '<div class="image-cancel" data-no="' + num + '">x</div>' +
                        '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result +
                        '" class="img-fluid"></div>' +
                        '</div>';

                    output.append(html);
                    num = num + 1;
                });
                picReader.readAsDataURL(file);
            }
            // $("#pro-image").val('');
        } else {
            console.log('Browser not support');
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>