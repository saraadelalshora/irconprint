@extends('layouts.front.master')
@section('meta')
<title>{{$setting->store_name_ar}}</title>
<meta name="description" content="{{$setting->meta_description_ar}}">
<meta name="keywords" content="{{$setting->meta_tags}}">

<meta name="author" content="{{$setting->meta_title}}">
@endsection
@section('content')
    <!-- start slider -->
    <section class="main-slider p-30">
        <div class="container">
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="owl-carousel owl-theme owl-main">
                    @foreach($sliders as $slide)
                    <div class="item">
                        <img  src="{{asset($slide->img)}}"  @if(App::getLocale() == 'ar') alt="{{$slide->title_ar}}" @else alt="{{$slide->title_en}}" @endif class="img-responsive">
                    </div>
                    @endforeach
                </div>

            </div>
         
        </div>
    </section>
    <!-- end slider -->
    <!-- start status -->
    <section class="status">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="status-info">
                        <div class="st-icon"><i class="fas fa-shipping-fast"></i> </div>
                        <div class="st-dec">
                            <h4>@lang('massege.Free shipping & return')</h4>
                            <p> @lang('massege.Shipping to all governorates of Egypt and Arab countries').</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="status-info">
                        <div class="st-icon"><i class="far fa-money-bill-alt"></i> </div>
                        <div class="st-dec">
                            <h4>@lang('massege.Payment on receipt')</h4>
                            <p>@lang('massege.  You can pay when you receive your order')</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="status-info ls-status">
                        <div class="st-icon"><i class="far fa-life-ring"></i> </div>
                        <div class="st-dec">
                            <h4>@lang('massege.24/7 online support')</h4>
                            <p> @lang('massege.24/7 Technical Support')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
   
    <!-- start brand -->
    <section class="brand p-t-30">
        <div class="container">

            <div class="owl-carousel owl-theme owl-brand p-30">
            @foreach($brands as $brand)
                <div class="item">
                    <a href="#">
                        <img  src="{{asset($brand->img)}}" class="img-responsive">
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!-- end brand -->
@endsection
