@extends('layouts.front.master')
@section('meta')
@if(app()->getLocale() == 'ar')
<title>{{$news->title_ar}} </title>
<meta name="description" content="{{$news->meta_description_ar}}">

@else
<title>{{$news->title_en}} </title>
<meta name="description" content="{{$news->meta_description_en}}">

@endif
<meta name="keywords" content="{{$news->tags}}">
@endsection
@section('content')


<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{asset('/')}}/assetfront/images/sliders/slide-bg/8.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="title title-6 text-center">
                    <div class="title--heading">
                        <h1>@lang('massege.news')</h1>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('massege.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{url('news')}}">@lang('massege.news')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if(App::getLocale() == 'en')
                            {{$news->title_en}}
                            @else
                            {{$news->title_ar}}
                            @endif
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->


<!-- Blog Standard Right Sidebar
============================================= -->
<section id="blog" class="blog blog-single blog-standard">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
                @if(isset($news))

                <!-- Blog Entry #1 -->
                <div class="blog-entry">
                    <div class="entry--img">
                        <a href="#">
                            <img src="{{asset($news->image)}}" alt="entry image" />
                        </a>
                    </div>
                    <div class="entry--content clearfix">
                        <div class="entry--meta">
                            <a href="#"> @if(App::getLocale() == 'en')
                                <a href="#">{{$news->categories->first()->name_en}}</a>
                                @else
                                <a href="#">{{$news->categories->first()->name_ar}}</a>
                                @endif
                            </a>
                        </div>
                        <div class="entry--date">
                            {{\Carbon\Carbon::parse($news->created_at)->format('d M  Y')}}
                        </div>
                        <div class="entry--title">
                            <h4> @if(App::getLocale() == 'en')
                                <a href="{{route('new',$news->slogen_en)}}">{{$news->title_en}}</a>
                                @else
                                <a href="{{route('new',$news->slogen_en)}}">{{$news->title_ar}}</a>
                                @endif</h4>
                        </div>
                        <div class="entry--bio">
                            @if(App::getLocale() == 'en')
                            {!! $news->description_en !!}
                            @else
                            {!! $news->description_ar !!}
                            @endif
                        </div>

                        <!-- .entry-share end -->
                        <div class="entry--tags">
                            @foreach(explode(',',$news->tags) as $tags)
                            <a href="#">
                                {{$tags}}
                            </a>
                            @endforeach
                        </div>

                        <!-- .entry-cat end -->
                    </div>
                </div>
                <!-- .blog-entry end -->
                @else
                <div class="text-center">
                    <h2 style="color:#830C0C;">{{trans('massege.notfoundnews')}}</h2>
                </div>
                @endif
            </div><!-- .col-md-8 end -->
            <div class="col-sm-12 col-md-12 col-lg-4">
                <!-- Search
    ============================================= -->
                <div class="widget widget-search">
                    <div class="widget--title">
                        <h5>@lang('massege.Search Bar')</h5>
                    </div>
                    <div class="widget--content">
                        <form action="{{url('search')}}" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword"
                                    placeholder="@lang('massege.Search')$news->isEmpty() != true
notfoundnews">
                                <span class="input-group-btn">
                                    <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>
                </div>
                <!-- .widget-search end -->
                <!-- Categories
    ============================================= -->
                @if(isset($newscategories))
                <div class="widget widget-categories">
                    <div class="widget--title">
                        <h5>@lang('massege.Categories')</h5>
                    </div>
                    <div class="widget--content">
                        <ul class="list-unstyled">
                            @foreach($newscategories as $categorynews)
                            <li>
                                @if(App::getLocale() == 'en')
                                <a href="#">{{$categorynews->name_en}}</a>

                                @else
                                <a href="#">{{$categorynews->name_ar}}</a>

                                @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div> <!-- .widget-categories end -->
                @endif
            </div><!-- .col-lg-4 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #blog end -->
@endsection