@extends('layouts.master')
@section('content')
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4 class="card-white m-b-0">تعديل المدينه</h4> 
                                </div>
                            <div class="card-body">
                              
                                <div class="form-group">
                                    <form class=" p-t-20" method="POST" action="{{route('Cities.update',$city->id)}}">
                                    {{csrf_field()}}                                  
                                    {{ method_field('PATCH') }}
                                               <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">اسم المدينه عربي</label>
                                                    <input type="text"  class="form-control" placeholder="اسم المدينه عربي" name="ar_name" value="{{$city->name_ar}}"/>
                                                  
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">اسم المدينه English</label>
                                                    <input type="text"  class="form-control" placeholder="اسم المدينه English" name="en_name" value="{{$city->name_en}}"/>
                                                </div>
                                                    <div class="form-group col-md-6">
                                                            <label class="control-label"> اختر الدوله</label>
                                                        <select name="country" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}"{{$country->id == $city->country->id ? 'selected="selected"' : '' }} >{{$country->name_ar}}</option>                      
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                   
                                               </div>
                                            <div class=" form-group col-md-12">
                                                <div class="text-left">
                                                    <div class="pull-left">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspحفظ</button>
                                                    </div>   
                                                    <div class="pull-right">
                                                        <a href="{{route('Cities.index')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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