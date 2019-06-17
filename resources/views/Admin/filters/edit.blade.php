@extends('layouts.master')
@section('content')
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-white m-b-0">تعديل التصنيف</h4>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <form class=" p-t-20" method="POST" action="{{route('Filter.update',$filter->id)}}">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="AR" class="control-label"> اسم التصنيف عربي<span
                                            class="text-danger">*</span> </label>
                                    <div class="input-group-prepend">
                                        <input name="ar_name" type="text" value="{{$filter->name_ar}}" id="AR"
                                            class="form-control" placeholder="اسم التصنيف" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="AR" class="control-label"> اسم التصنيف انجليزي </label>
                                    <div class="form-group">
                                        <div class="input-group-prepend">
                                            <input name="en_name" type="text" value="{{$filter->name_en}}" id="AR"
                                                class="form-control" placeholder="اسم التصنيف" name="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">القسم الفرعي <span class="text-danger">*</span>
                                    </label>
                                    <select class="select2 form-control m-b-10 select2-multiple" name="subcategory[]"
                                        required style="width: 100%"  data-placeholder="Choose">
                                        @if(!empty($subcategories)) @foreach($subcategories as $com)
                                        <option value="{{$com->id}}"  @foreach($filter->subcategories as $subcategory) @if($subcategory->id == $com->id )selected @endif @endforeach>{{$com->name_ar}}</option>
                                        @endforeach @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> الحاله </label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{$filter->status == 1 ? 'selected="selected"' : '' }}>تفعيل
                                        </option>
                                        <option value="0" {{$filter->status == 0 ? 'selected="selected"' : '' }}>ايقاف
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="text-left">
                                    <div class="pull-left">
                                        <button class="btn btn-rounded btn-success"><span class="fa fa-send">
                                            </span>&nbsp;&nbsp;حفظ</button>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{route('Filter.index')}}" class="btn btn-rounded btn-danger"> <span
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