@extends('layouts.master')
@section('content')
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"> <a href="{{route('Countries.index')}}">الدول</a></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <!-- <a href="5-Add-main-cat.html"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button></a> -->
                            <!-- <button type="button" class="btn btn-danger m-l-15"><i class="fa fa-close"></i> مسح</button> -->
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4 class="card-white m-b-0">تعديل الدوله</h4> 
                                </div>
                            <div class="card-body">
                              
                                <div class="form-group">
                                    <form class=" p-t-20" method="POST" action="{{route('Countries.update',$country->id)}}">               
                                    {{csrf_field()}}                                  
                                    {{ method_field('PATCH') }}
                                               <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">اسم الدوله عربي <span class="text-danger">*</span></label>
                                                    <input type="text" name="ar_name" class="form-control" placeholder="اسم الدوله عربي" required value="{{$country->name_ar}}"/>
                                                  
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">اسم الدوله English</label>
                                                    <input type="text"  name="en_name"class="form-control" placeholder="اسم الدوله English" value="{{$country->name_en}}"/>
                                                </div>
                                               </div>
                                            <div class="col-md-12 form-group">
                                                <div class="text-left">
                                                    <div class="pull-left">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspحفظ</button>
                                                    </div>   
                                                    <div class="pull-right">
                                                        <a href="{{route('Countries.index')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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