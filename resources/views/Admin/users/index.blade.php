@extends('layouts.master')
@section('meta')
<title> المستخدمين</title>
@endsection
@section('content')


                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"> المستخدمين</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                        <a href="{{route('User.create')}}"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> إضافة جديد</button></a>

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                                <div class="card-header">
                                        <h4 class="card-title m-b-0">قائمة بمستخدمين  موقع</h4>
                                </div>
                            <div class="card-body">

                                <table  data-toggle="table" data-url="../assets/node_modules/bootstrap-table/bootstrap-test.json" data-click-to-select="false" data-height="">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="name">أسم المستخدم</th>
                                            <th data-field="email">البريد الالكتروني</th>
                                            <th data-field="status">الصلاحية</th>
                                            <th data-field="edit">تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody >

                                        @foreach($all_user as $user)
                                        @if($user->email != "admin@admin.com")
                                        <tr>
                                            <td data-field="state" data-checkbox="true"></td>
                                            <td data-field="name">{{$user->fname." ".$user->lname}}</td>
                                            <td data-field="status">{{$user->email}}</td>
                                            <td data-field="status">@if(isset($user->roles))@foreach($user->roles as $role) {{$role->name}} @endforeach @endif</td>
                                            <td data-field="edit">
                                            <button type="button" class="btn btn-sm btn-success btn-rounded m-l-15" ><i class="fa fa-check"></i><a href="{{route('User.edit',$user->id)}}" style="color: #ffffff;"> تعديل</a></button>
                                              <button type="button" class="btn btn-sm btn btn-info btn-rounded m-l-15" ><i class="fa fa-eye"></i><a href="{{route('User.show',$user->id)}}" style="color: #ffffff;"> عرض</a></button>
                                               @if($user->email != "admin@admin.com")
                                              <form  action="{{ route('User.destroy',$user->id) }}"  style="display: inline;"  method="POST" accept-charset="utf-8">
                                                  {{csrf_field()}}
                                                  {{method_field('DELETE')}}

                                              <button  class="btn btn-sm btn-danger btn-rounded m-l-15" type="submit" onclick="return confirm('Do You Want To delete ?')"><i class="fa fa-times"></i> حذف</button>

                                               </form>    
                                               @endif
                                            </td>
                                        </tr>
                                        @endif
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->



@endsection
