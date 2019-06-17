@extends('layouts.master')

@section('content')
       

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">  التعليقات</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                        <a href="{{route('Product.index')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> المنتجات </button></a>
                         
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
                                        <h4 class="card-title m-b-0"> التعليق  </h4>
                                </div>
                            <div class="card-body">
                                
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="name"> المنتج</th>
                                            <th data-field="name">المستخدم</th>
                                            <th data-field="status">التعليق</th>
                                            <th data-field="status">تقيم</th>
                                            <th data-field="status">الحالة</th>
                                            <th data-field="edit">تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                 
                                        @foreach($all as $value)
                                     
                                        <tr>
                                            <td data-field="state" data-checkbox="true"></td>
                                            <td data-field="name">{{$value->product->name_ar}}</td>
                                            <td data-field="status">{{$value->user->fname." ".$value->user->lname}}</td>
                                          
                                            <td data-field="status">{{$value->comment}}</td>
                                            <td data-field="status">{{$value->rate}}</td>
                                
                                            <td data-field="status">@if($value->approved == 1) تم الموافقة @else لم يتم الموافقة @endif</td>
                        
                                            <td data-field="edit"><button type="button" class="btn btn-sm btn-success btn-rounded m-l-15" ><i class="fa fa-check"></i><a href="{{route('approved',$value->id)}}" style="color: #ffffff;"> @if($value->approved == 1) الغاء النشر  @else  نشر @endif</a></button>
                                           
                                             </form>
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