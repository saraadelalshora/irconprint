@extends('layouts.master')
@section('meta')
<title> الخدمات</title>
@endsection
@section('content')
            <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">الخدمات</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">

                            <a href="{{route('Service.create')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button></a>
                            <!-- <button type="button" class="btn btn-danger m-l-15"><i class="fa fa-close"></i> مسح</button> -->

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Service Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4 class="card-title m-b-0">قائمة الخدمات</h4>
                                </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table  id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="name">أسم الخدمة</th>
                                            <th data-field="status"> الحالة</th>
                                            <th data-field="edit">تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody >

                                    @foreach($all as $value)

                                     <tr>
                                         <td data-field="state" data-checkbox="true"></td>
                                         <td data-field="name">{!!$value->title_ar!!}</td>

                                         <td data-field="status">@if($value->status == 1) مفعل @else غير مفعل @endif</td>

                                         <td data-field="edit"><a href="{{route('Service.edit',$value->id)}}" style="color: #ffffff;"><button type="button" class="btn btn-sm btn-success btn-rounded m-l-15" ><i class="fa fa-check"></i> تعديل</button></a>
                                         <!-- <button type="button" class="btn btn-sm btn btn-info btn-rounded m-l-15" ><i class="fa fa-eye"></i><a href="{{route('Service.show',$value->id)}}" style="color: #ffffff;"> عرض</a></button> -->
                                         <!-- <form  action="{{ route('Service.destroy',$value->id) }}"  style="display: inline;"  method="POST" accept-charset="utf-8">
                                             {{csrf_field()}}
                                             {{method_field('DELETE')}}

                                         <button  class="btn btn-sm btn-danger btn-rounded m-l-15" type="submit" onclick="return confirm('هل تريد الحذف')"><i class="fa fa-times"></i> حذف</button>
                                          </form> -->
                                     </td>
                                     </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

@endsection
