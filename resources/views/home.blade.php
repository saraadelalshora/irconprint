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
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="ads-main">
                    @if($ads->status1)
                    <a href="$ads->link1"><img  src="{{asset($ads->img1)}}" class="img-responsive"></a>
                    @endif
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
    <!-- end status -->
    <!-- start main category  -->
    <section class="main-category p-30">
        <div class="container">
            <div class="sec-title">
                <h3>@lang('massege.Main Categories')</h3>
            </div>
            <div class="row">

        @foreach($subcategories as $categoryyyyy)
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="cat-details">
                        <div class="cat-img">
                        @if($categoryyyyy->image) 
                            @if(App::getLocale() == 'ar')
                            <a href="{{route('category.name',$categoryyyyy->slogen_ar)}}"><img src="{{asset($categoryyyyy->image)}}" class="img-responsive" width="100"></a>
                             @else
                            <a href="{{route('category.name',$categoryyyyy->slogen_en)}}"><img src="{{asset($categoryyyyy->image)}}" class="img-responsive" width="100"></a>
                              @endif 
                            @else
                            @if(App::getLocale() == 'ar')
                            <a href="{{route('category.name',$categoryyyyy->slogen_ar)}}"><img src="{{asset('/defaultimage.jpg')}}" class="img-responsive" width="100"></a>
                             @else
                            <a href="{{route('category.name',$categoryyyyy->slogen_en)}}"><img src="{{asset('/defaultimage.jpg')}}" class="img-responsive" width="100"></a>
                              @endif 
                            @endif
                        </div>
                        <div class="cat-name">
                        @if(App::getLocale() == 'ar')
                            <a href="{{route('category.name',$categoryyyyy->slogen_ar)}}">{{$categoryyyyy->name_ar}}</a>
                        @else
                        <a href="{{route('category.name',$categoryyyyy->slogen_en)}}">{{$categoryyyyy->name_en}}</a>

                        @endif    
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!-- end main category -->
    <!-- start ads img 1 ,2 ,3 -->
    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a href="#">
                        <img  src="{{asset($ads->img2)}}" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a href="#">
                        <img  src="{{asset($ads->img3)}}" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a href="#">
                        <img  src="{{asset($ads->img4)}}" class="img-responsive">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end ads -->
    <!-- start products Last Products -->
    <section class="products p-t-30">
        <div class="container">
            <div class="sec-title">
                <h3>@lang('massege.Last Products')</h3>
            </div>
            <div class="owl-carousel owl-theme owl-product">
            
            @foreach($lastproduct as  $last)
                <div class="item">
                <div class="product-all">
                                            <div class="product-grid">
                                                <div class="product-image">
                                                    <a href="#" class="image">
                                                        @foreach($last->images->take(1) as $image)
                                                        <img class="pic-1" src="{{asset($image->img)}}">
                                                        <img class="pic-2" src="{{asset($image->img)}}">
                                                        @endforeach
                                                    </a>
                                                    <!-- if product add at last 7 day will be new -->
                                                    @if($last->created_at >=  date('Y-m-d H:i:s',strtotime('-7 days')))
                                                    <span class="product-sale-label">@lang('massege.New')</span>
                                                    @endif
                                                    @if($last->discount_price)
                                                    <span class="product-discount-label">{{number_format((($last->price-$last->discount_price)*100/$last->price))}}%</span>
                                                    @endif
                                                </div>
                                                <div class="product-content">
                                                    <ul class="rating">
                                                        <!-- <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star disable"></li> -->
                                                    </ul>
                                                    @if(app()->getLocale() == 'ar')
                                                    <h3 class="title"><a href="{{route('product.name',$last->slogen_ar)}}">{{$last->name_ar}}</a></h3>
                                                    @else
                                                    <h3 class="title"><a href="{{route('product.name',$last->slogen_en)}}">{{$last->name_en}}</a></h3>
                                                    @endif

                                                    @if($last->discount_price)                                                   
                                                    <div class="price"><span>$ {{$last->price}}</span> ${{$last->discount_price}}</div>
                                                    @else
                                                    <div class="price"> ${{$last->price}} </div>

                                                    @endif                                            
                                                    <div class="product-button-group">
                                                    @if(Auth::User())
                                                         <a  class="product-like-icon" href="{{url('/wishlist')}}/{{$last->id}}" > <i class="far fa-heart"></i></a>
                                    @else
                                    <a class="product-like-icon" href="{{url('/login')}}" > <i class="far fa-heart"></i></a>
                                    @endif
                                                        <a class="add-to-cart" href="{{url('/Add-To-Cart')}}/{{$last->id}}"><i
                                                                class="fas fa-shopping-basket"></i>@lang('massege.Add to Cart')</a>
                                                        <a class="product-compare-icon" href="#"><i
                                                                class="fas fa-random"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                </div>
                @endforeach
            



            </div>
        </div>
    </section>
    <!-- end products -->
   <!-- start ads -->
        <section class="ads p-t-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="#">
                        <img  src="{{asset($ads->img5)}}" class="img-responsive">
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- end ads -->
   

 <!-- start ads -->
 <!-- <section class="ads p-t-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#">
                        <img  src="{{asset('/')}}/assetfront/images/n2.jpg" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#">
                        <img  src="{{asset('/')}}/assetfront/images/n3.jpg" class="img-responsive">
                    </a>
                </div>

            </div>
        </div>
 </section> -->
    <!-- end ads -->
    <!-- start products Featured Products-->
    <section class="products p-t-30">
        <div class="container">
            <div class="sec-title">
                <h3>@lang('massege.Featured Products')</h3>
            </div>
            <div class="owl-carousel owl-theme owl-product">
            @foreach($specialproduct as $specail)
            <div class="item">
                <div class="product-all">
                                            <div class="product-grid">
                                                <div class="product-image">
                                                    <a href="#" class="image">
                                                        @foreach($specail->images->take(1) as $image)
                                                        <img class="pic-1" src="{{asset($image->img)}}">
                                                        <img class="pic-2" src="{{asset($image->img)}}">
                                                        @endforeach
                                                    </a>
                                                    <!-- if product add at last 7 day will be new -->
                                                    @if($specail->created_at >=  date('Y-m-d H:i:s',strtotime('-7 days')))
                                                    <span class="product-sale-label">@lang('massege.New')</span>
                                                    @endif
                                                    @if($specail->discount_price)
                                                    <span class="product-discount-label">{{number_format((($specail->price-$specail->discount_price)*100/$specail->price))}}%</span>
                                                    @endif
                                                </div>
                                                <div class="product-content">
                                                    <ul class="rating">
                                                        <!-- <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star disable"></li> -->
                                                    </ul>
                                                    @if(app()->getLocale() == 'ar')
                                                    <h3 class="title"><a href="{{route('product.name',$specail->slogen_ar)}}">{{$specail->name_ar}}</a></h3>
                                                    @else
                                                    <h3 class="title"><a href="{{route('product.name',$specail->slogen_en)}}">{{$specail->name_en}}</a></h3>
                                                    @endif

                                                    @if($specail->discount_price)                                                   
                                                    <div class="price"><span>$ {{$specail->price}}</span> ${{$specail->discount_price}}</div>
                                                    @else
                                                    <div class="price"> ${{$specail->price}} </div>

                                                    @endif                                            
                                                    <div class="product-button-group">
                                                    @if(Auth::User())
                                                         <a  class="product-like-icon" href="{{url('/wishlist')}}/{{$specail->id}}" > <i class="far fa-heart"></i></a>
                                    @else
                                    <a class="product-like-icon" href="{{url('/login')}}" > <i class="far fa-heart"></i></a>
                                    @endif
                                                        <a class="add-to-cart" href="{{url('/Add-To-Cart')}}/{{$specail->id}}"><i
                                                                class="fas fa-shopping-basket"></i>@lang('massege.Add to Cart')</a>
                                                        <a class="product-compare-icon" href="#"><i
                                                                class="fas fa-random"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                </div>
               
            @endforeach


            </div>
        </div>
    </section>
    <!-- end products -->
    <!-- start products best seller-->
    <section class="products p-t-30">
        <div class="container">
            <div class="sec-title">
                <h3>@lang('massege.Best Seller')</h3>
            </div>
            <div class="owl-carousel owl-theme owl-product">
            @foreach($bestsellerproduct as $best)
            <div class="item">
                <div class="product-all">
                                            <div class="product-grid">
                                                <div class="product-image">
                                                    <a href="#" class="image">
                                                        @foreach($best->images->take(1) as $image)
                                                        <img class="pic-1" src="{{asset($image->img)}}">
                                                        <img class="pic-2" src="{{asset($image->img)}}">
                                                        @endforeach
                                                    </a>
                                                    <!-- if product add at last 7 day will be new -->
                                                    @if($best->created_at >=  date('Y-m-d H:i:s',strtotime('-7 days')))
                                                    <span class="product-sale-label">@lang('massege.New')</span>
                                                    @endif
                                                    @if($best->discount_price)
                                                    <span class="product-discount-label">{{number_format((($best->price-$best->discount_price)*100/$best->price))}}%</span>
                                                    @endif
                                                </div>
                                                <div class="product-content">
                                                    <ul class="rating">
                                                        <!-- <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star"></li>
                                                        <li class="fas fa-star disable"></li> -->
                                                    </ul>
                                                    @if(app()->getLocale() == 'ar')
                                                    <h3 class="title"><a href="{{route('product.name',$best->slogen_ar)}}">{{$best->name_ar}}</a></h3>
                                                    @else
                                                    <h3 class="title"><a href="{{route('product.name',$best->slogen_en)}}">{{$best->name_en}}</a></h3>
                                                    @endif

                                                    @if($best->discount_price)                                                   
                                                    <div class="price"><span>$ {{$best->price}}</span> ${{$best->discount_price}}</div>
                                                    @else
                                                    <div class="price"> ${{$best->price}} </div>

                                                    @endif                                            
                                                    <div class="product-button-group">
                                                    
                                                                @if(Auth::User())
                                                         <a  class="product-like-icon" href="{{url('/wishlist')}}/{{$best->id}}" > <i class="far fa-heart"></i></a>
                                    @else
                                    <a class="product-like-icon" href="{{url('/login')}}" > <i class="far fa-heart"></i></a>
                                    @endif
                                                        <a class="add-to-cart" href="{{url('/Add-To-Cart')}}/{{$best->id}}"><i
                                                                class="fas fa-shopping-basket"></i>@lang('massege.Add to Cart')</a>
                                                        <a class="product-compare-icon" href="#"><i
                                                                class="fas fa-random"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                </div>
               
             @endforeach


            </div>
        </div>
    </section>
    <!-- end products -->
   
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
