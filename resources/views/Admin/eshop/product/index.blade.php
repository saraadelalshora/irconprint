@extends('layouts.master')
@section('content')
   <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">المنتجات</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <a href="{{ route('eshop.create')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button></a>
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
                                        <h4 class="card-title m-b-0">قائمة المنتجات</h4>
                                </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table  id="example23" class="display nowrap table table-hover table-striped table-bordered"  >
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="name">أسم المنتج</th>
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
                                            <td data-field="catname">@if(isset($value->category)){{$value->category->name_ar}} @endif</td>

                                             <td data-field="status">@if($value->status == 1) مفعل @else غير مفعل @endif</td>
                        
                                            <td data-field="edit"><button type="button" class="btn btn-sm btn-success btn-rounded m-l-15" ><i class="fa fa-check"></i><a href="{{route('eshop.edit',$value->id)}}" style="color: #ffffff;"> تعديل</a></button>
                                            <form  action="{{ route('eshop.destroy',$value->id) }}"  style="display: inline;"  method="POST" accept-charset="utf-8">
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
               

        
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                @section('js')
  <script>
$(document).ready(function() {

// process the form
$('form').submit(function(event) {

    // get the form data
    // there are many ways to get this data using jQuery (you can use the class or id also)
    var formData = {
        'searchword'              : $('input[name=searchword]').val(),
        'price'             : $('input[name=price]').val(),
        'status'    : $('input[name=status]').val(),
        'quantity'    : $('input[name=quantity]').val(),
    };

    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         :"{{url('admin/filter')}}", // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode          : true,
        success:function(data){               
            if(data){
                $("#datafilter").empty();
                $.each(data,function(key,value){
                    $("#datafilter").append('<tr>'+
                                            '<td data-field="state" data-checkbox="true"></td>'+
                                            '<td data-field="name">'+value['name_ar']+ '</td>'+
                                            '<td data-field="catname">'+value['name_ar']+'=>'+value['name_ar']+'</td>'+
                                            '<td data-field="qnty">'+value['quantity']+'</td>'+

                                             '<td data-field="status">'+'مفعل'+' </td>'+

                                        '</tr>');
                });
           
            }else{
               $("#datafilter").empty();
            }
            }
    });
 
       

    // stop the form from submitting the normal way and refreshing the page
   
});

});

</script>
@endsection
@endsection