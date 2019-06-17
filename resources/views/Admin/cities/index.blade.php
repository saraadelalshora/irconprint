@extends('layouts.master')

@section('content')
       

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"> المدن</h4>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4 class="card-title m-b-0">قائمة المدن  </h4>
                                </div>
                            <div class="card-body">
                                
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="name">أسم المدينة عربي</th>
                                            <th data-field="email"> اسم المدينة انجليزي</th>                                
                                            <th data-field="name">اسم الدولة</th>
                                            <th data-field="edit">تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                 
                                        @foreach($all_City as $value)
                                     
                                        <tr>
                                            <td data-field="state" data-checkbox="true"></td>
                                            <td data-field="name">{{$value->name_ar}}</td>
                                            <td data-field="name">{{$value->name_en}}</td>
                                            <td data-field="name">{{$value->country->name_ar}}</td>
                        
                                            <td data-field="edit"><button type="button" class="btn btn-sm btn-success btn-rounded m-l-15" ><i class="fa fa-check"></i><a href="{{route('Cities.edit',$value->id)}}" style="color: #ffffff;"> تعديل</a></button>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                </div>
               

                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->



@endsection