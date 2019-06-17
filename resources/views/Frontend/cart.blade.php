@extends('layouts.front.master')
@section('content')
<!-- start top page -->
<section class="top-page">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">@lang('massege.home')</a></li>
            <li class="active">@lang('massege.Cart')</li>
        </ol>
    </div>
</section>
<!-- end top page -->
      <!-- start contentpage -->
      <section class="content-page p-80">
        <div class="container">
                <div class="row">
                        <div class="col-md-3 col-sm-4 sticky">
                            <div class="side-info user-info">
                                <form class="form-img text-center">
                                    <div class="form-group">
                                        <img id="blah" src="{{asset('/')}}/assetfront/images/imag-01.jpg" class="img-circle" alt="user profile" />
        
                                    </div>
                                    <div class="form-group">
                                        <input type="file" onchange="readURL(this);" class="file-image">
                                    </div>
                                </form>
                                <hr>
                                <ul class="list-unstyled user-list">
                                <li> <a href="{{url('/Shopping-Cart-Show')}}" class="active"><i class="fas fa-shopping-basket"></i> @lang('massege.Cart') </a></li>

                                @if(Auth::user())
                                <li> <a href="{{route('Profile')}}" ><i class="fas fa-cog"></i>
                                      @lang('massege.Profile')</a></li>
                                <li> <a href="{{route('/Favorite')}}"><i class="far fa-heart"></i> @lang('massege.Favorites')</a></li>
                                @endif
                             
                                 @if(Auth::user())
                                 <li> <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        @lang('massege.Log out')</a></li>
                                 @endif
                                </ul>
                            </div>
                        </div>
                      {{--  @if(Auth::user())--}}
                        <div class="col-md-9 col-sm-8">
                                <div class="box_account">
                                @if(count($cart) > 0)
                                        <div class="form_container">
                                                <div class="title-sec">
                                                        <h3><i class="fas fa-shopping-basket"></i>  @lang('massege.Cart') </h3>
                                                        <hr>
                                                    </div>
                        
                                             
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered ">
                                                            <thead>
                                                                <tr>
                                                                <td> @lang('massege.Image')</td>
                                                                    <td> @lang('massege.Name')</td>
                                                                    <td> @lang('massege.Category Name')</td>
                                                                    <td>@lang('massege.Quantity') </td>
                                                                    <td> @lang('massege.Price')</td>
                                                                    <td>@lang('massege.Total')</td>                                                                  
                                                                  
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if(count($cart)>0)
                                                                  @foreach($cart as $ca)
                                                                    <tr>
                                                                    <td class="text-center">
                                                                        <a href="{{url('/Single-Prodect')}}/{{$ca->id}}/@if(session::get('lang') == 'en'){{ $ca->attributes['slogen_en'] }}@elseif(session::get('lang') == 'ar'){{ $ca->attributes['slogen_ar'] }}@endif">
                                                                            <img src="{{asset($ca->attributes['image'])}}" alt="products" class="img-thumbnail">
                                                                        </a>
                        
                                                                    </td>
                                                                    @if(session::get('lang') == 'ar')
                                        <td>

                                            <a href="{{url('/Single-Prodect')}}/{{$ca->id}}/@if(session::get('lang') == 'en'){{ $ca->attributes['slogen_en'] }}@elseif(session::get('lang') == 'ar'){{ $ca->attributes['slogen_ar'] }}@endif">{{$ca->name}}</a>


                                        </td>
                                        @endif
                                        @if(session::get('lang') == 'en')
                                        <td>

                                            @if(!empty($ca->attributes['name_en']))
                                            <a href="{{url('/Single-Prodect')}}/{{$ca->id}}/@if(session::get('lang') == 'en'){{ $ca->attributes['slogen_en'] }}@elseif(session::get('lang') == 'ar'){{ $ca->attributes['slogen_ar'] }}@endif">{{$ca->attributes['name_en']}}</a>
                                            @endif

                                        </td>
                                        @endif
                                        @if(session::get('lang') == 'ar')
                                        <td>{{$ca->attributes['sub_cat_ar']}}</td>
                                        @endif
                                        @if(session::get('lang') == 'en')
                                        <td>{{$ca->attributes['sub_cat_en']}}</td>
                                        @endif
                                        <td>
                                        
                                        <form  method="POST" action="{{route('CartEdit',$ca->id)}}" method="POST"  >
                                                 {{csrf_field()}}
                                                <div class="input-group btn-block">
                                                    <input type="text" class="form-control" name="qty" value="{{ $ca->quantity }}" size="1">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fas fa-sync-alt"></i>
                                                        </button>
                                                        @if(session::get('lang') == 'en')
                                                        <a href="{{url('/Shopping-Cart-Delete')}}/{{$ca->id}}" onclick="return confirm('Do you want to delete')"type="button" class="btn btn-danger">
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>
                                                        @endif
                                                        @if(session::get('lang') == 'ar')
                                                        <a href="{{url('/Shopping-Cart-Delete')}}/{{$ca->id}}" onclick="return confirm('هل تريد الحذف')"type="button" class="btn btn-danger">
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>
                                                        @endif
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{number_format(($ca->price ),1, '.', '')}} {{trans('massege.EGP')}}</td>
                                        <td>{{number_format(($ca->price *  $ca->quantity ),1, '.', '')}} {{trans('massege.EGP')}}</td>
                                                                    </tr>
                                                                  @endforeach
                                                                @endif
                                                             </tbody>
                                                        </table>
                        
                                                    </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-4 col-md-offset-8">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered ">
                        
                                                                <tbody>
                                                       
                                            
                                                                    <tr>
                                                                        <td>
                                                                        <strong>{{trans('massege.Taxes')}}:</strong>
                                                                        </td>
                                                                        <td>  %5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <strong> {{trans('massege.Total Sum')}}:</strong>
                                                                        </td>
                                                                        <td>{{number_format(($cartsum),1, '.', '')}} {{trans('massege.EGP')}}</td>
                                                                    </tr>
                        
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="link">
                            <a href="{{url("/")}}" class="btn btn-default">{{trans('massege.Shopping')}}</a>
                            @if(count($cart)>0)
                            @if(Auth::check())
                            <a href="{{url('/Checkout')}}" class="btn btn-default pull-left">{{trans('massege.Complete Checkout')}}</a>
                            @else
                            <a href="{{route('login')}}" class="btn btn-default pull-left">{{trans('massege.Complete Checkout')}}</a>
                            @endif
                            @endif
                        </div>
                        
                                            </div>
                                    </div>
                                    @else
                    <div class="text-center">   
                        <h2 style="color:#830C0C;">{{trans('massege.notfoundproduct')}}</h2>
                    </div>
                    @endif
                        </div>
                       {{-- @endif--}}
                   
                    </div>
               

        </div>
    </section>
@endsection