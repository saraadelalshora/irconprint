@extends('layouts.front.master')
@section('meta')
@if(app()->getLocale() == 'ar')
<title>{{$setting->store_name_ar}} | {{$product->name_ar}} </title>
<meta name="description" content="{{--$setting->description_ar--}}">
<meta name="keywords" content="{{$product->tag_ar}}">
@else
<title>{{$setting->store_name_ar}} | {{$product->name_en}} </title>
<meta name="description" content="{{--$setting->description_en--}}">
<meta name="keywords" content="{{$product->tag_en}}">
@endif
@endsection
@section('content')
 <!-- start top page -->
 <section class="top-page">
        <div class="container">
                <ol class="breadcrumb">
                <li><a href="{{route('home')}}">{{trans('massege.home')}}</a></li>
                @if(app()->getLocale() == 'ar')
                    <li class="active">{{$product->subcategory->name_ar}}</li>
                    @else
                    <li class="active">{{$product->subcategory->name_en}}</li>
                @endif
                @if(app()->getLocale() == 'ar')
                    <li class="active">{{$product->name_ar}}</li>
                    @else
                    <li class="active">{{$product->name_en}}</li>
                @endif
            </ol>
        </div>
    </section>
    <!-- end top page -->
    <!-- start content page -->

    <section class="content-page ">
        <div class="container">
            <div class="det-all box_account">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        @if($product->images->isEmpty() != true)
                       
                        <div class="xzoom-container">
                            <img class="xzoom" id="xzoom-default"  src="{{asset($product->images->first()->img)}}" xoriginal="{{asset($product->images->first()->img)}}" />
                            <div class="xzoom-thumbs">
                                <div class=" owl-carousel owl-theme owl-xzoom">
                           @foreach($product->images as $image)
                                    <div class="item">
                                        <a href="{{asset($image->img)}}">
                                            <img class="xzoom-gallery"  src="{{asset($image->img)}}"
                                                xpreview="{{asset($image->img)}}" title="The description goes here">
                                        </a>
                                    </div>
                            @endforeach            
                                   
                                </div>
                            </div>
                          
                        </div>
                     
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-details">
                            <div class="ads-info">
                           @if(app()->getLocale() == 'ar')
                                <h2> {{$product->name_ar}}</h2>
                             @else

                               <h2> {{$product->name_en}}  </h2>
                            @endif

                                <ul class="rating">
                                    
                                @for( $i=0; $i < number_format($rate);$i++)
                                                                        <li class="fas fa-star"></li>
                                                                    @endfor
                                                                    @for( $i=0;$i < (5-number_format($rate));$i++)
                                                                     <li class="fas fa-star disable"></li>
                                                                    @endfor
                                                                       
                                </ul>
                                @if($product->discount_price)                                                   
                                   <div class="price"><span>$ {{$product->price}}</span> ${{$product->discount_price}}</div>
                                @else
                                  <div class="price"> ${{$product->price}} </div>

                                @endif
                            </div>
                            <hr>
                            <div class="product-content">
                                <p>
                                @if(app()->getLocale() == 'ar') 
                                                     {!! str_limit($product->description_ar, $limit = 150, $end = '...') !!}
                                                     @else
                                                     {!! str_limit($product->description_en, $limit = 150, $end = '...')  !!}
                               @endif
                                </p>
                                <div class="dt-info">
                                    <div class="number">
                                        <input type="text" value="1" />
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="dt-btn">
                                    @if(Auth::User())
                                    <a href="{{url('/wishlist')}}/{{$product->id}}" class="btn btn-single"> <i class="far fa-heart"></i></a>
                                    @else
                                    <a href="{{url('/login')}}" class="btn btn-single"> <i class="far fa-heart"></i></a>
                                    @endif
                                    <a  href="{{url('/Add-To-Cart')}}/{{$product->id}}" class="btn btn-single"> <i class="fas fa-shopping-basket"></i> </a>
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="list-inline links">
                                        <li><strong>@lang('massege.Category') :</strong></li>
                                        @if(app()->getLocale() == 'ar')
                                        <li><a href="#">{{$product->subcategory->category->name_ar}} </a></li>,
                                        <li><a href="{{route('category.products',$product->subcategory->slogen_ar)}}">{{$product->subcategory->name_ar}}</a></li>
                                       @else
                                       <li><a href="#">{{$product->subcategory->category->name_en}} </a></li>,
                                      <li><a href="{{route('category.products',$product->subcategory->slogen_en)}}">{{$product->subcategory->name_en}}</a></li>
                                       @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="det-all">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="details-info">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active">
                                        <a href="#sec1" role="tab" data-toggle="tab">@lang('massege.Specifications')
                                        </a>
                                    </li>
                                    <li >
                                        <a href="#sec2" role="tab" data-toggle="tab">@lang('massege.Comments') </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active " id="sec1">
                                        <h4 class="pro-title"></h4>
                                        <div class="table-responsive">
                                        @if(app()->getLocale() == 'ar') 
                                                     {!! $product->description_ar !!}
                                                     @else
                                                     {!! $product->description_en !!}
                                       @endif
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade  " id="sec2">
                                        <div id="reviews">
                                            <div id="comments">
                                                <h4 class="pro-title"> @lang('massege.Comments')</h4>
                                                <ul class="commentlist">
                                                @if($product->comments)
                                                @foreach($product->comments as $comment)
                                                @if($comment->approved == 1)
                                                    <li class="review">
                                                        <div class="comment_info">
                                                            <img alt=""  src="{{asset('/')}}/assetfront/images/1.jpg" class="avatar">
                                                            <div class="comment-text">
                                                                <div class="rate">
                                                                    <ul class="rating">
                                                                    @for( $i=0; $i < $comment->rate;$i++)
                                                                        <li class="fas fa-star"></li>
                                                                    @endfor
                                                                    @for( $i=0;$i < (5-$comment->rate);$i++)
                                                                     <li class="fas fa-star disable"></li>
                                                                    @endfor
                                                                       
                                                                    </ul>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong>{{$comment->user->fname}}</strong> – <time>{{$comment->created_at->format('d/m/Y')}}</time>:
                                                                </p>
                                                                <div class="description">
                                                                    <p>{{$comment->comment}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                                  @endforeach
                                                  @endif
                                                  
                                                </ul>
                                            </div>
                                            <div class="review_form">
                                            <form class="comment-form" method="post" action="{{route('review',$product->id)}}">
                                            {{csrf_field()}} 
                                                <h4 class="pro-title">@lang('massege.Add Comment')
                                                </h4>
                                                <div class="rating">
                                                    <span>@lang('massege.Rate Now')</span>

                                                    <input type="radio" id="star5" name="rating" value="5" />
                                                    <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating"
                                                        value="4 and a half" />
                                                    <label class="half" for="star4half"
                                                        title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" />
                                                    <label class="full" for="star4"
                                                        title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating"
                                                        value="3 and a half" />
                                                    <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" />
                                                    <label class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating"
                                                        value="2 and a half" />
                                                    <label class="half" for="star2half"
                                                        title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" />
                                                    <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating"
                                                        value="1 and a half" />
                                                    <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" />
                                                    <label class="full" for="star1"
                                                        title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating" value="half" />
                                                    <label class="half" for="starhalf"
                                                        title="Sucks big time - 0.5 stars"></label>
                                                </div>
                                               
                                                    <div class="form-group">
                                                        <textarea name="comment" class="form-control"
                                                            rows="6"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-default"> @lang('massege.send')</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                <!-- start RELATED PRODUCTS  -->
                <div class="container">
                <section class="products  box_account">
                        <div class="sec-title">
                            <h3>@lang('massege.Related Product')</h3>
                        </div>
                        <div class="row">
                        @if($product->images->isEmpty() != true)
                        <div class=" text-center">
                            <h3 style="color:#ff5400;">@lang('massege.Sorry there is No product Related')</h3>
                        </div>
                        @else
                         @foreach($related_product as $productrelated)
                         @if($productrelated->id != $product->id)
                            <div class="col-md-3 col-sm-3">
                                <div class="product-all">
                                    <div class="product-grid">
                                    <div class="product-image">
                                                    <a href="#" class="image">
                                                        @foreach($productrelated->images->take(1) as $image)
                                                        <img class="pic-1" src="{{asset($image->img)}}">
                                                        <img class="pic-2" src="{{asset($image->img)}}">
                                                        @endforeach
                                                    </a>
                                                    <!-- if product add at last 7 day will be new -->
                                                    @if($productrelated->created_at >=  date('Y-m-d H:i:s',strtotime('-7 days')))
                                                    <span class="product-sale-label">@lang('massege.New')</span>
                                                    @endif
                                                    @if($productrelated->discount_price)
                                                    <span class="product-discount-label">{{number_format((($productrelated->price-$productrelated->discount_price)*100/$productrelated->price))}}%</span>
                                                    @endif
                                        </div>
                                        <div class="product-content">
                                            <ul class="rating">
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star"></li>
                                                <li class="fas fa-star disable"></li>
                                            </ul>
                                                   @if(app()->getLocale() == 'ar')
                                                    <h3 class="title"><a href="{{route('product.name',$productrelated->slogen_ar)}}">{{$productrelated->name_ar}}</a></h3>
                                                    @else
                                                    <h3 class="title"><a href="{{route('product.name',$productrelated->slogen_en)}}">{{$productrelated->name_en}}</a></h3>
                                                    @endif

                                                    @if($productrelated->discount_price)                                                   
                                                    <div class="price"><span>$ {{$productrelated->price}}</span> ${{$productrelated->discount_price}}</div>
                                                    @else
                                                    <div class="price"> ${{$productrelated->price}} </div>
                                                    @endif
                                           
                                            <div class="product-button-group">
                                            @if(Auth::User())
                                    <a href="{{url('/wishlist')}}/{{$product->id}}" class="btn btn-single"> <i class="far fa-heart"></i></a>
                                    @else
                                    <a href="{{url('/login')}}" class="btn btn-single"> <i class="far fa-heart"></i></a>
                                    @endif
                                                <a class="add-to-cart" href="#"><i
                                                        class="fas fa-shopping-basket"></i>أضف للسلة</a>
                                                <a class="product-compare-icon" href="#"><i
                                                        class="fas fa-random"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
                        @endif
                        </div>
                    </section>
                </div>
                <!-- end RELATED PRODUCTS  -->
          
   
@endsection