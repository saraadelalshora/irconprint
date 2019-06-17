@extends('layouts.front.master')
@section('content')
<!-- start top page -->
<section class="top-page">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">@lang('massege.home')</a></li>
            <li class="active">@lang('massege.Complete Checkout')</li>
        </ol>
    </div>
</section>
<!-- end top page -->
<!-- start contentpage -->
<section class="content-page ">
    <div class="container">
        <form method="POST" action="{{url('Add-Copon')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="box_account checkout-form">

                        <div class="form_container">
                            <div class="title-sec">
                                <label class="container_check" id="coupon"> @lang('massege.Coupon')
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group" id="dec-coupon">
                                <hr>
                                <input type="text" class="form-control" name="coupon"
                                    placeholder="@lang('massege.Coupon discount')">
                                <hr>
                                <div class="link">
                                    <button type="submit" name="addcoupon" value="addcoupon"
                                        class="btn btn-default pull-left">
                                        @lang('massege.Discount')
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <form method="POST" action="{{url('Checkout-Order')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="box_account">
                        <div class="form_container">
                            <div class="title-sec">
                                <h3><i class="far fa-edit"></i> @lang('massege.Payment Information')</h3>
                                <hr>
                            </div>
                            <div class=" box">
                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{Auth::user()->fname}}"
                                                name="fname" placeholder="@lang('massege.fname')*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{Auth::user()->lname}}"
                                                name="lname" placeholder="@lang('massege.lname')*">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{Auth::user()->address}}"
                                                name="address" placeholder="@lang('massege.address')*">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row ">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-select-form">
                                                <select class="form-control" name="country_id" id="Country">
                                                    <option selected="selected" disabled="disabled">
                                                        @lang('massege.Country')</option>
                                                    @foreach($Countries as $country)
                                                    @if(App::getLocale() == 'ar')
                                                    <option value="{{$country->id}}" @if(Auth::user()->country_id ==
                                                        $country->id) selected @endif>{{$country->name_ar}}</option>
                                                    @else
                                                    <option value="{{$country->id}}" @if(Auth::user()->country_id ==
                                                        $country->id) selected @endif >{{$country->name_en}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <select class="form-control" name="city" id="City">
                                                <option value="{{$city->id}}" selected>{{$city->name_ar}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{Auth::user()->zipcode}}"
                                                name="zipcode" placeholder="@lang('massege.zip code')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{Auth::user()->phone}}"
                                                name="phone" placeholder="@lang('massege.phone')*">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email"
                                     id="email" placeholder="@lang('massege.email')*">
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control" @if(isset($current_coupon_value)) value="{{$current_coupon_value}}" @endif name="coupon"
                                     id="email" placeholder="coupon*">
                            </div> -->
                           
                            <!-- /privato -->
                            <!-- /azienda -->
                            <hr>
                        </div>
                        <div class="form-group">
                            <label class="container_check" id="other_addr">@lang('massege.Shipping to Another Address')
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="box_account" id="other_addr_c">
                        <div class="form_container">
                            <div class="title-sec">
                                <h3><i class="far fa-edit"></i>@lang('massege.Shipping Information')</h3>
                                <hr>
                            </div>
                            <div class=" box">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="anotherAddress"
                                                placeholder="@lang('massege.address')*">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row ">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-select-form">
                                                <select class="form-control" name="anothercountry" id="anotherCountry">
                                                    <option selected="selected" disabled="disabled">
                                                        @lang('massege.Country')</option>
                                                    @foreach($Countries as $country)
                                                    @if(App::getLocale() == 'ar')
                                                    <option value="{{$country->id}}">{{$country->name_ar}}</option>
                                                    @else
                                                    <option value="{{$country->id}}">{{$country->name_en}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="anothercity" id="anotherCity"
                                                placeholder="المدينه*">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="otherzipcode"
                                                placeholder="@lang('massege.zip code')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="otherphone"
                                                placeholder="@lang('massege.phone')*">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->

                                <!-- /row -->
                            </div>


                        </div>
                        <!-- /form_container -->
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="box_account checkout-form">
                                <div class="form_container">
                                    <div class="title-sec">
                                        <h3><i class="fas fa-shipping-fast"></i>@lang('massege.Shipping & Delivery')
                                        </h3>
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio1">
                                            <label class="container_radio"> @if(App::getLocale() == 'en')
                                                {{$shipping_name_en}}
                                                @else
                                                {{$shipping_name_ar}}
                                                @endif
                                                <input type="radio" name="shipping_type" checked
                                                    value="{{$shipping_price}}">
                                                <span class="checkmark">

                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="box_account checkout-form">
                                <div class="form_container">
                                    <div class="title-sec">
                                        <h3><i class="far fa-money-bill-alt"></i> @lang('massege.Payment Method')</h3>
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        @foreach($payment_method as $method)
                                        <div class="radio1">
                                            <label class="container_radio">@if(App::getLocale() == 'en')
                                                {{$method->name_en}}
                                                @else
                                                {{$method->name_ar}}
                                                @endif
                                                <input type="radio" name="payment_type" value="{{$method->id}}"
                                                    required>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="box_account checkout-form">
                                <div class="form_container">
                                    <div class="title-sec">
                                        <label class="container_check" id="comment"> @lang('massege.Notes About the order')
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group" id="dec-comment">
                                        <hr>
                                        <textarea class="form-control" name="ordernotes"
                                            placeholder="@lang('massege.Add comment')"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box_account">
                                <div class="form_container">
                                    <div class="title-sec">
                                        <h3><i class="fas fa-shopping-basket"></i> @lang('massege.Cart')</h3>
                                        <hr>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered ">
                                            <thead>
                                                <tr>
                                                    <td> @lang('massege.Image')</td>
                                                    <td> @lang('massege.Name')</td>
                                                    <td> @lang('massege.Category Name')</td>
                                                    <td>@lang('massege.Quantity') </td>
                                                    <td> @lang('massege.Price')</td>
                                                    <td>@lang('massege.Total')</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($cart as $ca)
                                                <tr>
                                                    <td class="text-center">
                                                        <a
                                                            href="{{url('/Single-Prodect')}}/{{$ca->id}}/@if(session::get('lang') == 'en'){{ $ca->attributes['slogen_en'] }}@elseif(session::get('lang') == 'ar'){{ $ca->attributes['slogen_ar'] }}@endif">
                                                            <img src="{{asset($ca->attributes['image'])}}"
                                                                alt="products" class="img-thumbnail">
                                                        </a>

                                                    </td>
                                                    @if(session::get('lang') == 'ar')
                                                    <td>

                                                        <a
                                                            href="{{url('/Single-Prodect')}}/{{$ca->id}}/@if(session::get('lang') == 'en'){{ $ca->attributes['slogen_en'] }}@elseif(session::get('lang') == 'ar'){{ $ca->attributes['slogen_ar'] }}@endif">{{$ca->name}}</a>


                                                    </td>
                                                    @endif
                                                    @if(session::get('lang') == 'en')
                                                    <td>

                                                        @if(!empty($ca->attributes['name_en']))
                                                        <a
                                                            href="{{url('/Single-Prodect')}}/{{$ca->id}}/@if(session::get('lang') == 'en'){{ $ca->attributes['slogen_en'] }}@elseif(session::get('lang') == 'ar'){{ $ca->attributes['slogen_ar'] }}@endif">{{$ca->attributes['name_en']}}</a>
                                                        @endif

                                                    </td>
                                                    @endif
                                                    @if(session::get('lang') == 'ar')
                                                    <td>{{$ca->attributes['sub_cat_ar']}}</td>
                                                    @endif
                                                    @if(session::get('lang') == 'en')
                                                    <td>{{$ca->attributes['sub_cat_en']}}</td>
                                                    @endif
                                                    <td>

                                                        <form method="POST" action="{{route('CartEdit',$ca->id)}}">
                                                            {{csrf_field()}}
                                                            <div class="input-group btn-block">
                                                                <input type="text" class="form-control" name="qty"
                                                                    value="{{ $ca->quantity }}" size="1">
                                                                <span class="input-group-btn">
                                                                    <button type="submit" class="btn btn-success">
                                                                        <i class="fas fa-sync-alt"></i>
                                                                    </button>
                                                                    @if(session::get('lang') == 'en')
                                                                    <a href="{{url('/Shopping-Cart-Delete')}}/{{$ca->id}}"
                                                                        onclick="return confirm('Do you want to delete')"
                                                                        type="button" class="btn btn-danger">
                                                                        <i class="fa fa-times-circle"></i>
                                                                    </a>
                                                                    @endif
                                                                    @if(session::get('lang') == 'ar')
                                                                    <a href="{{url('/Shopping-Cart-Delete')}}/{{$ca->id}}"
                                                                        onclick="return confirm('هل تريد الحذف')"
                                                                        type="button" class="btn btn-danger">
                                                                        <i class="fa fa-times-circle"></i>
                                                                    </a>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>{{number_format(($ca->price ),1, '.', '')}}
                                                        {{trans('massege.EGP')}}
                                                    </td>
                                                    <td>{{number_format(($ca->getPriceWithConditions() ),1, '.', '')}}
                                                        {{trans('massege.EGP')}}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="table-responsive">
                                                <table class="table table-bordered ">

                                                    <tbody>
                                                        @if(!empty($cartsum))
                                                        @if(isset($current_coupon_value))
                                                        <tr>
                                                            <td>
                                                                <strong> قيمة الخصم:</strong>
                                                            </td>
                                                            <td>  <input type="text" class="form-control" @if(isset($current_coupon_value)) value="{{$current_coupon_value}}" @endif name="coupon"
                                     id="email" placeholder="coupon*" style="background-color: #fff; border:  none; text-align: center; "  readonly >  </td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td>
                                                                <strong> قيمة الشحن : </strong>
                                                            </td>
                                                            <td>${{$shipping_price}} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <strong> الإجمالى النهائى:</strong>
                                                            </td>
                                                            <td>${{$cartsum+$shipping_price}} </td>
                                                        </tr>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="link">
                                        <button type="submit" name="saveorder" value="saveorder"
                                            class="btn btn-default pull-left">
                                            متابعه الدفع
                                        </button>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- end contentpage -->

@section('js')
<script type="text/javascript">
    $('#Country').change(function () {
        $("#City").empty();

        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: "GET",
                url: "{{url('City-list')}}?country_id=" + countryID,
                success: function (res) {
                    if (res) {
                        $("#City").empty();
                        $("#City").append('<option> City </option>');
                        $.each(res, function (key, value) {
                            $("#City").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {
                        $("#City").empty();
                    }
                }
            });
        } else {
            $("#City").empty();

        }
    });

    $('#anotherCountry').change(function () {
        $("#anotherCity").empty();

        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: "GET",
                url: "{{url('City-list')}}?country_id=" + countryID,
                success: function (res) {
                    if (res) {
                        $("#anotherCity").empty();
                        $("#anotherCity").append('<option> City </option>');
                        $.each(res, function (key, value) {
                            $("#anotherCity").append('<option value="' + key + '">' +
                                value + '</option>');
                        });

                    } else {
                        $("#anotherCity").empty();
                    }
                }
            });
        } else {
            $("#anotherCity").empty();

        }
    });
</script>
<!-- this js validate img form -->

@endsection
@endsection