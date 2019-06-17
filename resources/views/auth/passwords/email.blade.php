@extends('layouts.front.master')

@section('content')

 <!-- start top page -->
 <section class="top-page">
        <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">الرئيسية</a></li>
                    <li class="active">اعادة تعين كلمة السر </li>
                </ol>
        </div>
    </section>
    <!-- end top page -->
     <!-- start contentpage -->
     <section class="content-page p-80">
        <div class="container">
           <div class="row row justify-content">
               <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="box_account">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    اعادة تعين كلمة السر
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- /form_container -->
                        </div>
               </div>
              
           </div>

        </div>
    </section>
<!-- end contentpage -->

@endsection
