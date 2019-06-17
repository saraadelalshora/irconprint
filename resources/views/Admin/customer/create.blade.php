@extends('layouts.master')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
     
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">عملائنا</h4>
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
                                        <h4 class="card-white m-b-0">اضافه عميل جديد</h4> 
                                </div>
                            <div class="card-body">
                                <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"> الرئيسية </span></a> </li>
                                       
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="fa fa-comment-o"></i></span> <span class="hidden-xs-down"> ملاحظات العميل </span></a> </li>
                                       
                                        <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><span class="hidden-sm-up"><i class="fa fa-link"></i></span> <span class="hidden-xs-down"> المعاملات </span></a> </li> -->
                                     
                                    <ul>
                                </div>
                                <div class="form-group">
                                <form class="p-t-20" method="POST" action="{{route('Customer.store')}}">
                                    {{csrf_field()}}
                                        <div class="tab-content">        
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                    <div class="row">
                                                            <div class="col-lg-12">
                                                                            <div class="form-body">
                                                                                <h3 class="card-title">تفاصيل العميل</h3>
                                                                                <hr>
                                                                                <div class="row p-t-20">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">الاسم الاول <span class="text-danger">*</span></label>
                                                                                            <input type="text" id="firstName" name="fname" class="form-control" required placeholder="الاسم الاول">
                                                                                    </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">الاسم الاخير <span class="text-danger">*</span> </label>
                                                                                            <input type="text" id="lastName" name="lname" class="form-control form-control-danger" required placeholder="الاسم الاخير">
                                                                                    </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                </div>
                                                                                <!--/row-->
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">البريد الالكترونى <span class="text-danger">*</span> </label>
                                                                                            <input type="text" id="ُEmail" class="form-control" name="email" required  placeholder="البريد الالكترونى">

                                                                                    </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">رقم الهاتف </label>
                                                                                            <input type="tel" class="form-control" name="phone" placeholder="رقم الهاتف">
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                </div>
                                                                               
                                                                                
                                                                                <h3 class="box-title m-t-40">العنوان</h3>
                                                                                <hr>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 ">
                                                                                        <div class="form-group">
                                                                                            <label>العنوان</label>
                                                                                            <input type="text" name="address" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label>الرمز البريدي</label>
                                                                                                    <input type="text" name="zipcode" class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                    <!-- <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label>المدينه</label>
                                                                                            <input type="text" class="form-control">
                                                                                        </div>
                                                                                    </div> -->
                                                                                    <!--/span-->
                                                                                    
                                                                                    <!--/span-->
                                                                                </div>
                                                                                <!--/row-->
                                                                                <div class="row">
                                                                                <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label>الدوله</label>
                                                                                        

                                                                                            <select class="form-control m-b-10 select2-multiple"  name="country_id" id="Country" required data-validation-required-message="هذا الحقل مطلوب">
                                                                                              <option disabled="disabled" selected="selected">Select</option>
                                                                                             @if(isset($countries))
                                                                                             @foreach($countries as $country)
                                                                                             <option value="{{$country->id}}">{{$country->name_ar}}</option>
                                                                                             @endforeach
                                                                                             @endif
                                                                                         </select>
                                                                                        </div>
                                                                                    </div>
                                                                                        <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label> المدينة</label>
                                                                                                    <select class="form-control m-b-10 select2-multiple"  name="city_id" id="City" required data-validation-required-message="هذا الحقل مطلوب">
                                                                                                           
                                                                                                     </select>
                                                                                                </div>
                                                                                            </div>
                                                                                    <!--/span-->
                                                                                   
                                                                                    <!--/span-->
                                                                                </div>
                                                                                     <!--/row-->
                                                                                <h3 class="box-title m-t-40">كلمه المرور</h3>
                                                                                    <hr>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                    <label class="control-label">كلمه المرور <span class="text-danger">*</span></label>
                                                                                                    <input type="password" name="password" class="form-control" placeholder="كلمه المرور" required>
                                                                                                </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                    <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                    <label class="control-label">تاكيد كلمه المرور<span class="text-danger">*</span></label>
                                                                                                    <input type="password" id="password-confirm"  name="password_confirmation"  class="form-control" required placeholder="تاكيد كلمه المرور">
                                                                                                </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                </div>
                                                                                <!--/row-->
                                                                               
                                                                            </div>
                                                                           
                                                            </div>
                                                        </div>
                                            </div>

                                            <div class="tab-pane" id="home2" role="tabpanel">
                                                    <h3 class="card-title">ملاحظات</h3>
                                                    <hr>
                                                    
                                                        <h3 class="box-title m-t-40">اضافه ملاحظه</h3>
                                                        <hr>
                                                        <div class="row p-t-20">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">تعليق</label>
                                                                        <textarea  class="form-control" placeholder="اكتب تعليق" style="height:120px" name="note"></textarea>
                                                                </div>
                                                                </div>
                                                                <!--/span-->
                                                               
                                                            </div>
                                              
                                            </div>
                                             
                                            <!-- <div class="tab-pane" id="home3" role="tabpanel">
                                                    <h3 class="card-title">المعاملات</h3>
                                                    <hr>
                                                    <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>المنتج</th>
                                                                            <th>الموديل</th>
                                                                            <th>الكميه</th>
                                                                            <th>سعر الوحدة</th>
                                                                            <th>الاجمالي</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Hp i3.0</td>
                                                                            <td>product 21</td>
                                                                            <td>4</td>
                                                                            <td>100</td>
                                                                            <td>400</td>
                                                                        </tr>
                                                                       
                                                                    </tbody>
                                                                </table>
                                                    </div>
                                              
                                            </div> -->
                                        </div>
                                            <div class="col-md-12 form-group">
                                                <div class="text-left">
                                                    <div class="pull-left">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspحفظ</button>
                                                    </div>   
                                                    <div class="pull-right">
                                                    <a href="{{route('Customer.index')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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
<script type="text/javascript">
    $('#Country').change(function(){
        $("#City").empty();
       
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('City-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#City").empty();
                $("#City").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#City").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#City").empty();
            }
           }
        });
    }else{
        $("#City").empty();
      
    }      
   });
   </script>
 <!-- this js validate img form -->

@endsection
@endsection