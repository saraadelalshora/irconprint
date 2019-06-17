@extends('layouts.front.master')
@section('content')

<!-- start top page -->
<section class="top-page">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">@lang('massege.home')</a></li>
            <li class="active">@lang('massege.Profile')</li>
        </ol>
    </div>
</section>
<!-- end top page -->
<!-- start contentpage -->
<section class="content-page p-80">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 sticky">
                <div class="side-info user-info">
                    <form class="form-img text-center">
                        <div class="form-group">
                            <img id="blah" src="{{asset('/')}}/assetfront/images/imag-01.jpg" class="img-circle"
                                alt="user profile" />

                        </div>
                        <div class="form-group">
                            <input type="file" onchange="readURL(this);" class="file-image">
                        </div>
                    </form >
                   
                    <hr>
                    <ul class="list-unstyled user-list">
                         @if(Auth::user())
                                <li> <a href="{{route('Profile')}}" class="active"><i class="fas fa-cog"></i>
                                @lang('massege.Profile')</a></li>
                                <li> <a href="{{route('/Favorite')}}"><i class="far fa-heart"></i> @lang('massege.Favorites')</a></li>

                                 @endif
                                 <li> <a href="{{url('/Shopping-Cart-Show')}}"><i class="fas fa-shopping-basket"></i> @lang('massege.Cart') </a></li>
                                 @if(Auth::user())
                                 <li> <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        @lang('massege.Log out')</a></li>
                                 @endif
                             
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
            <form action="{{route('account.update',['id'=>Auth::user()->id])}}" method="Post">
                    {{method_field('PATCH')}}
                                   {{ csrf_field () }}
                <div class="box_account">
                    <div class="form_container">
                        <div class="title-sec">
                            <h3><i class="far fa-edit"></i> @lang('massege.Edit') @lang('massege.Profile')</h3>
                            <hr>
                        </div>

                        <div class=" box">
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fname"  value="{{Auth::user()->fname}}"  placeholder="@lang('massege.fname')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lname"  value="{{Auth::user()->lname}}" placeholder="@lang('massege.lname')">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="address" value="{{Auth::user()->address}}" placeholder="@lang('massege.address')">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <div class="custom-select-form">
                                            <select class="form-control"  name="country_id"  id="Country">
                                                <option selected="selected" disabled="disabled">@lang('massege.Country')</option>
                                                @foreach($Countries as $country)
                                                @if(App::getLocale() == 'ar')
                                                <option value="{{$country->id}}"  @if(Auth::user()->country_id == $country->id) selected @endif>{{$country->name_ar}}</option>
                                                @else
                                                <option value="{{$country->id}}" @if(Auth::user()->country_id == $country->id) selected @endif >{{$country->name_en}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-select-form">
                                            <select class="form-control" name="city" id="City">  
                                                    <option value="{{$city->id}}" selected>{{$city->name_ar}}</option>                                                   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  value="{{Auth::user()->zipcode}}" name="zipcode" placeholder="@lang('massege.zip code')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  value="{{Auth::user()->phone}}" name="phone" placeholder="@lang('massege.phone') ">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}"  name="email" id="email"
                                placeholder="@lang('massege.email')">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  name="password"  id="password"
                                placeholder="@lang('massege.password')">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_in_2" id="password-confirm"
                                placeholder="@lang('massege.Confirm') @lang('massege.password') ">
                        </div>

                        <!-- /privato -->
                        <!-- /azienda -->
                        <hr>
                       
                        <div class="text-center"><input type="submit" value="@lang('massege.Edit')  "
                                class="btn btn-default btn-block btn-lg"></div>
                    </div>
                    <!-- /form_container -->
                </div>
           </form>
            </div>
        </div>


    </div>
</section>
<!-- end contentpage -->
@section('js')
<script type="text/javascript">
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
                $("#City").append('<option> City </option>');
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
   </script>
 <!-- this js validate img form -->

@endsection
@endsection