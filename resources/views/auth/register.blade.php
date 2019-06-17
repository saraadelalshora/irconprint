@extends('layouts.app')


@section('content')

     <!-- start contentpage -->
     <!-- <section class="content-page">
        <div class="container">
           <div class="row row justify-content">
               <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="box_account">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                            <div class="form_container">
                                <div class="title-sec">
                                    <h3><i class="fas fa-user-plus"></i> حساب جديد</h3>
                                    <hr>
                                </div>
                                <div class=" box">
                                    <div class="row ">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fname" placeholder="الاسم*">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="lname" placeholder="الاسم الاخير*">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address" placeholder="العنوان بالكامل*">
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- /row -->
                                    <!-- <div class="row ">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <div class="custom-select-form">
                                                    <select class="form-control" name="country_id" id="Country">
                                                        <option  selected="selected" disabled="disabled">البلد*</option>
                                                        @foreach($Countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name_ar}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="custom-select-form">
                                                    <select class="form-control" name="city" id="City">
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- /row -->
                                    <!-- <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="zipcode" placeholder="الرمز البريدي">
                                                    </div>
                                                </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" placeholder="رقم الهاتف *">
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- /row -->
                                <!-- </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="البريد الاكترونى*">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password"
                                         placeholder="كلمه المرور*">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm"
                                         placeholder="تأكيد كلمه المرور *">
                                </div> -->
                              
                                <!-- /privato -->
                                <!-- /azienda -->
                                <!-- <hr>
                                <div class="form-group">
                                    <label class="container_check">موافق على <a href="#0">الشروط والأحكام</a>
                                        <input type="checkbox" required>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="text-center"><input type="submit" value="تسجيل جديد " class="btn btn-default btn-block btn-lg"></div>
                                <div class="text-center p-t-15"> لديك حساب بالفعل وتريد <a id="forgot" href="{{route('login')}}"> تسجيل الدخول</a></div>

                            </div> -->
                            <!-- /form_container -->
                        <!-- </div>
                   </form>
               </div>
           </div>

        </div>
    </section> -->
<!-- end contentpage -->
@section('js')
<!-- <script type="text/javascript">
    $('#Country').change(function(){
        $("#City").empty();
       
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('City-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#City").empty();
                $("#City").append('<option>المدينة*</option>');
                $.each(res,function(key,value){
                    $("#City").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#City").empty();
            }
           }
        });
    }else{
        $("#City").empty();
      
    }      
   });
   </script> -->
 <!-- this js validate img form -->

@endsection
@endsection
