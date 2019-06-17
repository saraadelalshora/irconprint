@extends('layouts.master')
@section('content')
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">صفات المتجات</h4>
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

<div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('Spacification.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}  
                            <h4 class="card-title" style="color:#fb9678">أضافة وصف</h4>
                            <br>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم الوصف عربى<span class="text-danger">*</span></label>
                                        <input type="text" name="spec_name_ar" class="form-control" placeholder="اسم الوصف هنا " required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم الوصف انجليزى</label>
                                        <input type="text" name="spec_name_en" class="form-control" placeholder="اسم الوصف هنا">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الترتيب <span class="text-danger">*</span></label>
                                        <input type="number" name="spec_number" class="form-control" min="1" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label class="control-label"> الحاله </label>
                                                        <select name="status" class="form-control">
                                                            <option value="1">تفعيل</option>
                                                            <option value="0">ايقاف</option>
                                                        </select>
                                                </div>
                                            </div>
                                 <div class="col-md-6">
                                   <!-- <div class="form-group">
                                        <label class="control-label">الجروب <span class="text-danger">*</span> </label>
                                        <select class=" form-control" name="group_spec" required>
                                            <option disabled="disabled" selected="true">-- Please select --</option>
                                          {{--  @if(!empty($filter)) @foreach($filter as $com)--}}
                                            <option value="{{--$com->id--}}">{{--$com->name_ar--}}</option>
                                           {{-- @endforeach @endif--}}
                                        </select>
                                    </div>-->
                                </div> 
                                <div class="col-md-6">
                                    <!-- <div class="form-group">
                                        <label class="control-label">النوع </label>
                                        <select class=" form-control " id="type" name="spec_type" style="width: 100%; height:36px;">
                                            <option disabled="disabled" selected="true">Choose</option>
                                            <option value="1">Text</option>
                                            <option value="0">Select</option>
                                        </select>
                                    </div> -->
                                </div>

                                <div class="clearfix"></div>
                                <br>
                                <div class="box-body multiselectDiv">
                                 
                                <label class="control-label">خصائص المواصفات </label>
                                    <div class="form-group col-md-12 m-t-20">
                                        <input type="text" name="spec_tage_ar" class="form-control" placeholder="المحتوى عربى" data-role="tagsinput">
                                    </div>
                                    <div class="form-group col-md-12 m-t-20">
                                        <input type="text" name="spec_tage_en" class="form-control" placeholder="المحتوى انجليزى" data-role="tagsinput">
                                    </div>
                                </div>
                                <div class="col-md-12"></div>
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>التفاصيل</label>
                                        <textarea class="form-control" rows="5" name="spec_desc"></textarea>
                                    </div>
                                </div> -->
                                <div class="clearfix"></div>
                                <br>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn waves-effect waves-light btn-outline-success">
                                            <i class="fa fa-check"></i>
                                            <span>حفظ</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a href="{{route('Spacification.index')}}" class="btn waves-effect  waves-light btn-outline-danger pull-right">
                                            <i class="fa fa-close"></i>
                                            <span>رجوع</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @section('js')
<script>
    jQuery(document).ready(function () {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();

    });
</script>
<script>
    // $(function () {
    //     $(".multiselectDiv").hide();
    //     $("#type").change(function (e) {

    //         var type = $(this).val();
    //         if (type == 0) {
    //             $(" .multiselectDiv").slideDown(2000);
    //         } else {
    //             $(" .multiselectDiv").slideUp(2000);
    //         }
    //     });


    // });
</script>
@endsection 
                @endsection