@extends('layouts.front.master')

@section('content')
 <!-- start top page -->
 <section class="top-page">
        <div class="container">
                <ol class="breadcrumb">
                <li><a href="{{route('home')}}">{{trans('massege.home')}}</a></li>
                @if(app()->getLocale() == 'ar')
                    <li class="active">@lang('massege.Search')</li>
                    @else
                    <li class="active">>@lang('massege.Search')</li>
                @endif
            </ol>
        </div>
    </section>
    <!-- end top page -->
<section class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- <div class="ads">
                        <a href="#">
                            <img src="{{asset('/')}}/assetfront/images/top-cat-full.jpg" class="img-responsive">
                        </a>
                    </div> -->

                        <!-- start product -->
                        <section class="products">
                            <div class="controls">
                                <label>@lang('massege.Search') : </label>
                               
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
                                                        @php
                                                        $rate=\App\Comment::where([['product_id',$product->id],['approved','1']])->avg('rate');
                                                        @endphp
                                                @if($rate != 0)

                                                      @for( $i=0; $i < number_format($rate);$i++)
                                                                        <li class="fas fa-star"></li>
                                                                    @endfor
                                                                    @for( $i=0;$i < (5-number_format($rate));$i++)
                                                                     <li class="fas fa-star disable"></li>
                                                                    @endfor
                                                @else
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>

                                                  @endif
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
                                    <a href="{{url('/wishlist')}}/{{$product->id}}" > <i class="far fa-heart"></i></a>
                                    @else
                                    <a href="{{url('/login')}}" > <i class="far fa-heart"></i></a>
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
                                            <span class="sr-only"></span>
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
                  
                </div>
            </div>
    </section>
@endsection