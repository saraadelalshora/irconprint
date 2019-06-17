@extends('layouts.master')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">طرق الشحن </h4>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body wizard-content">
                                <h4 class="card-title">تعديل  طريقه شحن</h4>
                               
                                <form action="{{route('Shipping.update',$shipping->id)}}" class="tab-wizard wizard-circle create" method="Post" >
                                   {{csrf_field()}}  
                                   {{ method_field('PATCH') }} 
                                    <!-- Step 1 -->
                                    <h6>الطريقه</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                     <label for="AR" class="control-label">  اسم الطريقه عربي <span class="text-danger">*</span> </label>
                                                        <div class="input-group-prepend">
                                                            <input name="ar_name" type="text" value="{{$shipping->name_ar}}" id="AR" class="form-control" required placeholder="اسم الطريقه" name="">
                                                        </div> 
                                                </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label for="AR" class="control-label"> اسم الطريقه انجليزي </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input name="en_name" value="{{$shipping->name_en}}" type="text" id="AR" class="form-control" placeholder="اسم الطريقه" name="">
                                                                </div>
                                                 </div>  
                                            </div>
                                        </div>
                                    </section>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>البيانات </h6>
                                    <section>
                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label class="control-label"> النوع <span class="text-danger">*</span> </label>
                                                        <select name="type" class="form-control" required>
                                                            <option value="1" {{$shipping->type == 1 ? 'selected="selected"' : '' }}>شحن مجاني</option>
                                                            <option value="0" {{$shipping->type == 0 ? 'selected="selected"' : '' }}>شحن غير مجاني</option>
                                                        </select>
                                                    </div> 
                                                </div> 
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label"> الحاله </label>
                                                        <select name="status" class="form-control">
                                                            <option value="1"{{$shipping->status == 1 ? 'selected="selected"' : '' }} >تفعيل</option>
                                                            <option value="0" {{$shipping->status == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                                        </select>
                                                </div>
                                            </div>
                                    </div>
                                            <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                 <label class="control-label">السعر</label>
                                                 <input type="text" name="price" id="price" value="{{$shipping->price}}"  disabled class="form-control">
                                                </div>
                                             </div>
                                              <div class="col-md-6">
                                                 <div class="form-group">
                                                 <label class="control-label"> المدن </label>
                                                        <select name="city[]"  class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                        @foreach($all_city as $city)
                                                            <option value="{{$city->id}}" @foreach($shipping->cities as $city1)@if($city1->id == $city->id )selected @endif @endforeach>{{$city->name_ar}}</option> 
                                                            @endforeach 
                                                        </select>
                                                </div>
                                            </div>
                                           
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
 @section('js')               
<script type="text/javascript">
        $("select[name='type']").change(function () {
            if( $(this).val() == "1" ){
                //Replace alert() with your pop-up
                $("#price").attr('disabled','disabled');
            }
            else{
                //Replace alert() with your pop-up
                $("#price").removeAttr('disabled');
            }
        });
    </script>

@endsection

@endsection