@extends('layouts.master')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">الادمن</h4>
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
                                        <h4 class="card-white m-b-0">  اضافة جديد</h4>
                                </div>
                            <div class="card-body">

                                <div class="form-group">
                                <form class="p-t-20" method="POST" action="{{route('User.store')}}">
                                    {{csrf_field()}}
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                    <div class="row">
                                                            <div class="col-lg-12">
                                                                            <div class="form-body">
                                                                                <h3 class="card-title">التفاصيل</h3>
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
                                                                                            <label class="control-label">البريد الالكتروني <span class="text-danger">*</span> </label>
                                                                                            <input type="text" id="ُEmail" class="form-control" name="email" required  placeholder="البريد الالكتروني">

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
                                                                                <!--/row-->

                                                                                     <!--/row-->
                                                                                <h3 class="box-title m-t-40">كلمة السر</h3>
                                                                                    <hr>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                    <label class="control-label">كلمة السر <span class="text-danger">*</span></label>
                                                                                                    <input type="password" name="password" class="form-control" placeholder="كلمة السر" required>
                                                                                                </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                    <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                    <label class="control-label">تاكيد كلمة السر <span class="text-danger">*</span></label>
                                                                                                    <input type="password" id="password-confirm"  name="password_confirmation"  class="form-control" required placeholder="تاكيد كلمة السر">
                                                                                                </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                </div>
                                                                                <!--/row-->

                                                                            </div>

                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                            <div class="col-md-12 form-group">
                                                <div class="text-left">
                                                    <div class="pull-right">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbsp Save</button>
                                                    </div>
                                                    <div class="pull-left">
                                                    <a href="{{route('User.index')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbsp Back </a>
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
