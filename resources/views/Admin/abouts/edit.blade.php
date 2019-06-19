@extends('layouts.master')
@section('meta')
<title>الصفحات</title>
@endsection
@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">من نحن</h4>
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
<!-- Start About Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-wight m-b-0">تعديل الصفحة </h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form class="p-t-20" method="POST" action="{{route('About.update',$page->id)}}" enctype="multipart/form-data">
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
                                                <label for="AR" class="control-label">عنوان الصفحة <span class="text-danger">*</span>
                                                </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="text" id="AR" class="form-control"
                                                            placeholder="اضف عنوان مناسب للصفحة"
                                                            value="{{$page->title_ar}}" required name="ar_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <label for="textarea_ar">وصف المقالة</label>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="description_ar">
                                                                    {!! $page->description_ar !!}
                                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">الحالة</label>
                                                <select name="status" class="form-control">
                                                    <option value="1"
                                                        {{$page->status == 1 ? 'selected="selected"' : '' }}>تفعيل
                                                    </option>
                                                    <option value="0"
                                                        {{$page->status == 0 ? 'selected="selected"' : '' }}>ايقاف
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                        <label class="control-label">اضف صورة الخبر</label>
                                        <p>555x263</p>
                                        <br>
                                        <input type="file" id="input-file-now" name="img"  @if(!empty($page->img)) data-default-file="{{ asset($page->img) }}" @endif class="dropify" />
                                    </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="lang_en" role="tabpanel">
                                        <div class="form-group">
                                            <div>
                                                <label for="AR" class="control-label">اسم المقالة </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="text" id="AR" class="form-control"
                                                            placeholder="اضف عنوان مناسب للمقالة" name="en_name" value="{{$page->title_en}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <label for="textarea_ar"> وصف المقالة </label>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="description_en">
                                                    {!! $page->description_en !!}
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
                                    <a href="{{route('About.index')}}" class="btn btn-rounded btn-danger">
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