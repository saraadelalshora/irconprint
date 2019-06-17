@extends('dashboard.layout.master')
@section('content')
    <!--  // 'title', 'image', 'intro', 'link', 'slug', 'lang_id', -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('/admin/'.$langauge['alies'])}}">{{trans('trans.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{asset('/admin/'.$langauge['alies'].'/roles')}}">{{trans('trans.Role')}}</a></li>
                <li class="breadcrumb-item active">{{trans('trans.show')}}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('trans.show')}} {{trans('trans.Role')}}</h4>
                    <div class="box-header">
                        <a href="{{url('admin/'.$langauge['alies'].'/role/create')}}"><button type="button" class="btn btn-primary">{{trans('trans.Create')}} {{trans('trans.New')}}</button></a><br><br>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table  table-hover table-striped dataTable no-footer " role="grid" aria-describedby="myTable_info">
                            {{--  <thead>
                              <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 174px;">#</th>
                                  <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 122px;"> Name</th>
                                  <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 122px;"> Status</th>
                                  <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 122px;"> Action</th>
                              </tr>
                              </thead>--}}
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 174px;">{{trans('trans.Name')}}</th>
                                <td>{{$roles->name}}</td>
                            </tr>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 174px;">{{trans('trans.Display')}} {{trans('trans.Name')}} </th>
                                <td>{{$roles->display_name}}</td>
                            </tr>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 174px;">{{trans('trans.Description')}}</th>
                                <td>{{$roles->description}}</td>
                            </tr>

                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 174px;">{{trans('trans.Permission')}}</th>
                                <td>@foreach($permissionrole as $permissionroles) ({{$permissionroles['name']}}), @endforeach</td>
                            </tr>

                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection