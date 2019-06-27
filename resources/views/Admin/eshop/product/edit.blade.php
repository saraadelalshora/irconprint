@extends('layouts.master')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><a href="{{route('eshop.index')}}"> المنتجات </a> </h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <a href="{{ route('eshop.create')}}"><button type="button"
                    class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> تعديل المنتج
                    </button></a>

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
                <h4 class="card-white m-b-0">المنتجات</h4>
            </div>
            <div class="card-body">
                <div class="col-md-12 form-group">
                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home1"
                                role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                    class="hidden-xs-down"> المنتج </span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><span
                                    class="hidden-sm-up"><i class="fa fa-link"></i></span> <span class="hidden-xs-down">
                                    روابط </span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span
                                    class="hidden-sm-up"><i class="fa fa-folder-o"></i></span> <span
                                    class="hidden-xs-down"> البيانات </span></a> </li>


                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home5" role="tab"><span
                                    class="hidden-sm-up"><i class="fa fa-file-image-o"></i></span> <span
                                    class="hidden-xs-down">الصور<span></a> </li>

                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home6" role="tab"><span
                                    class="hidden-sm-up"><i class="fa fa-tags"></i></span> <span
                                    class="hidden-xs-down">الكلمات المفتاحيه<span></a> </li>
                        <ul>
                </div>
                <div class="form-group">
                    <form class=" p-t-20" method="POST" action="{{route('eshop.update',$product->id)}}"
                        enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <div class="tab-content">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <div class="col-md-12 form-group">
                                    <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab"
                                                href="#lang_ar" role="tab"><span class="hidden-sm-up"><i
                                                        class="flag-icon flag-icon-eg"></i></span>&nbsp&nbsp عربي <span
                                                    class="hidden-xs-down"></span></a> </li>
                                        <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#lang_en"
                                                role="tab"><span class="hidden-sm-up"><i
                                                        class="flag-icon flag-icon-us"></i></span> <span
                                                    class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a> </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="lang_ar" role="tabpanel">
                                        <div class="form-group">
                                            <div>
                                                <label for="AR" class="control-label"> اسم المنتج<span
                                                        class="text-danger">*</span> </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="text" id="AR" class="form-control"
                                                            placeholder=" اسم المنتج" name="name_ar" required
                                                            data-validation-required-message="هذا الحقل مطلوب" value="{{$product->name_ar}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <label for="textarea_ar">وصف المنتج <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="description_ar"> {!!$product->description_ar!!}

                                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="lang_en" role="tabpanel">
                                        <div class="form-group">
                                            <div>
                                                <label for="AR" class="control-label"> اسم المنتج </label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <input type="" id="AR" class="form-control"
                                                            placeholder="اسم القسم" name="name_en" value="{{$product->name_en}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <label for="textarea_ar"> وصف المنتج </label>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="description_en">{!!$product->description_en!!}
                                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane" id="home3" role="tabpanel">

                                <div class="form-group">
                                    <label class="control-label">القسم الرئيسي<span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control m-b-10 select2-multiple" name="category_id"
                                        id="Category" required data-validation-required-message="هذا الحقل مطلوب">
                                        <option disabled="disabled" selected="selected">Select</option>
                                        @if(isset($categories))
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($product->category->id ==
                                            $category->id) selected @endif >{{$category->name_ar}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                              

                            </div>


                            <div class="tab-pane" id="home2" role="tabpanel">
                                <div class="form-group">
                                    <label class="control-label">المصنعيين</label>
                                    <select name="manufact_id" class=" form-control m-b-10 select2-multiple">
                                        @if(isset($manufact))
                                        @foreach($manufact as $manufactor)
                                        <option value="{{$manufactor->id}}">{{$manufactor->name_ar}}</option>
                                        @endforeach
                                        @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">الكود </label>
                                    <input type="text" class="form-control" name="code" 
                                        data-validation-required-message="هذا الحقل مطلوب" value="{{$product->code}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">الحالة </label>
                                    <select name="status" class="form-control">
                                        <option value="1" @if($product->status==1)selected @endif >تفعيل</option>
                                        <option value="0" @if($product->status==0)selected @endif >ايقاف</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">متاح </label>
                                    <select name="special" class="form-control">
                                        <option value="1" @if($product->availbale == 1)selected @endif >نعم</option>
                                        <option value="0" @if($product->availbale == 0)selected @endif >لا</option>
                                    </select>
                                </div>
                            </div>

                            <div class="tab-pane" id="home5" role="tabpanel">
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload
                                                    Image</a>
                                                <input type="file" id="pro-image" name="pro_image[]"
                                                    style="display: none;" class="form-control" multiple>
                                            </fieldset>
                                            <div class="form-group">

                                                 <div class="preview-images-zone">
                                                    @foreach($product->images as $image)
                                                    <div class="preview-image preview-show-{{$image->id}}">

                                                        <div class="image-cancel" data-no="{{$image->id}}">
                                                            <button class="deleteRecord"
                                                                data-id="{{$image->id}}">x</button>

                                                        </div>
                                                        <div class="image-zone">

                                                            <img id="pro-img-{{$image->id}}"
                                                                src="{{asset($image->img)}}" class="img-fluid">

                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div> 
                                            </div>
                                        </div>


                                        <!-- <div class="col-lg-3 col-md-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <input type="file" id="input-file-now" class="dropify" />
                                                                </div>
                                                            </div>
                                                        </div> -->

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="home6" role="tabpanel">
                                <ul class="nav nav-tabs tabcontent-border" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#lang_en"
                                            role="tab"><span class="hidden-sm-up"><i
                                                    class="flag-icon flag-icon-eg"></i></span>&nbsp&nbsp عربي <span
                                                class="hidden-xs-down"></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lang_ar_seo"
                                            role="tab"><span class="hidden-sm-up"><i
                                                    class="flag-icon flag-icon-us"></i></span> <span
                                                class="hidden-xs-down">&nbsp&nbsp انجليزي </span></a> </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="lang_en_seo" class="form-control" role="tabpanel">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <br>
                                                <br>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="flag-icon flag-icon-eg"></i></span>
                                                    <input type="text" data-role="tagsinput" name="tag_ar"
                                                      value="{{$product->tag_ar}}"    class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="lang_ar_seo" role="tabpanel">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <br>
                                                <br>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="flag-icon flag-icon-us"></i></span>
                                                    <input type="text" class="form-control" name="tag_en"
                                                        data-role="tagsinput"  value="{{$product->tag_en}}" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="text-left">
                                <div class="pull-left">
                                    <button class="btn btn-rounded btn-success"><span class="fa fa-send">
                                        </span>&nbsp&nbspحفظ</button>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('eshop.index')}}" class="btn btn-rounded btn-danger"> <span
                                            class="fa fa-sign-out"> </span> &nbsp&nbspالعوده </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
