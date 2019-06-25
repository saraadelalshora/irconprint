@extends('layouts.master')
@section('meta')
<title> الخدمات</title>
@endsection
@section('content')

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
                <h4 class="card-wight m-b-0">تعديل خدمة جديدة</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form class="p-t-20" method="POST" action="{{route('Service.update',$service->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
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
                                                <label for="AR" class="control-label">عنوان الخدمة <span class="text-danger">*</span>
                                                </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="text" id="AR" class="form-control"
                                                            placeholder="اضف عنوان مناسب للخدمة"
                                                            value="{{$service->title_ar}}" required name="ar_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group live-preview">
                                                <label class="control-label">اختر ايقونه الخدمه</label>
                                                <select id="e1_element" name="e1_element">
                                                    <option >No icon</option>
                                                    <option value="icon-mobile" @if($service->img == "icon-mobile") selected @endif>icon-mobile</option>
                                                    <option value="icon-laptop" @if($service->img == "icon-laptop") selected @endif>icon-laptop</option>
                                                    <option value="icon-desktop" @if($service->img == "icon-desktop") selected @endif>icon-desktop</option>
                                                    <option value="icon-tablet" @if($service->img == "icon-tablet") selected @endif>icon-tablet</option>
                                                    <option value="icon-phone" @if($service->img == "icon-phone") selected @endif>icon-phone</option>
                                                    <option value="icon-document" @if($service->img == "icon-document") selected @endif>icon-document</option>
                                                    <option value="icon-documents" @if($service->img == "icon-documents") selected @endif>icon-documents</option>
                                                    <option value="icon-search" @if($service->img == "icon-search") selected @endif>icon-search</option>
                                                    <option value="icon-clipboard" @if($service->img == "icon-clipboard") selected @endif>icon-clipboard</option>
                                                    <option value="icon-newspaper" @if($service->img == "icon-newspaper") selected @endif>icon-newspaper</option>
                                                    <option value="icon-notebook" @if($service->img == "icon-notebook") selected @endif>icon-notebook</option>
                                                    <option value="icon-calendar" @if($service->img == "icon-calendar") selected @endif>icon-calendar</option>
                                                    <option value="icon-presentation" @if($service->img == "icon-presentation") selected @endif>icon-presentation</option>
                                                    <option value="icon-picture" @if($service->img == "icon-picture") selected @endif>icon-picture</option>
                                                    <option value="icon-pictures" @if($service->img == "icon-pictures") selected @endif>icon-pictures</option>
                                                    <option value="icon-video" @if($service->img == "icon-video") selected @endif>icon-video</option>
                                                    <option value="icon-camera" @if($service->img == "icon-camera") selected @endif>icon-camera</option>
                                                    <option value="icon-printer" @if($service->img == "icon-printer") selected @endif>icon-printer</option>
                                                    <option value="icon-toolbox" @if($service->img == "icon-toolbox") selected @endif>icon-toolbox</option>
                                                    <option value="icon-briefcase" @if($service->img == "icon-briefcase") selected @endif>icon-briefcase</option>
                                                    <option value="icon-wallet" @if($service->img == "icon-wallet") selected @endif>icon-wallet</option>
                                                    <option value=" icon-gift" @if($service->img == "icon-gift") selected @endif>icon-gift</option>
                                               </select>
                                            </div>
                                            <hr>
                                            <div>
                                                <label for="textarea_ar">وصف الخدمة</label>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="description_ar">
                                                                    {!! $service->description_ar !!}
                                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">الحالة</label>
                                                <select name="status" class="form-control">
                                                    <option value="1"
                                                        {{$service->status == 1 ? 'selected="selected"' : '' }}>تفعيل
                                                    </option>
                                                    <option value="0"
                                                        {{$service->status == 0 ? 'selected="selected"' : '' }}>ايقاف
                                                    </option>
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
                                                            placeholder="اضف عنوان مناسب للخدمة" name="en_name" value="{{$service->title_en}}">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <hr>
                                            <div>
                                                <label for="textarea_ar"> وصف الخدمة </label>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="description_en">
                                                    {!! $service->description_en !!}
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
                                    <a href="{{route('Service.index')}}" class="btn btn-rounded btn-danger">
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

@endsection
