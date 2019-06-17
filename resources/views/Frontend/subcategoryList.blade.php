@extends('layouts.front.master')
@section('content')


 <!-- start top page -->
 <section class="top-page">
        <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('home',app()->getLocale())}}">{{trans('massege.home')}}</a></li>
                    <!--  'title_ar', 'title_en', 'description_en', 'description_ar', 'status', 'slogen_ar', 'slogen_en',  -->
                    <li class="active">
                        @if(App::getLocale() == 'en')
                        {{$maincategory->name_en}}
                        @else
                        {{$maincategory->name_ar}}
                        @endif
                    </li>
                </ol>
        </div>
    </section>
    <!-- end top page -->
   <!-- start content page -->

   <section class="content-page">
         <!-- start main category -->
    <section class="main-category">
        <div class="container">
         
            <div class="row">
                @if($subcategorylist->isEmpty() != true)
                @foreach($subcategorylist as $sublist)
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="cat-details">
                        <div class="cat-img">
                            @if($sublist->image) 
                            @if(App::getLocale() == 'ar')
                            <a href="{{route('category.products',$sublist->slogen_ar)}}"><img src="{{asset($sublist->image)}}" class="img-responsive" width="100"></a>
                             @else
                            <a href="{{route('category.products',$sublist->slogen_en)}}"><img src="{{asset($sublist->image)}}" class="img-responsive" width="100"></a>
                              @endif 
                            @else
                            @if(App::getLocale() == 'ar')
                            <a href="{{route('category.products',$sublist->slogen_ar)}}"></a>
                             @else
                            <a href="{{route('category.products',$sublist->slogen_en)}}"></a>
                              @endif 
                            @endif
                        </div>
                        <div class="cat-name">
                        @if(App::getLocale() == 'ar')
                        <a href="{{route('category.products',$sublist->slogen_ar)}}">{{$sublist->name_ar}}</a>
                        @else
                       <a href="{{route('category.products',$sublist->slogen_en)}}">{{$sublist->name_en}}</a>
                        @endif
                            
                        </div>
                    </div>
                </div>
               @endforeach
               @else
               <div class="text-center">   
                                     <h2 style="color:#830C0C;">{{trans('massege.notfoundcategory')}}</h2>
                                   </div>

               @endif
            </div>
           
        </div>
    </section>
    <!-- end main category -->
        </div>
    </section>
    <!-- end content page -->
   
@endsection