@extends('layouts.front.master')
@section('meta')
@if(app()->getLocale() == 'ar')
<title>{{$setting->store_name_ar}} | {{$filter->name_ar}} </title>
<meta name="description" content="{{$filter->subcategories->first()->description_ar}}">
<meta name="keywords" content="{{$filter->subcategories->first()->tag_ar}}">
@else
<title>{{$setting->store_name_ar}} | {{$filter->name_en}} </title>
<meta name="description" content="{{$filter->subcategories->first()->description_en}}">
<meta name="keywords" content="{{$filter->subcategories->first()->tag_en}}">
@endif
@endsection
@section('content')
     <!-- start top page -->
     <section class="top-page">
        <div class="container">
                <ol class="breadcrumb">
                <li><a href="{{route('home')}}">{{trans('massege.home')}}</a></li>
                <li>@lang('massege.Products Categories')</li>
                @if(app()->getLocale() == 'ar')
                    <li class="active">{{$filter->name_ar}}</li>
                    @else
                    <li class="active">{{$filter->name_en}}</li>
                @endif
            </ol>
        </div>
    </section>
    <!-- end top page -->
    <!-- start content page -->
    <section class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                    <div class="ads">
                        <a href="#">
                            <img src="{{asset('/')}}/assetfront/images/top-cat-full.jpg" class="img-responsive">
                        </a>
                    </div>

                        <!-- start product -->
                        <section class="products">
                            <div class="controls">
                                <label>@lang('massege.Filter') : </label>
                                <select class="select-filter form-control">
                                    <option value="all">@lang('massege.All')</option>
                                    <option value=".category-1">filter1</option>
                                    <option value=".category-2">filter2</option>
                                </select>
                                <select class="select-sort form-control">
                                    <option value="default:asc">@lang('massege.Ascending')</option>
                                    <option value="default:desc">@lang('massege.Descending')</option>
                                </select>
                                <div class="btn-group">
                                    <a href="#" id="grid" class="btn btn-default btn-sm active"><i
                                            class="fas fa-th"></i></a>
                                    <a href="#" id="list" class="btn btn-default btn-sm"><i
                                            class="fas fa-th-list"></i></a>
                                </div>
                            </div>
                            <div id="Container " class="container1">

                                <div class="row">
                                    @if($products->isEmpty() != true)
                                    @foreach($products as $product)
                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3  mix category-1 list-item"
                                        data-myorder="1">
                                        <div class="product-all">
                                            <div class="product-grid">
                                                <div class="product-image">
                                                    <a href="#" class="image">
                                                        @foreach($product->images->take(1) as $image)
                                                        <img class="pic-1" src="{{asset($image->img)}}">
                                                        <img class="pic-2" src="{{asset($image->img)}}">
                                                        @endforeach
                                                    </a>
                                                    <!-- if product add at last 7 day will be new -->
                                                    @if($product->created_at >=  date('Y-m-d H:i:s',strtotime('-7 days')))
                                                    <span class="product-sale-label">@lang('massege.New')</span>
                                                    @endif
                                                    @if($product->discount_price)
                                                    <span class="product-discount-label">{{number_format((($product->price-$product->discount_price)*100/$product->price))}}%</span>
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
                                                    <h3 class="title"><a href="{{route('product.name',$product->slogen_ar)}}">{{$product->name_ar}}</a></h3>
                                                    @else
                                                    <h3 class="title"><a href="{{route('product.name',$product->slogen_en)}}">{{$product->name_en}}</a></h3>
                                                    @endif

                                                    @if($product->discount_price)                                                   
                                                    <div class="price"><span>$ {{$product->price}}</span> ${{$product->discount_price}}</div>
                                                    @else
                                                    <div class="price"> ${{$product->price}} </div>

                                                    @endif
                                                    <div class="pro-p">
                                                     @if(app()->getLocale() == 'ar') 
                                                     {!! str_limit($product->description_ar, $limit =20, $end = '...') !!}
                                                     @else
                                                     {!! str_limit($product->description_en, $limit =20, $end = '...') !!}
                                                     @endif
                                                    </div>
                                                    <div class="product-button-group">
                                                    @if(Auth::User())
                                                         <a class="product-like-icon" href="{{url('/wishlist')}}/{{$product->id}}" > <i class="far fa-heart"></i></a>
                                    @else
                                    <a class="product-like-icon" href="{{url('/login')}}" > <i class="far fa-heart"></i></a>
                                    @endif
                                                        <a class="add-to-cart" href="{{url('/Add-To-Cart')}}/{{$product->id}}"><i
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
                            <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination ">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="#">1
                                            <span class="sr-only">{{$products->render()}}</span>
                                        </a>
                                    </li>
                                   
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            @else
                                   <div class="text-center">   
                                     <h2 style="color:#830C0C;">{{trans('massege.notfoundproduct')}}</h2>
                                   </div>
                                   @endif
                        </section>
                        <!-- end product -->
                    </div>
                    <div class=" col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     
                        <div class="sidebar">
                            @if($filter->subcategories->first()->filters->isEmpty() != true)
                            <div class="side-info">
                                <div class="side-title">
                                    <h4> @lang('massege.Classifications') </h4>
                                </div>
                               <div class="filtter">
                                    <ul>
                                            <li>
                                                <label class="container_check">@lang('massege.All') 
                                                    <input type="checkbox" value="all" checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>

                                      @foreach($filter->subcategories->first()->filters as $category)
                                      @if(app()->getLocale() == 'ar') 
                                            <li>
                                                <label class="container_check">{{$category->name_ar}}
                                                    <input type="checkbox" value=".cat1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>  
                                     @else
                                          <li>
                                                <label class="container_check">{{$category->name_en}}
                                                    <input type="checkbox" value=".cat1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li> 
                                      @endif
                                      @endforeach
                                        </ul>
                               </div>
                            </div>
                            @endif
                           @if($manufactors)
                            <div class="side-info">
                                <div class="side-title">
                                    <h4>@lang('massege.Brands')  </h4>
                                </div>
                               <div class="filtter">
                                    <ul>
                                            <li>
                                                <label class="container_check">@lang('massege.All') 
                                                    <input type="checkbox" value="all" checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>

                                 @foreach($manufactors as $manufactor)
                                      @if(app()->getLocale() == 'ar') 
                                            <li>
                                                <label class="container_check">{{$manufactor->name_ar}}
                                                    <input type="checkbox" value=".cat1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>  
                                     @else
                                          <li>
                                                <label class="container_check">{{$manufactor->name_en}}
                                                    <input type="checkbox" value=".cat1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li> 
                                      @endif
                                @endforeach
                                            
                                        </ul>
                               </div>
                            </div>
                           @endif
                           
                           <!-- when we make orders -->
                            <div class="side-info">
                                <div class="side-title">
                                    <h4> @lang('massege.Best Seller')</h4>
                                </div>
                                <ul class="selling list-unstyled">
                                @if(isset($bestsellerproduct))
                                @foreach($bestsellerproduct as $bestseller)
                                    <li>
                                        <a href="#">
                                        @if($bestseller->images->first())
                                        <img src="{{asset($bestseller->images->first()->img)}}" class="img-responsive">
                                        @else
                                        <img src="{{asset('/defaultimage.jpg')}}" class="img-responsive">

                                        @endif
                                        </a>
                                        <div class="sel-info">
                                        @if(app()->getLocale() == 'ar') 
                                            <h4> {{$bestseller->name_ar}}</h4>
                                        @else
                                            <h4> {{$bestseller->name_en}}</h4>
                                        @endif    
                                            <div class="price">@if($bestseller->discount_price)<span>${{number_format($bestseller->discount_price)}}</span>@endif ${{$bestseller->price}}</div>
                                        </div>
                                    </li>
                                @endforeach
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- end content page -->
@endsection