@extends('layouts.master')
@section('content')

            <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><a href="{{route('Category.index')}}"> الأقسام الرئيسية</a></h4>
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
                                        <h4 class="card-white m-b-0">اضافة قسم رئيسي</h4> 
                                </div>
                            <div class="card-body">
                                <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">القسم</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="fa fa-folder-o"></i></span> <span class="hidden-xs-down">البيانات</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><span class="hidden-sm-up"><i class="fa fa-tags"></i></span> <span class="hidden-xs-down">الكلمات المفتاحيه</span></a> </li>
                                    <ul>
                                </div>
                                <div class="form-group">
                                    <form class=" p-t-20"   action="{{route('Category.store')}}"  method="post"  enctype="multipart/form-data">
                                                {{csrf_field()}}
                                        <div class="tab-content">        
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                <div class="col-md-12 form-group">
                                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#lang_ar" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-eg"></i></span> &nbsp&nbsp عربي <span class="hidden-xs-down"></span></a> </li>
                                                        <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#lang_en" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a> </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content">        
                                                    <div class="tab-pane active" id="lang_ar" role="tabpanel">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="AR" class="control-label">اسم القسم <span class="text-danger">*</span> </label>
                                                                    <div class="input-group-prepend controls">
                                                                        <input type="text" id="AR" class="form-control" placeholder="اسم القسم" name="ar_name"  required data-validation-required-message="اسم القسم  مطلوب">
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <label for="textarea_ar" class="control-label"> وصف القسم <span class="text-danger">*</span></label>
                                                                 <div class="controls">
                                                                    <textarea rows="5" id="textarea_ar" class="form-control" id="exampleTextarea" name="ar_description"  required placeholder="وصف القسم"></textarea>
                                                                 </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane "  id="lang_en" role="tabpanel">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="en" class="control-label"> اسم القسم </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" id="en" class="form-control" placeholder="اسم القسم" name="en_name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <label for="textarea_en">وصف القسم</label>
                                                                <div class="form-group">
                                                                    <textarea rows="5" id="textarea_en" class="form-control" placeholder="وصف القسم" name="en_description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="home2" role="tabpanel">

                                                <div class="form-group">
                                                    <label class="control-label">صورة ال قسم</label>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <input type="file" name="img" id="input-file-now" class="dropify" />
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
                                             
                                            <div class="tab-pane" id="home3" role="tabpanel">
                                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#lang_en_seo" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-eg"></i></span>&nbsp&nbspعربي <span class="hidden-xs-down"></span></a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lang_ar_seo" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a> </li>
                                                    </ul>

                                                <div class="tab-content">        
                                                    <div class="tab-pane active" id="lang_en_seo" class="form-control" role="tabpanel">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <br>
                                                                <br>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="flag-icon flag-icon-eg"></i></span>
                                                                        <input type="text" name="ar_tag"data-role="tagsinput" class="form-control" >
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
                                                                        <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                                                        <input type="text" name="en_tag" class="form-control" data-role="tagsinput">
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
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspحفظ</button>
                                                    </div>   
                                                    <div class="pull-right">
                                                        <a href="{{route('Category.index')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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
@section('js')
  <script>
    ! function(window, document, $) {
        "use strict";
        $("textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
@endsection
@endsection