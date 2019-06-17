@extends('layouts.master')
@section('content')


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">التصنيفات للاقسام الفرعية</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">

            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button> -->

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
                <h4 class="m-b-0">اضافة فلتر</h4>
            </div>
            <div class="card-body">
                <form class=" p-t-20" method="POST" action="{{route('Filter.store')}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="AR" class="control-label"> اسم التصنيف عربي <span
                                        class="text-danger">*</span> </label>
                                <div class="input-group-prepend">
                                    <input name="ar_name" type="text" id="AR" class="form-control"
                                        placeholder="اسم التصنيف" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="AR" class="control-label"> اسم التصنيف انجليزي </label>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <input name="en_name" type="text" id="AR" class="form-control"
                                            placeholder="اسم التصنيف">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">القسم الفرعي <span class="text-danger">*</span> </label>
                                <select class="select2 form-control m-b-10 select2-multiple" name="subcategory[]"
                                    required style="width: 100%" data-placeholder="Choose">
                                    @if(!empty($subcategories)) @foreach($subcategories as $com)
                                    <option value="{{$com->id}}">{{$com->name_ar}}</option>
                                    @endforeach @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"> الحاله </label>
                                <select name="status" class="form-control">
                                    <option value="1">تفعيل</option>
                                    <option value="0">ايقاف</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="text-left">
                                <div class="pull-left">
                                    <button class="btn btn-rounded btn-success"><span class="fa fa-send">
                                        </span>&nbsp;&nbsp;حفظ</button>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('Filter.index')}}" class="btn btn-rounded btn-danger"> <span
                                            class="fa fa-sign-out"> </span> &nbsp;&nbsp;العوده </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection