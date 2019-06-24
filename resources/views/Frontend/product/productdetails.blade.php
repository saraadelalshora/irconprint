@extends('layouts.front.master')
@section('meta')
@if(app()->getLocale() == 'ar')
<title>{{$product->name_ar}} </title>
<meta name="keywords" content="{{$product->tag_ar}}">
@else
<title> {{$product->name_en}} </title>
<meta name="keywords" content="{{$product->tag_en}}">
@endif
@endsection
@section('content')

<!-- start content page -->
<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{asset('/')}}/assetfront/images/sliders/slide-bg/8.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1>@if(app()->getLocale() == 'ar')
                            {{$product->name_ar}}
                            @else
                            {{$product->name_en}}
                            @endif</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if(app()->getLocale() == 'ar')
                            {{$product->name_ar}}
                            @else
                            {{$product->name_en}}
                            @endif</li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->
<!-- Shop
============================================= -->
<section id="shop" class="shop single-product bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              @if($product->images->isEmpty() != true)
                <div class="xzoom-container">
                    <img class="xzoom" id="xzoom-default" src="{{asset($product->images->first()->img)}}" />
                    <div class="xzoom-thumbs">
                        <div class=" owl-carousel owl-theme owl-xzoom">
                            @foreach($product->images as $pro_img)
                            <div class="item">
                                <a href="{{asset($pro_img->img)}}">
                                    <img class="xzoom-gallery" src="{{asset($pro_img->img)}}"
                                        xpreview="{{asset($pro_img->img)}}" title="@if(app()->getLocale() == 'ar')
                            {{$product->name_ar}}
                            @else
                            {{$product->name_en}}
                            @endif">
                                </a>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- .col-lg-9 end -->
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="product-title">
                    <h3>@if(app()->getLocale() == 'ar')
                            {{$product->name_ar}}
                            @else
                            {{$product->name_en}}
                            @endif</h3>
                </div><!-- .product-title end -->
            
                <div class="product-desc">
                @if(app()->getLocale() == 'ar')
                            {!! $product->description_ar !!}
                            @else
                            {!! $product->description_en !!}
                            @endif
                </div>
                <!-- .product-desc end -->
                <div class="product-details">
                    <h5>@lang('massege.Other Details') :</h5>
                    <ul class="list-unstyled">
                    
                        <li>@lang('massege.Code') : <span>#{{$product->code}}</span></li>
                        <li>@lang('massege.Availabiltity') :<span>
                        @if($product->availbale == '1')
                        @lang('massege.Yes')
                        @else
                        @lang('massage.No')
                        @endif
                       </span></li>
                        <li>@lang('massege.Brand') : <span>
                              @if(app()->getLocale() == 'ar')
                               {{$product->manufactor->name_ar}}
                            @else
                            {{$product->manufactor->name_en}}
                             @endif
                    </span></li>
                    </ul>
                </div><!-- .product-details end -->
                <!-- <div class="product-share">
                    <h5 class="share-title">share product: </h5>
                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                </div> -->
                <!-- .product-share end -->
            </div>
            <!-- .col-lg-3 end -->
        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->
</section>
<!-- #shop end -->
@endsection