@section('js')
<script type="text/javascript">
    $('#Category').change(function () {
        $("#subcategory").empty();
        $("#filter").empty();
      
        var countryID = $(this).val();
        if (countryID) {

            $.ajax({
                type: "GET",
                url: "{{url('admin/subcategory-list')}}?category_id=" + countryID,
                success: function (res) {
                    if (res) {
                        $("#subcategory").empty();
                        $("#subcategory").append('<option>Select</option>');
                        $.each(res, function (key, value) {
                            $("#subcategory").append('<option value="' + key + '">' +
                                value + '</option>');
                        });

                    } else {
                        $("#subcategory").empty();
                    }
                }
            });
        } else {
            $("#subcategory").empty();
            $("#filter").empty();
           
        }
    });
    $('#subcategory').on('change', function () {
        $("#filter").empty();
     
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "GET",
                //    specification-list?filter_id 
                url: "{{url('admin/filter-list')}}?subcategory_id=" + stateID,
                success: function (res) {
                    if (res) {
                        $("#filter").empty();
                        $("#filter").append('<option>Select</option>');
                        $.each(res, function (key, value) {
                            $("#filter").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {
                        $("#filter").empty();

                    }
                }
            });
        } else {
            $("#filter").empty();
          ;
        }

    });
  
</script>
<script>
    $(document).ready(function () {
        document.getElementById('pro-image').addEventListener('change', readImage, false);

        $(".preview-images-zone").sortable();

        $(document).on('click', '.image-cancel', function () {
            let no = $(this).data('no');
            $(".preview-image.preview-show-" + no).remove();
        });
    });

    var num = 4;

    function readImage() {
        if (window.File && window.FileList && window.FileReader) {
            var files = event.target.files; //FileList object
            var output = $(".preview-images-zone");
            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')) continue;
                var picReader = new FileReader();
                picReader.addEventListener('load', function (event) {
                    var picFile = event.target;
                    var html = '<div class="preview-image preview-show-' + num + '">' +
                        '<div class="image-cancel" data-no="' + num + '">x</div>' +
                        '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result +
                        '" class="img-fluid"></div>' +
                        '</div>';

                    output.append(html);
                    num = num + 1;
                });
                picReader.readAsDataURL(file);
            }
            // $("#pro-image").val('');
        } else {
            console.log('Browser not support');
        }
    }

    // 
    $(".deleteRecord").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var pointid = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            type: 'DELETE',
            url: "{{url('admin/image')}}",
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: pointid,
                "_token": "{{ csrf_token() }}"
            },

            success: function (data) {
                alert('success');
            },
            error: function (data) {
                alert(data);
            }
        });


        // let pointid = $(this).attr("data-pointid");
        // $.ajax({
        //            type: 'DELETE',
        //            url: '/pointdelete',
        //            dataType: 'json',
        //            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        //            data: {id:pointid,"_token": "{{ csrf_token() }}"},

        //            success: function (data) {
        //                   alert('success');            
        //            },
        //            error: function (data) {
        //                  alert(data);
        //            }
        // });

    });
</script>
@endsection
@endsection