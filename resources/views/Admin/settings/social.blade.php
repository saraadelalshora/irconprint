@extends('layouts.master')
@section('content')
              <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">الاعدادات العامة</h4>
                    </div>
                    <!-- <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">

                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button>
                            <button type="button" class="btn btn-danger m-l-15"><i class="fa fa-close"></i> مسح</button>

                        </div>
                    </div> -->
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
                                        <h4 class="card-title m-b-0"> السوشيال</h4>
                                </div>
                            <div class="card-body">
                                <!-- <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"> اعدادات عامه </span></a> </li>

                                    <ul>
                                </div> -->
                                <div class="form-group">
                                 @if($social != null)
                                    <form class=" p-t-20" method="POST" action="{{route('updatesocial',$social->id)}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                              <div class="row">
                                                <div class="form-group col-md-6">

                                                    <label class="control-label"> Facebook</label>
                                                    <input type="text" class="form-control" placeholder="Facebook" name="fb" value="{{$social->fb}}">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Twitter</label>
                                                    <input type="text" class="form-control" placeholder="Twitter" name="tw" value="{{$social->tw}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Instegram</label>
                                                    <input type="text" class="form-control" placeholder="Instegram" name="instegram" value="{{$social->instegram}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Linked in</label>
                                                    <input type="text" class="form-control" placeholder="Linked in" name="linkedin" value="{{$social->linkedin}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Youtube</label>
                                                    <input type="text" class="form-control" placeholder="Youtube" name="youtube" value="{{$social->youtube}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Pinterest</label>
                                                    <input type="text" class="form-control" placeholder="Pinterest" name="pinterest" value="{{$social->pinterest}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Android app link</label>
                                                    <input type="text" class="form-control" placeholder="RSS" name="rss" value="{{$social->rss}}">
                                                </div>

</div>
                                            </div>
                                        </div>
                                            <div class="col-md-12 form-group">
                                                <div class="text-left">
                                                    <div class="pull-left">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspحفظ</button>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a href="{{url('admin')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspتعديل </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    @else
                                    <form class=" p-t-20" method="POST" action="{{route('savesocial')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}


                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                <div class="form-group">
                                                    <label class="control-label"> Facebook</label>
                                                    <input type="text" class="form-control" placeholder="Facebook" name="fb" >
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Twitter</label>
                                                    <input type="text" class="form-control" placeholder="Twitter" name="tw" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Instegram</label>
                                                    <input type="text" class="form-control" placeholder="Instegram" name="instegram" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Linked in</label>
                                                    <input type="text" class="form-control" placeholder="Linked in" name="linkedin" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Youtube</label>
                                                    <input type="text" class="form-control" placeholder="Youtube" name="youtube" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Pinterest</label>
                                                    <input type="text" class="form-control" placeholder="Pinterest" name="pinterest" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">RSS</label>
                                                    <input type="text" class="form-control" placeholder="RSS" name="rss" >
                                                </div>


                                            </div>
                                        </div>
                                            <div class="col-md-12 form-group">
                                                <div class="text-left">
                                                    <div class="pull-right">
                                                        <button class="btn btn-rounded btn-success" ><span class="fa fa-send"> </span>&nbsp&nbspSave</button>
                                                    </div>
                                                    <div class="pull-left">
                                                        <a href="{{url('admin')}}" class="btn btn-rounded btn-danger"> <span class="fa fa-sign-out"> </span> &nbsp&nbspBack </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
@endsection
