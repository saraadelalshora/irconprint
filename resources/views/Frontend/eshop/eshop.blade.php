@extends('layouts.front.master')
@section('meta')
@if(isset($category))
@if(app()->getLocale() == 'ar')

<title>{{$category->name_ar}} </title>
<meta name="keywords" content="{{$category->tag_ar}}">
@else
<title>{{$category->name_en}} </title>
<meta name="keywords" content="{{$category->tag_en}}">
@endif
@endif
@endsection
@section('content')


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
                            {{$category->name_ar}}
                            @else
                            {{$category->name_en}}
                            @endif</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">@lang('massege.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if(app()->getLocale() == 'ar')
                            {{$category->name_ar}}
                            @else
                            {{$category->name_en}}
                            @endif</li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->

<!-- Shop #4
============================================= -->
<section id="shop" class="shop bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    @if($category->eshops->isEmpty() != true)
                    @foreach($category->eshops()->paginate(15) as $categoryproduct)
                    <!-- Product #1 -->
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="product-item">
                            <div class="product--img">
                                <img src="{{asset($categoryproduct->images->first()->img)}}" alt="Product" />
                                <div class="product--action">
                                @if(app()->getLocale() == 'ar')
                                        <a href="{{route('productshop.name',$categoryproduct->slogen_ar)}}">
                                            </a>
                                        @else
                                        <a href="{{route('productshop.name',$categoryproduct->slogen_en)}}">
                                           </a>
                                        @endif
                                </div>
                            </div><!-- .product-img end -->
                            <div class="product--content">
                                <div class="product--title">
                                    <h3> @if(app()->getLocale() == 'ar')
                                        <a href="{{route('productshop.name',$categoryproduct->slogen_ar)}}">
                                            {{$categoryproduct->name_ar}} </a>
                                        @else
                                        <a href="{{route('productshop.name',$categoryproduct->slogen_en)}}">
                                            {{$categoryproduct->name_en}} </a>
                                        @endif</h3>
                                </div><!-- .product-title end -->

                            </div><!-- .product-bio end -->
                        </div><!-- .product end -->
                    </div><!-- .col-md-3 end -->
                    @endforeach
                </div><!-- .row end -->
                <div class="row">
                    <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                        <ul class="pagination mt-20">
                            {!! $category->eshops()->paginate(15)->appends(request()->except('page'))->links() !!}
                        </ul>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                @else
                <div class=" col-md-12 case-item filter-customer filter-tips">
                    <div class="text-center">
                        <h2 style="color:#830C0C;">{{trans('massege.notfoundproduct')}}</h2>
                    </div>
                </div>
                @endif


                <!-- .col-md-12 end -->
                <!-- </div> -->
                <!-- .row end -->
            </div>
            <!-- .col-md-9 end -->
           
            <!-- .col-md-3 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #shop end -->
@endsection