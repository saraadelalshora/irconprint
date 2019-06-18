@extends('layouts.master')
@section('content')
   <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">التدريبات</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <a href="{{ route('training.create')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button></a>
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
                                        <h4 class="card-title m-b-0">قائمة التدريبات</h4>
                                </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table  id="example23" class="display nowrap table table-hover table-striped table-bordered"  >
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="name">أسم التدريب</th>
                                            <th data-field="catname">أسم القسم</th>
                                            <th data-field="status">الحالة</th>

                                            <th data-field="edit">تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datafilter">
                                        @foreach($all as $value)
                                        <tr>
                                            <td data-field="state" data-checkbox="true"></td>
                                            <td data-field="name"> {{$value->name_ar}}</td>
                                            <td data-field="catname">{{$value->category->name_ar}} => {{$value->subcategory->name_ar}}</td>
                                             <td data-field="status">@if($value->status == 1) مفعل @else غير مفعل @endif</td>
                        
                                            <td data-field="edit"><button type="button" class="btn btn-sm btn-success btn-rounded m-l-15" ><i class="fa fa-check"></i><a href="{{route('training.edit',$value->id)}}" style="color: #ffffff;"> تعديل</a></button>
                                            <form  action="{{ route('training.destroy',$value->id) }}"  style="display: inline;"  method="POST" accept-charset="utf-8">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                        
                                            <button  class="btn btn-sm btn-danger btn-rounded m-l-15" type="submit" onclick="return confirm('هل تريد الحذف')"><i class="fa fa-times"></i> حذف</button>
                                             </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">فلتر البحث</h4>
                                <div class="col-sm-12 col-xs-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">كلمة البحث</label>
                                            <input type="text" class="form-control" id="searchword" name="searchword" placeholder="البحث">
                                        </div>
                    
                                        <div class="form-group">
                                            <label class="control-label">الحالة</label>
                                            <select class="form-control custom-select" id="status" data-placeholder="Choose a Category" name="status" tabindex="1">
                                                <option value="1">مفعل</option>
                                                <option value="0">غير مفعل</option>
                                            
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" >فلتر</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">الغاء</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div> -->
                </div>
               



@endsection