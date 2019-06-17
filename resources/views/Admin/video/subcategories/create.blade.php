@extends('layouts.master')
@section('content')

            <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">الأقسام الفرعية</h4>
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
                                    <h4 class="card-white m-b-0">اضافة قسم فرعي</h4> 
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
                                    <form class=" p-t-20" action="{{url('admin/video/SubCategory')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}  
                                        <div class="tab-content">        
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                <div class="col-md-12 form-group">
                                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#lang_ar" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-eg"></i></span>&nbsp&nbsp  عربي <span class="hidden-xs-down"></span></a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lang_en" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a> </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content">        
                                                    <div class="tab-pane active" id="lang_ar" role="tabpanel">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="AR" class="control-label"> اسم القسم <span class="text-danger">*</span> </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" id="AR" class="form-control" placeholder="اسم القسم" name="name_ar" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <label for="textarea_ar">وصف القسم <span class="text-danger">*</span></label>
                                                                <div class="form-group">
                                                                    <textarea rows="5" id="textarea_ar" class="form-control" placeholder="وصف القسم" name="description_ar" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lang_en" role="tabpanel">
                                                        <div class="form-group">
                                                            <div>
                                                                <label for="AR" class="control-label"> اسم القسم </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" id="AR" class="form-control" placeholder="اسم القسم" name="name_en">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <label for="textarea_ar">وصف القسم</label>
                                                                <div class="form-group">
                                                                    <textarea rows="5" id="textarea_ar" class="form-control" placeholder="وصف القسم" name="description_en"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="home2" role="tabpanel">
                                                <div class="form-group">
                                                    <label class="control-label">القسم الرئيسي <span class="text-danger">*</span> </label>
                                                    <select class="form-control m-b-10 select2-multiple" style="width: 100%" required  name="category" data-placeholder="Choose">
                                                    @if(!empty($categories)) @foreach($categories as $category)       
                                                    <option value="{{$category->id}}">{{$category->name_ar}}</option>
                                                     @endforeach  @endif
                                                        </select>
                                                     </div>

                                               
                                                <div class="form-group">
                                                    <label class="control-label">صورة ال قسم</label>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <input type="file" name="image" id="input-file-now" class="dropify" />
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
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#lang_ar_seo" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-eg"></i></span>&nbsp&nbspعربي <span class="hidden-xs-down"></span></a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lang_en_seo" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a> </li>
                                                    </ul>

                                                <div class="tab-content">        
                                                    <div class="tab-pane active" id="lang_ar_seo" class="form-control" role="tabpanel">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <br>
                                                                <br>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="flag-icon flag-icon-eg"></i></span>
                                                                        <input type="text" data-role="tagsinput" name="tag_ar" class="form-control" >
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="lang_en_seo" role="tabpanel">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <br>
                                                                <br>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="flag-icon flag-icon-us"></i></span>
                                                                        <input type="text" class="form-control" name="tag_en" data-role="tagsinput">
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
                                                        <a href="{{url('admin/video/SubCategory')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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

@endsection