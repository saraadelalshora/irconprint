@extends('layouts.front.master')
@section('meta')

<title>@lang('massege.news')</title>

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
                        <li class="breadcrumb-item active" aria-current="page">
                            @lang('massege.news')</li>
                    </ol>
                </div><!-- .title end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- #page-title end -->

<!-- Blog Standard Right Sidebar
============================================= -->
<section id="blog" class="blog blog-standard">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
             @if($news->isEmpty() != true)
                @foreach($news as $newsdetails)
                <!-- Blog Entry #1 -->
                <div class="blog-entry">
                    <div class="entry--img">
                        <a href="#">
                            <img src="{{asset($newsdetails->image)}}" alt="entry image" />
                            <div class="entry--overlay"></div>
                        </a>
                    </div>
                    <!-- .entry-img end -->
                    <div class="entry--content">
                        <div class="entry--meta">
                            @if(App::getLocale() == 'en')
                            <a href="#">{{$newsdetails->categories->first()->name_en}}</a>
                            @else
                            <a href="#">{{$newsdetails->categories->first()->name_ar}}</a>
                            @endif

                        </div>
                        <div class="entry--date">
                            {{\Carbon\Carbon::parse($newsdetails->created_at)->format('d M  Y')}}
                        </div>
                        <div class="entry--title">
                            <h4>
                                @if(App::getLocale() == 'en')
                                <a href="{{route('new',$newsdetails->slogen_en)}}">{{$newsdetails->title_en}}</a>
                                @else
                                <a href="{{route('new',$newsdetails->slogen_en)}}">{{$newsdetails->title_ar}}</a>
                                @endif
                            </h4>
                        </div>
                        <div class="entry--bio">
                            @if(App::getLocale() == 'en')
                            {!! str_limit(strip_tags($newsdetails->description_en), $limit = 100, $end = '...') !!}
                            @else
                            {!! str_limit(strip_tags($newsdetails->description_ar) , $limit = 100, $end = '...') !!}
                            @endif
                        </div>
                        <div class="entry--footer">
                            <div class="entry--more">
                                @if(App::getLocale() == 'en')
                                <a href="{{route('new',$newsdetails->slogen_en)}}"><i
                                        class="fa fa-plus"></i>@lang('massege.Read More')</a>
                                @else
                                <a href="{{route('new',$newsdetails->slogen_ar)}}"><i
                                        class="fa fa-plus"></i>@lang('massege.Read More')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- .entry-content end -->
                </div>
                <!-- .blog-entry end -->
                @endforeach
                <div class="text--center">
                    <ul class="pagination">
                        {!! $news->appends(request()->except('page'))->links() !!}
                    </ul>
                </div>
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
                                    placeholder="@lang('massege.Search')">
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
                                <a href="{{route('Newscategory',$categorynews->id)}}">{{$categorynews->name_en}}</a>

                                @else
                                <a href="{{route('Newscategory',$categorynews->id)}}">{{$categorynews->name_ar}}</a>

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