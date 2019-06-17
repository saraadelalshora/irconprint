@extends('layouts.master')
@section('content')
              <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">اعدادات رئيسية</h4>
                    </div>
                    <!-- <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button>
                            <button type="button" class="btn btn-danger m-l-15"><i class="fa fa-close"></i> مسح</button>
                            
                        </div>
                    </div> -->
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
                                        <h4 class="card-title m-b-0">اعدادات رئيسية</h4> 
                                </div>
                            <div class="card-body">
                                <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"> اعدادات عامه </span></a> </li>
                                       
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class=" ti-shopping-cart-full"></i></span> <span class="hidden-xs-down"> الموقع </span></a> </li>
                                       
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><span class="hidden-sm-up"><i class="fa fa-file-image-o"></i></span> <span class="hidden-xs-down"> الصور </span></a> </li>

                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home4" role="tab"><span class="hidden-sm-up"><i class=" ti-settings"></i></span> <span class="hidden-xs-down"> وضع الصيانة </span></a> </li>
                                    <ul>
                                </div>
                                <div class="form-group">
                                @if($setting != null)
                                    <form class=" p-t-20" method="POST" action="{{route('setting.update',['Setting'=>$setting->id])}}" enctype="multipart/form-data">
                                    {{csrf_field()}}                                  
                                    {{ method_field('PATCH') }}
                                        <div class="tab-content">        
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                <div class="form-group">
                                                    <label class="control-label">نبذه عن الموقع عربي</label>
                                                    <textarea  class="form-control" style="height:120px" placeholder="نبذه عن الموقع" name="description_ar"> {{$setting->description_ar}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">نبذه عن الموقع انجليزي</label>
                                                    <textarea  class="form-control" style="height:120px" placeholder="نبذه عن الموقع" name="description_en"> {{$setting->description_en}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">عنوان ال meta</label>
                                                    <input type="text" class="form-control" placeholder="عنوان ال meta" name="meta_title" value="{{$setting->meta_title}}">
                                                </div>

                                                <div class="form-group ">
                                                    <label class="control-label">وصف ال meta tag</label>
                                                        <div class="col-md-12">
                                                        <input  class="form-control"  placeholder="وصف ال meta tag" name="meta_tags"data-role="tagsinput" value="{{$setting->meta_tags}}">
                                                </div>
                                                   </div>
                                                <div class="form-group">
                                                    <label class="control-label">الكلمات الدلاليه لل meta tag</label>
                                                        <textarea  class="form-control" style="height:120px" placeholder="الكلمات الدلاليه لل meta tag" name="meta_description_ar"> {{$setting->meta_description_ar}}</textarea>
                                                </div>
                                             
                                            </div>

                                            <div class="tab-pane" id="home2" role="tabpanel">
                                                    <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">العنوان</label>
                                                    <input type="text" class="form-control" placeholder="العنوان"  name="address" value="{{$setting->address}}">
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">واتساب</label>
                                                        <input type="text" class="form-control" placeholder="واتساب"  name="whatsapp" value="{{$setting->whatsapp}}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">البريد الالكترونى</label>
                                                        <input type="email" class="form-control" placeholder="البريد الالكترونى"  name="email" value="{{$setting->email}}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">رقم الهاتف</label>
                                                        <input type="tel" class="form-control" placeholder="رقم الهاتف"  name="phone" value="{{$setting->phone}}">
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">الكود قبل ال Head</label>
                                                        <textarea  class="form-control" style="height:120px" placeholder="الكود قبل ال Head" name="head_code"> {{$setting->head_code}}</textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">تعليق</label>
                                                        <textarea  class="form-control" style="height:120px" placeholder="تعليق" name="notes"> {{$setting->notes}}</textarea>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="home3" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3">
                                                                    <div class="form-group">
                                                                            <label class="control-label">لوجو الموقع</label>
                                                                        <input type="file" id="input-file-now"  name="logo_img" class="dropify" @if(!empty($setting->logo_img)) data-default-file="{{ asset($setting->logo_img) }}" @endif />
                                                                    </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="control-label">صوره الموقع انجليزي</label>
                                                                <input type="file" id="input-file-now" class="dropify" name="log_img_en" @if(!empty($setting->log_img_en)) data-default-file="{{ asset($setting->log_img_en) }}" @endif />
                                                            </div>
                                                            <div class="col-lg-3 col-md-3">
                                                                    <div class="form-group">
                                                                            <label class="control-label">ايقونه الموقع</label>
                                                                        <input type="file" id="input-file-now" name="icon_img" class="dropify" @if(!empty($setting->icon_img)) data-default-file="{{ asset($setting->icon_img) }}" @endif />
                                                                    </div>
                                                                </div>    
                                                        </div>
                                                   
                                                </div>
                                            <div class="tab-pane" id="home4" role="tabpanel">

                                                    <div class="form-group">
                                                        <label class="control-label">وضع الصيانه :</label>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" placeholder="customRadio" class="custom-control-input" name="check" value="1" {{ ($setting->maintans_status =="1")? "checked" : "" }} >
                                                            <label class="custom-control-label" for="customRadio1">نعم</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" placeholder="customRadio" class="custom-control-input" name="check" value="0" {{ ($setting->maintans_status =="0")? "checked" : "" }}>
                                                            <label class="custom-control-label" for="customRadio2">لا</label>
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
                                                        <a href="{{url('admin')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
                                                    </div>                                     
                                                </div>
                                            </div>
                                    </form>
                                @else
                                <form class=" p-t-20" method="POST" action="{{route('setting.store')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}                                  
                                        <div class="tab-content">        
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                <div class="form-group">
                                                    <label class="control-label">نبذه عن الموقع عربي</label>
                                                    <textarea  class="form-control" style="height:120px" placeholder="نبذه عن الموقع" name="description_ar"> </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">نبذه عن الموقع انجليزي</label>
                                                    <textarea  class="form-control" style="height:120px" placeholder="نبذه عن الموقع" name="description_en"> </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">عنوان ال meta</label>
                                                    <input type="text" class="form-control" placeholder="عنوان ال meta" name="meta_title" >
                                                </div>

                                                <div class="form-group ">
                                                    <label class="control-label">وصف ال meta tag</label>
                                                        <div class="col-md-12">
                                                        <input  class="form-control"  placeholder="وصف ال meta tag" name="meta_tags"data-role="tagsinput" >
                                                </div>
                                                   </div>
                                                <div class="form-group">
                                                    <label class="control-label">الكلمات الدلاليه لل meta tag</label>
                                                        <textarea  class="form-control" style="height:120px" placeholder="الكلمات الدلاليه لل meta tag" name="meta_description_ar"> </textarea>
                                                </div>
                                             
                                            </div>

                                            <div class="tab-pane" id="home2" role="tabpanel">
                                                    <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">العنوان</label>
                                                    <input type="text" class="form-control" placeholder="العنوان"  name="address" >
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">واتساب</label>
                                                        <input type="text" class="form-control" placeholder="واتساب"  name="whatsapp" >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">البريد الالكترونى</label>
                                                        <input type="email" class="form-control" placeholder="البريد الالكترونى"  name="email" >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">رقم الهاتف</label>
                                                        <input type="tel" class="form-control" placeholder="رقم الهاتف"  name="phone" >
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">الكود قبل ال Head</label>
                                                        <textarea  class="form-control" style="height:120px" placeholder="الكود قبل ال Head" name="head_code"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">تعليق</label>
                                                        <textarea  class="form-control" style="height:120px" placeholder="تعليق" name="notes"></textarea>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="home3" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3">
                                                                    <div class="form-group">
                                                                            <label class="control-label">لوجو الموقع</label>
                                                                        <input type="file" id="input-file-now"  name="logo_img" class="dropify" />
                                                                    </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="control-label">صوره الموقع انجليزي</label>
                                                                <input type="file" id="input-file-now" class="dropify" name="log_img_en" />
                                                            </div>
                                                            <div class="col-lg-3 col-md-3">
                                                                    <div class="form-group">
                                                                            <label class="control-label">ايقونه الموقع</label>
                                                                        <input type="file" id="input-file-now" name="icon_img" class="dropify" />
                                                                    </div>
                                                                </div>    
                                                        </div>
                                                   
                                                </div>
                                            <div class="tab-pane" id="home4" role="tabpanel">

                                                    <div class="form-group">
                                                        <label class="control-label">وضع الصيانه :</label>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" placeholder="customRadio" class="custom-control-input" name="check" value="1">
                                                            <label class="custom-control-label" for="customRadio1">نعم</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" placeholder="customRadio" class="custom-control-input" name="check" value="0" checked>
                                                            <label class="custom-control-label" for="customRadio2">لا</label>
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
                                                        <a href="{{url('admin')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
                                                    </div>                                     
                                                </div>
                                            </div>
                                    </form>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               

                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
@endsection