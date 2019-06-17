@extends('layouts.master')

@section('content')
    <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">لوحة التحكم</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">لوحة التحكم</li>
                            </ol>

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted"> اجمالي المنتجات</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary">{{$products}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-note"></i></h3>
                                            <p class="text-muted">إجمالى الفيديوهات</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan">{{$videos}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-doc"></i></h3>
                                            <p class="text-muted">عدد التدريبات</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-purple">{{$training}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">اجمالى مبيعات الشهر</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success">1</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <h3>أخر الطلبات الواردة</h3>
                                    </div>
                                    <div class="col-6 align-self-center display-6 text-right">
                                        <a href="{{route('Order.index')}}"><button type="button" class="btn waves-effect waves-light btn-success">المبيعات</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>اسم المنتج</th>
                                            <th>الحالة</th>
                                            <th>التاريخ</th>
                                            <th>السعر</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @if(isset($lastorder)) 
                                    @foreach($lastorder as $last)
                                        <tr>
                                            <td class="text-center">{{++$i}}</td>
                                            <td class="txt-oflo">
                                            @if(isset($last->products))
                                            @foreach($last->products as $lastproducts)
                                            {{$lastproducts->name_ar}}/
                                            @endforeach
                                            @endif</td>
                                            <td><span class="badge badge-warning badge-pill">
                                            @if($last->status == '0')
                                            بانتظار المراجعه
                                            @elseif($last->status == '1')
                                            تم التسليم
                                            @else
                                            تم الالغاء
                                            @endif
                                            </span></td>
                                            <td class="txt-oflo">{{ \Carbon\Carbon::parse($last->order_date)->format('d M  Y')}}</td>
                                            <td><span class="text-success">${{$last->total_price}}</span></td>
                                        </tr>
                                        @endforeach
                                      @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-12">
                        <div class="row">
                            <!-- Column -->
                            <!-- Column -->
                    <div class="col-md-6 col-lg-12 col-xlg-2">
                        <div class="card">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">5963</h1>
                                <h6 class="text-white">المتواجدون الان</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                            <!-- <div class="col-lg-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">المبيعات الشهرية</h4>
                                        <div class="text-right"> <span class="text-muted">Todays Income</span>
                                            <h1 class="font-light"><sup><i class="ti-arrow-down text-danger"></i></sup>
                                                $8,000</h1>
                                        </div>
                                        <span class="text-danger">60%</span>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 60%; height: 6px;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-12 col-md-6">
                                <div class="news-slide m-b-15">
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                        <!-- Carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active carousel-item">
                                                <div class="overlaybg"><img src="{{asset('/')}}/assets/images/aaaa.jpg"
                                                        class="img-fluid" /></div>
                                                <div class="news-content carousel-caption"><span class="label label-danger label-rounded">عرض خاص</span>
                                                    <h4>عروض السوشيال ميديا من ثرى هاند.</h4>
                                                    <a href="http://3hand.net">اقرا المزيد</a>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="overlaybg"><img src="{{asset('/')}}/assets/images/aaaa.jpg" /></div>
                                                <div class="news-content carousel-caption"><span class="label label-primary label-rounded">عرض خاص</span>
                                                    <h4>عروض السوشيال ميديا من ثرى هاند</h4>
                                                    <a href="http://3hand.net">اقرا المزيد</a>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="overlaybg"><img src="{{asset('/')}}/assets/images/aaaa.jpg" /></div>
                                                <div class="news-content carousel-caption"><span class="label label-success label-rounded">عرض خاص</span>
                                                    <h4>عروض السوشيال ميديا من ثرى هاند</h4>
                                                    <a href="http://3hand.net">اقرا المزيد</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
@endsection
