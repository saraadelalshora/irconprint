@extends('layouts.master')
@section('content')
              
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">طرق الدفع</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">

            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> تعدبل </button>

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
                                        <h4 class="card-white m-b-0">تعديل طريقه الدفع</h4> 
                                </div>
                            <div class="card-body">
                                <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">الطريقه</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="fa fa-folder-o"></i></span> <span class="hidden-xs-down">بيانات</span></a> </li>
                                    <ul>
                                </div>
                                <div class="form-group">
                                    <form class=" p-t-20" method="POST" action="{{route('Payment.update',$payment->id)}}">
                                    {{csrf_field()}}                                  
                                    {{ method_field('PATCH') }}
                                        <div class="tab-content">        
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                     
                                                   
                                                        <div class="form-group">
                                                                <label for="AR" class="control-label">اسم الطريقه عربي <span class="text-danger">*</span></label>
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" id="AR" class="form-control" value="{{$payment->name_ar}}" placeholder=" اسم الطريقه عربي" name="ar_name" required>
                                                                    </div>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="AR" class="control-label"> اسم الطريقه انجليزي</label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text" id="AR" class="form-control" value="{{$payment->name_en}}" placeholder="اسم الطريقه انجليزي" name="en_name">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                
                                            </div>

                                            <div class="tab-pane" id="home2" role="tabpanel">
                                              
                                                <div class="form-group">
                                                    <label class="control-label"> الحاله </label>
                                                    <select name="status" class="form-control">
                                <option value="1"{{$payment->status == 1 ? 'selected="selected"' : '' }} >تفعيل</option>
                                <option value="0" {{$payment->status == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                </select>
                                                </div>
                                            </div>
                                             
                                           

                                        </div>
                                            <div class="col-md-12 form-group">
                                                <div class="text-left">
                                                    <div class="pull-left">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspحفظ</button>
                                                    </div>   
                                                    <div class="pull-right">
                                                        <a href="{{route('Payment.index')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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