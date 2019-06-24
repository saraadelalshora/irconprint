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
@if($category->subcategories->isEmpty() != true)
<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
            <div class="title--heading">
                        <h1>@lang('massege.subcategory')</h1>
                    </div>
            <div class="row">
            <!-- Case #1 -->
            @if($category->subcategories->isEmpty() != true)
            @foreach($category->subcategories()->paginate(15) as $subcategory)
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="{{asset($subcategory->image)}}" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                            @if(app()->getLocale() == 'ar')
                               <a href="{{route('Subcategory.products',$subcategory->slogen_ar)}}" alt="{{$subcategory->name_ar}}">  </a>
                            @else
                               <a href="{{route('Subcategory.products',$subcategory->slogen_en)}}" alt="{{$subcategory->name_en}}">  </a>
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
                               <a href="{{route('Subcategory.products',$subcategory->slogen_ar)}}"> {{$subcategory->name_ar}} </a>
                            @else
                               <a href="{{route('Subcategory.products',$subcategory->slogen_en)}}"> {{$subcategory->name_en}} </a>
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
                {!! $category->subcategories()->paginate(15)->appends(request()->except('page'))->links() !!} 
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
<!-- #case carousel end -->
@else
<!-- Case carousel
============================================= -->
<section id="case" class="case case-standard case-3col pt-110 bg-gray">
    <div class="container">
            <div class="title--heading">
                        <h1>@lang('massege.Products')</h1>
                    </div>
            <div class="row">
            <!-- Case #1 -->
            @if($category->products->isEmpty() != true)
            @foreach($category->products()->paginate(15) as $categoryproduct)
            <div class="col-sm-12 col-md-6 col-lg-4 case-item filter-customer filter-tips">
                <div class="case-item-container">
                    <div class="case--img">
                        <img src="{{asset($categoryproduct->images->first()->img)}}" alt="case Item">
                        <div class="case--hover">
                            <div class="case--action">
                            @if(app()->getLocale() == 'ar')
                               <a href="{{route('product.name',$categoryproduct->slogen_ar)}}" alt="{{$categoryproduct->name_ar}}">  </a>
                            @else
                               <a href="{{route('product.name',$categoryproduct->slogen_en)}}" alt="{{$categoryproduct->name_en}}">  </a>
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
                               <a href="{{route('product.name',$categoryproduct->slogen_ar)}}"> {{$categoryproduct->name_ar}} </a>
                            @else
                               <a href="{{route('product.name',$categoryproduct->slogen_en)}}"> {{$categoryproduct->name_en}} </a>
                            @endif
                                 
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- . case-item end -->
            @endforeach
            
        <div class="row">
            <div class="col-12 col-md-12 col-md-12 clearfix text--center">
                <ul class="pagination mt-20">
                {!! $category->products()->paginate(15)->appends(request()->except('page'))->links() !!} 
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
        </div>
        <!-- .row end -->
      
      
    </div>
    <!-- .container end -->
</section>
<!-- #case carousel end -->
@endif
@endif
@endsection