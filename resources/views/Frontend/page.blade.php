@extends('layouts.front.master')
@section('content')

@foreach ($land as $lands)
 <!-- start top page -->
 <section class="top-page">
        <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('home',app()->getLocale())}}">{{trans('massege.home')}}</a></li>
                    <!--  'title_ar', 'title_en', 'description_en', 'description_ar', 'status', 'slogen_ar', 'slogen_en',  -->
                    <li class="active">
                        @if(App::getLocale() == 'en')
                        {{$lands->title_en}}
                        @else
                        {{$lands->title_ar}}
                        @endif
                    </li>
                </ol>
        </div>
    </section>
    <!-- end top page -->
     <!-- start content page -->

     <section class="content-page">
        <div class="container">
            <div class="about">
                <div class="row">
                 @if($lands->img)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="about-img text-center">
                            <img src="{{asset($lands->img)}}" alt="about-img" class="img-responsive" />
                        </div>
                    </div>
                   
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="about-info">
                            @if($lands->slogen_ar == 'من-نحن')
                            @if(App::getLocale() == 'en')
                            <h2 class="pro-title"> Know More About Us</h2>
                            @else
                            <h2 class="pro-title"> اعرف المزيد عنا</h2>
                            @endif
                            @else
                            <h2 class="pro-title">
                            @if(App::getLocale() == 'en')
                          {{$lands->title_en}}
                          @else
                         {{$lands->title_ar}}
                         @endif
                            </h2>
                            @endif
                        @if(App::getLocale() == 'en')
                        {!! $lands->description_en !!}
                        @else
                        {!! $lands->description_ar !!}
                        @endif

                        </div>
                    </div>
                    @else
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="about-info">
                            @if($lands->slogen_ar == 'من-نحن')
                            @if(App::getLocale() == 'en')
                            <h2 class="pro-title"> Know More About Us</h2>
                            @else
                            <h2 class="pro-title"> اعرف المزيد عنا</h2>
                            @endif
                            @else
                            <h2 class="pro-title">
                            @if(App::getLocale() == 'en')
                        {{$lands->title_en}}
                        @else
                        {{$lands->title_ar}}
                        @endif
                            </h2>
                            @endif
                        @if(App::getLocale() == 'en')
                        {!! $lands->description_en !!}
                        @else
                        {!! $lands->description_ar !!}
                        @endif

                        </div>
                    </div>
                     @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end content page -->
    @endforeach
@endsection