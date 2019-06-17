@extends('layouts.master')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">تعديل كوبون</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <!-- <div class="d-flex justify-content-end align-items-center">

                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i>
                                إضافة </button>
                            <button type="button" class="btn btn-danger m-l-15"><i class="fa fa-close"></i> مسح</button>

                        </div> -->
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
                <h4 class="card-white m-b-0">تعديل كوبون </h4>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <form class=" p-t-20" method="POST" action="{{route('Coupon.update',$coupon->id)}}">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-body">
                                    <h3 class="card-title">تفاصيل العميل</h3>
                                    <hr>
                                    <div class="row p-t-20">
                                 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>نوع الخصم<span class="text-danger">*</span></label>
                                                <select class="form-control custom-select" name="coupon_type" Required>
                                                    <option selected="selected" disabled="disabled">--اختر نوع الخصم--
                                                    </option>
                                                    <option value="0" {{$coupon->coupon_type == 0 ? 'selected="selected"' : '' }}>نسبة مئوية</option>
                                                    <option value="1" {{$coupon->coupon_type == 1 ? 'selected="selected"' : '' }}>قيمة مالية</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">وصف</label>
                                                <textarea class="form-control" name="description" placeholder="اكتب وصف"
                                                    style="height:120px">{{$coupon->description}}</textarea>
                                            </div>
                                            <!--/span-->

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">قيمه الكوبون</label>
                                            <input type="text" id="amount" name="value" value="{{$coupon->value}}" class="form-control "
                                                placeholder="قيمه الكوبون">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">تاريخ بداية الكوبون <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" id="sdate" name="startdate" class="form-control"
                                                placeholder="تاريخ بداء الكوبون" required value="{{date('Y-m-d', strtotime($coupon->startdate))}}">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">تاريخ انتهاء الكوبون <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" id="edate" name="enddate" class="form-control"
                                                placeholder="تاريخ انتهاء الكوبون" required value="{{date('Y-m-d', strtotime($coupon->enddate))}}">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"> الحاله </label>
                                            <select name="status" class="form-control">
                                                <option value="1"{{$coupon->status == 1 ? 'selected="selected"' : '' }}>تفعيل</option>
                                                <option value="0"{{$coupon->status == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">الحد الاقصى لاستخدام الكوبون <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" min="1" id="max" name="maxvalue" class="form-control"
                                                placeholder="الحد الاقصى لاستخدام الكوبون" value="{{$coupon->maxvalue}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="pro-type">

                                            <label class="container_radio">
                                                <input type="checkbox" name="select1" value="pro1"   @if($coupon_product->first()->out_product_id) checked @endif >استبعاد المنتجات
                                                <span class="checkmark"></span>

                                            </label>
                                            <label class="container_radio">
                                                <input type="checkbox" name="select2" value="pro2"  @if($coupon_product->first()->product_id) checked @endif> المنتجات
                                                <span class="checkmark"></span>

                                            </label>
                                            <label class="container_radio">
                                                <input type="checkbox" name="select3" value="pro3"  @if($coupon_product->first()->Category_id) checked @endif> الاقسام
                                                <span class="checkmark"></span>

                                            </label>
                                            <label class="container_radio">
                                                <input type="checkbox" name="select4" value="pro4"  @if($coupon_product->first()->out_Category_id) checked @endif> استبعاد الاقسام
                                                <span class="checkmark"></span>

                                            </label>


                                        </div>


                                        <div class="form-group pro-select">

                                            <div class="p-t-20 " id="pro1" style="display: none;">
                                                <label class="control-label">
                                                    استبعاد المنتجات
                                                </label>
                                                <select class="select2 m-b-10 select2-multiple" style="width: 100%"
                                                    name="out_coupon_product[]" multiple="multiple"
                                                    data-placeholder="Choose">
                                                    @if(isset($products))
                                                    @foreach($products as $product)
                                                    <option value="{{$product->id}}" {{$coupon_product->first()->out_product_id == $product->id ? 'selected="selected"' : '' }}>{{$product->name_ar}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="p-t-20" id="pro2" style="display: none;">
                                                <label class="control-label">
                                                    المنتجات
                                                </label>
                                                <select class="select2 m-b-10 select2-multiple" style="width: 100%"
                                                    multiple="multiple" name="coupon_product[]"
                                                    data-placeholder="Choose">
                                                    @if(isset($products))
                                                    @foreach($products as $product)
                                                    <option value="{{$product->id}}" {{$coupon_product->first()->product_id == $product->id ? 'selected="selected"' : '' }}>{{$product->name_ar}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="p-t-20" id="pro3" style="display: none;">
                                                <label class="control-label">

                                                    الاقسام
                                                </label>
                                                <select class="select2 m-b-10 select2-multiple" style="width: 100%"
                                                    name="coupon_category[]" multiple="multiple"
                                                    data-placeholder="Choose">
                                                    @if(isset($categories))

                                                    @foreach($categories as $category)
                                                    @if(isset($category))
                                                    <optgroup label="قسم:{{$category->name_ar}}">
                                                        @if(isset($category->subcategories))
                                                        @foreach($category->subcategories as $sub)
                                                        <option value="{{$sub->id}}" {{$coupon_product->first()->Category_id == $sub->id ? 'selected="selected"' : '' }}>{{$sub->name_ar}}</option>
                                                        @endforeach
                                                        @endif

                                                    </optgroup>

                                                    @endif
                                                    @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="p-t-20" id="pro4" style="display: none;">
                                                <label class="control-label">
                                                    استبعاد الاقسام
                                                </label>
                                                <select class="select2 m-b-10 select2-multiple" style="width: 100%"
                                                    name="out_coupon_category[]" multiple="multiple"
                                                    data-placeholder="Choose">
                                                    @if(isset($categories))

                                                    @foreach($categories as $category)
                                                    @if(isset($category))
                                                    <optgroup label="قسم:{{$category->name_ar}}">
                                                        @if(isset($category->subcategories))
                                                        @foreach($category->subcategories as $sub)
                                                        <option value="{{$sub->id}}" {{$coupon_product->first()->out_Category_id == $sub->id ? 'selected="selected"' : '' }}>{{$sub->name_ar}}</option>
                                                        @endforeach
                                                        @endif

                                                    </optgroup>

                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label>حد الاستخدام لكل كوبون</label>
                                            <input type="number" name="limit_per_user" class="form-control" value="{{$coupon->limit_per_user}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label>حد الاستخدام لكل مستخدم</label>
                                            <input type="number" name="usinglimit" class="form-control" value="{{$coupon->usinglimit}}">
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
                            <a href="/admin/categories" class="btn btn-rounded btn-danger"> <span
                                    class="fa fa-sign-out">
                                </span> &nbsp&nbspالعوده </a>
                        </div>
                        </div>
                      </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>

@section('js')

<!-- <script type="text/javascript">
        // $("select[name='coupon_type']").change(function () {
        //     if( $(this).val() == "1" ){
        //         //Replace alert() with your pop-up
        //         $("#amount").removeAttr('disabled');
              
        //     }
        //     else{
        //         //Replace alert() with your pop-up
        //         $("#amount").attr('disabled','disabled');
        //     }
        // });
    </script> -->

<script>
 
    // $(".pro-type input[type='checkbox']").change(function () {
    //     var inputValue = $(this).attr("value");
    //     if ($(this).is(':checked')) {
    //           $("#" + inputValue).show();

    //         } else {
    //           $("#" + inputValue).hide();
    //         }
    // });
 
    $(function () {
        $(".pro-type input[type='checkbox']").click(function () {
            if ($(this).is(':checked')) {
                $(".pro-type input[type='checkbox']").not(this).attr('disabled', true);
                $(".pro-select").show(1000);
            } else {
                $(".pro-type input[type='checkbox']").not(this).attr('disabled', false);
                $(".pro-select").hide(1000);

            }

        });


    });
   
    $(".pro-type input[type='checkbox']").change(function () {
        $('select').val(null).trigger('change');
       
        var $value = $(this).val();
        var $selector = $('.pro-select');
        if ($value == 'pro1') {
            $selector.find('#pro1').show();
            $selector.find('#pro2').hide();
            $selector.find('#pro3').hide();
            $selector.find('#pro4').hide();

        } else if ($value == 'pro2') {
            $selector.find('#pro2').show();
            $selector.find('#pro1').hide();
            $selector.find('#pro3').hide();
            $selector.find('#pro4').hide();

        } else if ($value == 'pro3') {
            $selector.find('#pro3').show();
            $selector.find('#pro1').hide();
            $selector.find('#pro2').hide();
            $selector.find('#pro4').hide();

        } else {
            $selector.find('#pro4').show(1000);
            $selector.find('#pro1').hide(1000);
            $selector.find('#pro2').hide(1000);
            $selector.find('#pro3').hide(1000);
        }

    });

   
</script>

@endsection
@endsection