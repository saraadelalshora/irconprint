@extends('layouts.master')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Admins</h4>
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
                                        <h4 class="card-white m-b-0">التفاصيل</h4>
                                </div>
                            <div class="card-body">

                                <div class="form-group">
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
                                                                                            <label class="control-label">الاسم الاول<span class="text-danger">*</span> </label>
                                                                                            <input type="text" id="firstName" name="fname" required value="{{$customer->fname}}"class="form-control" placeholder="الاسم الاول" disabled>
                                                                                    </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">الاسم الاخير<span class="text-danger">*</span> </label>
                                                                                            <input type="text" id="lastName" name="lname"  required value="{{$customer->lname}}"class="form-control form-control-danger" placeholder="الاسم الاخير" disabled>
                                                                                    </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                </div>
                                                                                <!--/row-->
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">البريد الالكتروني<span class="text-danger">*</span></label>
                                                                                            <input type="text" id="ُEmail" class="form-control" name="email" required value="{{$customer->email}}" placeholder="البريد الالكتروني"disabled>

                                                                                    </div>
                                                                                    </div>
                                                                                    <!--/span-->
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">رقم الهاتف</label>
                                                                                            <input type="tel" class="form-control" name="phone" placeholder="رقم الهاتف"  value="{{$customer->phone}}" disabled>
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
                                                                                            <input type="text" name="address" value="{{$customer->address}}" class="form-control"disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            



                                                                            </div>

                                                            </div>
                                                        </div>
                                            </div>


                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

@endsection
