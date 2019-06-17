@extends('layouts.master')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-white m-b-0">الاعلانات

                </h4>
            </div>
            <div class="card-body">
                <div class="col-md-12 form-group">
                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1"
                                role="tab"><span class="hidden-sm-up"><i class="ti-announcement"></i></span> <span
                                    class="hidden-xs-down"> الاعلان الأول </span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span
                                    class="hidden-sm-up"><i class="ti-announcement"></i></span> <span
                                    class="hidden-xs-down"> الاعلان الثانى </span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><span
                                    class="hidden-sm-up"><i class="ti-announcement"></i></span> <span
                                    class="hidden-xs-down"> الاعلان الثالث </span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home4" role="tab"><span
                                    class="hidden-sm-up"><i class="ti-announcement"></i></span> <span
                                    class="hidden-xs-down"> الاعلان الرابع </span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home5" role="tab"><span
                                    class="hidden-sm-up"><i class="ti-announcement"></i></span> <span
                                    class="hidden-xs-down">الاعلان الخامس<span></a> </li>

                        <ul>
                </div>
                <div class="form-group">
                    <form class=" p-t-20" method="POST" action="{{route('Ads.update',$ads->id)}}" method="post"
                        enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }} 
                        <div class="tab-content">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">اضافه صوره الاعلان</label>

                                            <input type="file" name="img1" id="input-file-now"  class="dropify"  @if(!empty($ads->img1)) data-default-file="{{ asset($ads->img1) }}" @endif />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">تفاصيل الاعلان</label>
                                            <textarea name="description1" class="form-control" style="height:200px"
                                                placeholder="تفاصيل الاعلان">{{$ads->description1}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-12 col-md-12">

                                        <div class="form-group ">
                                            <label class="control-label"> Url link </label>

                                            <input type="text" name="link1" value="{{$ads->link1}}"  class="form-control" />
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label"> الحاله </label>
                                            <select name="status1" class="form-control">
                                            <option value="1"{{$ads->status1 == 1 ? 'selected="selected"' : '' }} >تفعيل</option>
                                                            <option value="0" {{$ads->status1 == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="home2" role="tabpanel">
                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">اضافه صوره الاعلان</label>

                                            <input type="file" id="input-file-now" name="img2" class="dropify" @if(!empty($ads->img2)) data-default-file="{{ asset($ads->img2) }}" @endif />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">تفاصيل الاعلان</label>
                                            <textarea name="description2" class="form-control" style="height:200px"
                                                placeholder="تفاصيل الاعلان">{{$ads->description2}}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-12 col-md-12">

                                       
                                    <div class="form-group ">
                                            <label class="control-label"> Url link </label>

                                            <input type="text" name="link2" value="{{$ads->link2}}"  class="form-control" />
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label"> الحاله </label>
                                            <select name="status2" class="form-control">
                                            <option value="1"{{$ads->status2 == 1 ? 'selected="selected"' : '' }} >تفعيل</option>
                                                            <option value="0" {{$ads->status2 == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="home3" role="tabpanel">
                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">اضافه صوره الاعلان</label>

                                            <input type="file" id="input-file-now" name="img3" class="dropify" @if(!empty($ads->img3)) data-default-file="{{ asset($ads->img3) }}" @endif />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">تفاصيل الاعلان</label>
                                            <textarea class="form-control" name="description3" style="height:200px"
                                                placeholder="تفاصيل الاعلان">{{$ads->description3}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-12 col-md-12">

                                     
                                    <div class="form-group ">
                                            <label class="control-label"> Url link </label>

                                            <input type="text" name="link3" value="{{$ads->link3}}" class="form-control" />
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label"> الحاله </label>
                                            <select name="status3" class="form-control">
                                            <option value="1"{{$ads->status3 == 1 ? 'selected="selected"' : '' }} >تفعيل</option>
                                                            <option value="0" {{$ads->status3 == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="home4" role="tabpanel">
                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">اضافه صوره الاعلان</label>

                                            <input type="file" name="img4" id="input-file-now" class="dropify" @if(!empty($ads->img4)) data-default-file="{{ asset($ads->img4) }}" @endif />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">تفاصيل الاعلان</label>
                                            <textarea class="form-control" name="description4" style="height:200px"
                                                placeholder="تفاصيل الاعلان">{{$ads->description4}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-12 col-md-12">

                                     
                                    <div class="form-group ">
                                            <label class="control-label"> Url link </label>

                                            <input type="text" name="link4" value="{{$ads->link4}}" class="form-control" />
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label"> الحاله </label>
                                            <select name="status4" class="form-control">
                                            <option value="1"{{$ads->status4 == 1 ? 'selected="selected"' : '' }} >تفعيل</option>
                                                            <option value="0" {{$ads->status4 == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="home5" role="tabpanel">
                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">اضافه صوره الاعلان</label>

                                            <input type="file" name="img5" id="input-file-now" class="dropify" @if(!empty($ads->img5)) data-default-file="{{ asset($ads->img5) }}" @endif />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">تفاصيل الاعلان</label>
                                            <textarea class="form-control" name="description5" style="height:200px"
                                                placeholder="تفاصيل الاعلان">{{$ads->description5}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-12 col-md-12">

                                      
                                    <div class="form-group ">
                                            <label class="control-label"> Url link </label>

                                            <input type="text" name="link5" value="{{$ads->link5}} " class="form-control" />
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label"> الحاله </label>
                                            <select name="status5" class="form-control">
                                            <option value="1"{{$ads->status5 == 1 ? 'selected="selected"' : '' }} >تفعيل</option>
                                                            <option value="0" {{$ads->status5 == 0 ? 'selected="selected"' : '' }}>ايقاف</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-12 form-group">
                            <div class="text-left">
                                <div class="pull-left">
                                    <button class="btn btn-rounded btn-success"><span class="fa fa-send">
                                        </span>&nbsp&nbspحفظ</button>
                                </div>
                                <div class="pull-right">
                                    <a href="/admin/categories" class="btn btn-rounded btn-danger"> <span
                                            class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
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