<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('/')); ?>//assets/images/favicon.png">
    <title>3Hand</title>
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/wizard/steps.css" rel="stylesheet">
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
    <!-- This page CSS -->
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />

    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
     <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('/')); ?>/assets/dist/css/style.min.css" rel="stylesheet">
   <!-- ads page link -->
   
   <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/summernote/dist/summernote.css" rel="stylesheet" />
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
   
    <!-- Dashboard 1 Page CSS -->
    <link href="<?php echo e(asset('/')); ?>/assets/dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="<?php echo e(asset('/')); ?>/assets/dist/css/pages/bootstrap-switch.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="<?php echo e(url('/')); ?>/assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<style>
    .preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow:auto;
}
.preview-images-zone > .preview-image {
    height: 160px;
    width: 23.5%;
    position: relative;
    margin-right: 12px;
    float: left;
    margin-bottom: 12px;
}
.preview-images-zone > .preview-image > .image-zone {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .image-zone > img {
    width: 100%;
    height: 100%;
    object-fit: cover
}
.preview-images-zone > .preview-image > .tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}
.preview-images-zone > .preview-image > .image-cancel {
    font-size: 18px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 100;
}
.preview-image:hover > .image-zone {
    cursor: move;
    opacity: .5;
}
.preview-image:hover > .tools-edit-image,
.preview-image:hover > .image-cancel {
    display: block;
}
.ui-sortable-helper {
    width: 90px !important;
    height: 90px !important;
}
/* Radio buttons */

.container_radio {
    /* display: block; */
    position: relative;
    font-size: 15px;
    font-size: 0.9375rem;
    padding-right: 30px;
    line-height: 1.3;
    margin-bottom: 10px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin-left: 30px;

}

.container_radio input {
    position: absolute;
    opacity: 0;
}

.container_radio input:checked~.checkmark:after {
    background:#e46a76 
}
.container_radio input:checked~.checkmark{
    border: 3px solid #e46a76;

}
.container_radio .checkmark {
    position: absolute;
    top: 0;
    right: 0;
    height: 20px;
    width: 20px;
    border: 3px solid #ccc;
    border-radius: 50%;
}

