@extends('layouts.master')
@section('content')
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
                <form class="p-t-20" method="POST"action="{{route('News.store')}}"  method="post"  enctype="multipart/form-data">
                        {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-wight m-b-0">اضف خبر جديد</h4>
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
                                                                            placeholder="اضف عنوان مناسب للخبر" name="ar_name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <label for="textarea_ar">وصف الخبر <span class="text-danger">*</span></label>
                                                                <div class="form-group">
                                                                    <textarea class="summernote" required name="description_ar">
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>وصف الميتا</label>
                                                                <textarea class="form-control" rows="5" name="meta_description_ar"></textarea>
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
                                                                            placeholder="اضف عنوان مناسب للخبر" name="en_name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <label for="textarea_ar"> وصف الخبر </label>
                                                                <div class="form-group">
                                                                    <textarea class="summernote" name="description_en">
                                                               </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>وصف الميتا</label>
                                                                <textarea class="form-control" rows="5" name="meta_description_en"></textarea>
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
                                                    <a href="{{route('News.index')}}" class="btn btn-rounded btn-danger">
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
                                                    @foreach($categories as $value)
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"  name="categories[]" value="{{$value->id}}" id="customCheck{{$value->id}}">
                                                        <label class="custom-control-label" for="customCheck{{$value->id}}">{{$value->name_ar}}</label>
                                                    </div>
                                                   @endforeach
                                                </div>
                                            </div>
                                    </div>

                                    <!--  -->

                                        <!--  -->
                                    <div class="form-group">
                                        <label class="control-label">الحالة</label>
                                        <select name="status" class="form-control">
                                            <option value="1">تفعيل</option>
                                            <option value="0">ايقاف</option>
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
                                                        <input type="text" name="tags" data-role="tagsinput" class="form-control">
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
                                        <input type="file" id="input-file-now" name="img" class="dropify" />
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
@endsection