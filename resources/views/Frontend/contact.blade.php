@extends('layouts.front.master')
@section('content')
 <!-- start top page -->
 <section class="top-page">
        <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">{{trans('massege.home')}}</a></li>
                    <li class="active">{{trans('massege.contact')}}</li>
                </ol>
        </div>
    </section>
    <!-- end top page -->
     <!-- start contentpage -->
     <section class="content-page">
            <div class="container">
              <div class="det-contact">
                  <div class="row">
                      <div class="col-md-4 col-sm-12">
                          <div class="box_account contact">
                                <div class="con-icon"> <i class="fas fa-map-marker-alt"></i></div>
                                <div class="con-content">
                                <h4>{{trans('massege.address')}}</h4>
                                <p>{{$setting->address}}</p>
                          </div>
                      </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <div class="box_account contact">
                                <div class="con-icon"> <i class="fas fa-phone"></i></div>
                                <div class="con-content">
                                <h4>{{trans('massege.phone')}}</h4>
                                <p> {{$setting->phone}}</p>
                                </div>
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                          <div class="box_account contact">
                                <div class="con-icon"> <i class="far fa-envelope"></i></div>
                                <div class="con-content">
                                <h4>{{trans('massege.email')}}</h4>
                                <p><a href="#">{{$setting->email}}</a> </p>
                                </div>
                          </div>
                      </div>
                     
                  </div>
              </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="contact-form box_account">
                                    
                                    <form action="{{route('contactus.store')}}" method="POST">
                                    {{ csrf_field() }}
                                            <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text"  name="fname" class="form-control" placeholder="@lang('massege.fname')" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="lname" class="form-control" placeholder="@lang('massege.lname')" />
                                        </div>
                                        <div class="form-group col-md-6 ">
                                            <input type="text"  name="email"class="form-control" placeholder="@lang('massege.email')" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="title" class="form-control" placeholder="@lang('massege.title')" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" name="massege" rows="5" placeholder="@lang('massege.massege')"></textarea>
                                        </div>
            
                                        <div class="form-group col-md-12 col-xs-12 ">
                                            <button type="sumbit" class="btn btn-default btn-lg btn-block">@lang('massege.send')</button>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="clearfix"></div>
            
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="contact-form">
                                    <div class="contact-info">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item"
                                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55251.37709963685!2d31.22344489548743!3d30.059483810339614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1518088668058"
                                                        width="100%" height="700" frameborder="0" style="border:0" allowfullscreen></iframe>
                    
                                                </div>
                                      
                                        <ul class="list-inline social">
                                                <li class="fc"><a href="#"> <i class="fab fa-facebook-f"></i></a></li>
                                                <li class="tw"><a href="#"><i class="fab fa-twitter"></i> </a></li>

                                                <li class="in"><a href="#"><i class="fab fa-instagram"></i></a></li>

                                                <li class="wp"><a href="#"> <i class="fab fa-whatsapp"></i></a></li>
                
                                            </ul>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
            </div>
        </section>
    <!-- end contentpage -->
@endsection