.container_radio .checkmark:after {
    display: block;
    content: "";
    position: absolute;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    top: 3px;
    left: 3px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #ccc ;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
</style>
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">3Hand</p>
        </div>
    </div>

     <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="<?php echo e(asset('/')); ?>//assets/images/logoarr-2.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="<?php echo e(asset('/')); ?>//assets/images/logoarr-2.png" class="light-logo" alt="homepage" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                                href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="ادخل كلمة البحث">
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                  
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img src="<?php echo e(asset('/')); ?>//assets/images/users/1.jpg" alt="user"
                                    class=""> <span class="hidden-md-down">الادمن &nbsp;<i class="fa fa-angle-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            
                               <a href="<?php echo e(url('/')); ?>" class="dropdown-item"><i class="icon-screen-desktop"></i> الموقع</a>
                                 <!-- text-->
                                 <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?php echo e(route('User.show',Auth::user()->id)); ?>" class="dropdown-item"><i class="ti-user"></i> حسابي</a>
                                 <!-- text-->
                                 <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> الاشعارات</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?php echo e(route('User.edit',Auth::user()->id)); ?>" class="dropdown-item"><i class="ti-settings"></i> ضبط الحساب</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off"></i>
                                        تسجيل خروج
                                </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                            
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i
                                    class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><img src="<?php echo e(asset('/')); ?>//assets/images/users/1.jpg" alt="user-img" class="img-circle"><span
                                    class="hide-menu">مدير الموقع</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <!-- <li><a href="javascript:void(0)"><i class="ti-user"></i> الصفحة الشخصية</a></li> -->
                                <li>
                                <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off"></i>
                                        تسجيل خروج
                                </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                </li>
                                <li>
                                <a href="<?php echo e(url('/')); ?>" class="dropdown-item">
                                       <i class="icon-screen-desktop"></i>
                                       الموقع
                                </a>
                                     
                                </li>
                            </ul>
                        </li>
                        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                        <li class="nav-small-cap">--- لوحة التحكم</li>
                        <li> <a href="<?php echo e(route('admin')); ?>"><i class="icon-speedometer"></i><span class="hide-menu">الرئيسية
                                </span></a></li>
                        <li> <a class=" has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                    class="ti-user"></i><span class="hide-menu">الاعضاء</span></a>
                                    <ul aria-expanded="false" class="collapse">
                              
                                <li><a href="<?php echo e(route('User.index')); ?>">الادمن</a></li>
                               
                            </ul> 
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                    class="ti-layout-grid2"></i><span class="hide-menu">المنتجات</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(url('admin/product/Category')); ?>">الأقسام الرئيسية</a></li>
                                <li><a href="<?php echo e(url('admin/product/SubCategory')); ?>">الأقسام الفرعية</a></li>
                                <li><a href="<?php echo e(url('admin/product/SubtwoCategory')); ?>">  الاقسام الفرعية  للاقسام الفرعية</a></li>
                                <li><a href="<?php echo e(route('Manufactor.index')); ?>">المصنعين</a></li>
                                <li><a href="<?php echo e(route('Product.index')); ?>">المنتجات</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                    class="fa fa-file-video-o"></i><span class="hide-menu">الفيديو</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(url('admin/video/Category')); ?>">الأقسام الرئيسية</a></li>
                                <li><a href="<?php echo e(url('admin/video/SubCategory')); ?>">الأقسام الفرعية</a></li>
                                <li><a href="<?php echo e(url('admin/video/SubtwoCategory')); ?>">  الاقسام الفرعية  للاقسام الفرعية</a></li>
                                <li><a href="<?php echo e(route('Video.index')); ?>">الفيديو</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                    class="ti-write"></i><span class="hide-menu">التدريبات</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(url('admin/training/Category')); ?>">الأقسام الرئيسية</a></li>
                                <li><a href="<?php echo e(url('admin/training/SubCategory')); ?>">الأقسام الفرعية</a></li>
                                <li><a href="<?php echo e(url('admin/training/SubtwoCategory')); ?>">  الاقسام الفرعية  للاقسام الفرعية</a></li>
                                <li><a href="<?php echo e(route('training.index')); ?>">التدريبات</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                    class="ti-world"></i><span class="hide-menu">الأخبار</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('CategoriesNews.index')); ?>">أقسام الأخبار</a></li>
                                <li><a href="<?php echo e(route('News.index')); ?>">الأخبار</a></li>
                            </ul>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="<?php echo e(route('Service.index')); ?>" aria-expanded="false"><i
                                    class="ti-shopping-cart"></i><span class="hide-menu">الخدمات</span></a></li>
                                    <li> <a class=" waves-effect waves-dark" href="<?php echo e(route('Project.index')); ?>" aria-expanded="false"><i
                                    class="ti-shopping-cart"></i><span class="hide-menu">المشاريع</span></a></li>

                        <li> <a class=" waves-effect waves-dark" href="<?php echo e(route('Page.index')); ?>" aria-expanded="false"><i
                                    class="ti-user"></i><span class="hide-menu">الصفحات</span></a></li>
                                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                    class="ti-direction-alt"></i><span class="hide-menu">من نحن</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('About.index')); ?>">من نحن </a></li>
                                <li><a href="<?php echo e(route('Section.index')); ?>">اقسام من نحن </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                    class="ti-settings"></i><span class="hide-menu">الضبط</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('Slider.index')); ?>">معرض الصور</a></li>
                                <li><a href="<?php echo e(route('setting.index')); ?>">الإعدادات الرئيسية</a></li>
                                <li><a href="<?php echo e(route('socialmedia')); ?>">اعدادات السوشيال ميديا</a></li>

                            </ul>
                        </li>
                     
                    </ul>
                </nav>
                <!-- End Sidebar navigation  -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <?php echo $__env->make('flash-massege', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>               

                <?php echo $__env->yieldContent('content'); ?>

             
                 <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                        </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © جميع الحقوق محفوظة لشركة <a href="https://www.3hand.net/">ثري هاند</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/jqueryui/jquery-ui.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('/')); ?>/assets/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('/')); ?>/assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('/')); ?>/assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <!-- <script src="<?php echo e(asset('/')); ?>/assets/dist/js/custom.min.js"></script> -->
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/dist/js/custom.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/dist/js/pages/validation.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-table/dist/bootstrap-table.ints.js"></script>
    <!-- Popup message jquery -->
    <!-- Chart JS -->
    <script src="<?php echo e(asset('/')); ?>/assets/dist/js/dashboard1.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('/')); ?>/assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
     <!-- bt-switch -->
     <!-- <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-switch/bootstrap-switch.min.js"></script> -->
         <!-- This is data table -->
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/moment/min/moment.min.js"></script>
  <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/wizard/jquery.steps.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/wizard/jquery.validate.min.js"></script>
     <!-- Sweet-Alert  -->
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/wizard/steps.js"></script>
  <!--Wave Effects -->

    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="<?php echo e(asset('/')); ?>/assets/node_modules/summernote/dist/summernote.min.js"></script>
  

<script type="text/javascript">
    
 jQuery(document).ready(function() {
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        $('#myTable').DataTable();
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
       
      
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
  
   //datatable
    });
   $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
  
    });
  
   
    </script>
       <script>
    jQuery(document).ready(function () {

            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });

            $('.inline-editor').summernote({
                airMode: true
            });

        });

        window.edit = function () {
                $(".click2edit").summernote()
            },
            window.save = function () {
                $(".click2edit").summernote('destroy');
            }
     $('#fdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false ,minDate : new Date()});
    $('#tdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false,minDate : new Date() });
    </script>
<?php echo $__env->yieldContent('js'); ?>
</body>

</html>