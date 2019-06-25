@extends('layouts.front.master')
@section('meta')

<title>@lang('massege.All Video Categories')</title>


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
                        <h1>@lang('massege.All Video Categories')</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('massege.All Video Categories')</li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->

<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
        <div class="title--heading">
            <h1>@lang('massege.All Video Categories')</h1>
        </div>
        <div class="row">
            <!-- Case #1 -->
            @if(isset($all_Video))
            @foreach($all_Video as $category)
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="{{asset($category->image)}}" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                                @if(app()->getLocale() == 'ar')
                                <a href="{{route('category.Videos',$category->slogen_ar)}}"
                                    alt="{{$category->name_ar}}"> </a>
                                @else
                                <a href="{{route('category.Videos',$category->slogen_en)}}"
                                    alt="{{$category->name_en}}"> </a>
                                @endif
                            </div>
                            <!-- .case-action end -->
                        </div>
                        <!-- .case-hover end -->
                    </div>
                    <!-- .case-img end -->
                    <div class="case--content">

                        <div class="case--title">
                            <h4>
                                @if(app()->getLocale() == 'ar')
                                <a href="{{route('category.Videos',$category->slogen_ar)}}">
                                    {{$category->name_ar}} </a>
                                @else
                                <a href="{{route('category.Videos',$category->slogen_en)}}">
                                    {{$category->name_en}} </a>
                                @endif

                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- . case-item end -->
            @endforeach

        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                <ul class="pagination mt-20">
                    {!! $all_Video->appends(request()->except('page'))->links() !!}
                </ul>
            </div>
            <!-- .col-md-12 end -->
            @else
            <div class=" col-md-12 case-item filter-customer filter-tips">
                <div class="text-center">
                    <h2 style="color:#830C0C;">{{trans('massege.notfoundcategory')}}</h2>
                </div>
            </div>
            @endif
        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->
</section>
@endsection