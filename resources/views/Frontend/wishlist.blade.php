@extends('layouts.front.master')
@section('content')

<!-- start top page -->
<section class="top-page">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">@lang('massege.home')</a></li>
            <li class="active">@lang('massege.Favorites')</li>
        </ol>
    </div>
</section>
<!-- end top page Cart-->
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
                                @if(Auth::user())
                                <li> <a href="{{route('Profile')}}" ><i class="fas fa-cog"></i>
                                @lang('massege.Profile')</a></li>
                                <li> <a href="{{route('/Favorite')}}" class="active"><i class="far fa-heart"></i> @lang('massege.Favorites')</a></li>
                                  @endif
                                 <li> <a href="{{url('/Shopping-Cart-Show')}}"><i class="fas fa-shopping-basket"></i> @lang('massege.Cart') </a></li>
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
                        <div class="col-md-9 col-sm-8">
                                <div class="box_account">
                                        <div class="form_container">
                                                <div class="title-sec">
                                                        <h3><i class="far fa-heart"></i> @lang('massege.Favorites')</h3>
                                                        <hr>
                                                    </div>
                        
                                                <form>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered ">
                                                            <thead>
                                                                <tr>
                                                                    <td> @lang('massege.Image')</td>
                                                                    <td> @lang('massege.Name')</td>
                                                                    <td> @lang('massege.Category Name')</td>
                                                                    <td> @lang('massege.Price')</td>
                                                                    <td>@lang('massege.Total')</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($wishlists as $wishlist)
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <a href="#">
                                                                            <img src="{{asset($wishlist->product->images->first()->img)}}" alt="{{$wishlist->product->name_en}}" class="img-thumbnail">
                                                                        </a>
                        
                                                                    </td>
                                                                      @if(App::getLocale() == 'ar')
                                                                    <td>
                                                                        <a href="{{route('product.name',$wishlist->product->slogen_ar)}}">{{$wishlist->product->name_ar}} </a>

                                                                    </td>  
                                                                    <td>{{$wishlist->product->subcategory->name_ar}} </td>
                                                                    @else
                                                                    <td>
                                                                        <a href="{{route('product.name',$wishlist->product->slogen_en)}}">{{$wishlist->product->name_en}} </a>

                                                                    </td>

                                                                    <td>{{$wishlist->product->subcategory->name_en}} </td>
                                                                    @endif
                                                                    <td>  @if($wishlist->product->discount_price)                                                   
                                                                          ${{$wishlist->product->discount_price}}
                                                                          @else
                                                                           ${{$wishlist->product->price}}
                                                                          @endif
                                                                    </td>
                                                                    <td>
                                                                    @if($wishlist->product->discount_price)                                                   
                                                                          ${{$wishlist->product->discount_price}}
                                                                          @else
                                                                           ${{$wishlist->product->price }}
                                                                          @endif
                                                                    </td>
                                                                </tr>
                                                               @endforeach
                                                            </tbody>
                                                        </table>
                        
                                                    </div>
                                                </form>
                                                <div class="row">
                                                    <div class="col-md-4 col-md-offset-8">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered ">
                        
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <strong>@lang('massege.Total') :</strong>
                                                                        </td>
                                                                        <td>${{$sum}} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <strong> @lang('massege.Taxes'):</strong>
                                                                        </td>
                                                                        <td>5% </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <strong> @lang('massege.Total Sum'):</strong>
                                                                        </td>
                                                                        <td>${{$sum+($sum *.05)}} </td>
                                                                    </tr>
                        
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="link">
                                                    <a href="#" class="btn btn-default">@lang('massege.Shopping')</a>
                        
                                                    <a href="#" class="btn btn-default pull-left"> @lang('massege.Complete Checkout')</a>
                                                </div>
                        
                                            </div>
                                    </div>
        
                        </div>
                    </div>
               

        </div>
    </section>
@endsection
