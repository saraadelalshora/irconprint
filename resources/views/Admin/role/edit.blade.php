@extends('layouts.master')
@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">الصلاحيات </h4>
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
                                        <h4 class="card-white m-b-0">تعديل صلاحية </h4> 
                                </div>
                            <div class="card-body">
                                <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">الطريقه</span></a> </li>
                                        <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="fa fa-folder-o"></i></span> <span class="hidden-xs-down">بيانات</span></a> </li> -->
                                    <ul>
                                </div>
                                <div class="form-group">
                                    <form class=" p-t-20" method="POST" action="{{route('Roles.update',$role->id)}}">
                                    {{ csrf_field () }}
                                    {{ method_field('PATCH') }}
                                        <div class="tab-content">        
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                     
                                                   
                                                        <div class="form-group">
                                                                <label for="AR" class="control-label">اسم التصريح<span class="text-danger">*</span> </label>
                                                                    <div class="input-group-prepend">
                                                                  <input  type="text" class="form-control" name="name" required value="{{$role->name}}" id="exampleInputEmail1" placeholder="اسم التصريح">
                                                                      
                                                                    </div>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="AR" class="control-label"> اسم عرض التصريح <span class="text-danger">*</span> </label>
                                                                <div class="form-group">
                                                                    <div class="input-group-prepend">
                                                                      <input class="form-control"  name="display_name"  required value="{{$role->display_name}}"  placeholder="اسم العرض">
                                                      
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                               <label class="control-label"> الوصف </label>
                                                               <textarea class="form-control"   name="description" placeholder="الوصف"> {{$role->description}} </textarea>
                                                        </div>
                                                        
                                                      
                                                        @foreach($permissions as $permissionss)
                                                        <div class="custom-control custom-checkbox input-group">
                                    <input type="checkbox" name="permission[]" value="{{$permissionss->id}}"  class="custom-control-input" id="basic_checkbox_{{$permissionss->id}}" 
                                     @foreach( $role->permision as $key)
                                     @if($permissionss->id==$key->id) checked  @endif @endforeach />
                                    <label for="basic_checkbox_{{$permissionss->id}}" class="custom-control-label" >{{$permissionss->name}}</label>
                                    </div>
                                    @endforeach
                                                    
                                                
                                            </div>

                                          
                                           

                                        </div>
                                            <div class="col-md-12 form-group">
                                                <div class="text-left">
                                                    <div class="pull-left">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspحفظ</button>
                                                    </div>   
                                                    <div class="pull-right">
                                                        <a href="{{route('Roles.index')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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
