@extends('layouts.master')
@section('content')
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
                                    <form class=" p-t-20" method="POST" action="{{route('Manufactor.update',$manufactor->id)}}"  enctype="multipart/form-data">               
                                    {{csrf_field()}}                                  
                                    {{ method_field('PATCH') }}
                                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="AR" class="control-label"> اسم المصنع عربي<span class="text-danger">*</span> </label>
                                <div class="input-group-prepend">
                                    <input name="ar_name" value="{{$manufactor->name_ar}}" type="text" id="AR" class="form-control"
                                        placeholder=" اسم المصنع عربي" required >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="AR" class="control-label"> اسم المصنع انجليزي </label>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <input name="en_name" type="text" value="{{$manufactor->name_en}}" id="AR" class="form-control"
                                            placeholder="اسم المصنع انجليزي" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"> الحاله </label>
                                <select name="status" class="form-control">
                                <option value="1"{{$manufactor->status == 1 ? 'selected="selected"' : '' }} >تفعيل</option>
                                <option value="0" {{$manufactor->status == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                                          <div class="col-lg-6 col-md-6">
                                                 <div class="card">
                                                      <div class="card-body">
                                                                 <input type="file" id="input-file-now" name="img" class="dropify" />
                                                          </div>
                                                  </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                 <div class="card">
                                                      <div class="card-body">
                                                          @if($manufactor->img)
                                                      <img src="{{asset($manufactor->img)}}"  width="40" >
                                                      @endif
                                                    </div>
                                                  </div>
                                            </div>
                         </div>
                        <div class="col-md-12 form-group">
                            <div class="text-left">
                                <div class="pull-left">
                                    <button class="btn btn-rounded btn-success"><span class="fa fa-send">
                                        </span>&nbsp;&nbsp;حفظ</button>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('Manufactor.index')}}" class="btn btn-rounded btn-danger"> <span
                                            class="fa fa-sign-out"> </span> &nbsp;&nbsp;العوده </a>
                                </div>
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