@extends('admin.partials.master')
@section('style')

    <style>
       .hide{
           display: none;
       }
       #map-canvas {
           width: 100%;
           height: 250px;
       }
    </style>
@endsection
@section('content')
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- stats -->
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">


            <div class="row match-height">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-icons">
                              تعديل تصنيف
                            </h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">


                                <form class="form" action="{{url("restaurant/{$restaurant->id}")}}" method="POST"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                @if (session('error'))
                                        <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <div class="alert alert-danger" style="text-align: center;">
                                                    {!! session('error') !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="row">
                                            <div class="form-group col-md-12 " style="text-align: center;">

                                                <div class="alert alert-success">
                                                    {!! session('success') !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">اسم التصنيف</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="timesheetinput1" class="form-control"
                                                               placeholder="اسم التصنيف" name="name" required value="{{$restaurant->name}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-android-restaurant"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> ترتيب العرض</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text"  class="form-control"
                                                               name="sortnumber" value="{{$restaurant->sort_number}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-list-numbered"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>صورة التصنيف</label>

                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="img" class="img hide" name="logo"  >
                                                        <button id="close" class="btn-link hide" type="button" >إلغء</button>
                                                        <button id="change" class="btn-link" type="button">تعديل</button>

                                                        <span class="file-custom"></span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <img id="blah" src="{{asset("images/{$restaurant->logo}")}}" oldData="{{asset("images/{$restaurant->logo}")}}" style="max-width: 180px; margin-top: 15px"
                                                             alt=""/>
                                                    </div>
                                                </div>
                                            </div>
											
										</div>
										
										
                                   


                                    </div>

                                    <div class="form-actions center">
                                         <button type="submit" class="btn btn-primary save">
                                            <i class="icon-check2"></i> تعديل
                                        </button>
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> إلغاء
                                        </button>
                                       
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- // Basic form layout section end -->

    </div>
@endsection
@section('script')
    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/restaurant')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

    <script>
        $('#img').change(function () {
            var input = document.getElementById('img');
            $('#img').removeClass('hide');

            // $(this).closest("div").find('.help-block').html('');
            // $('div').removeClass('has-error');
            // $(this).closest("div").removeClass('has-error');

            var size = Math.round(input.files[0].size / 1024);
            if (size > 2048) {
                // $(this).closest("div").find('.help-block').html('<strong>حجم الصورة يجب ألا يتجاوز 2048KB</strong>');
                // $(this).closest("div").addClass('has-error');
                $(this).focus();
                $(this).val('');
                $('#blah').attr('src', '');


            } else {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });

    </script>
    <script>
        $('#change').click(function () {
            $('#img').removeClass('hide');
            $('#close').removeClass('hide');;
            $('#change').addClass('hide');
            $('#blah').addClass('hide');


        })
        $('#close').click(function () {

            $('#img').addClass('hide');
            $('#close').addClass('hide');
            $('#change').removeClass('hide');
            $('#blah').removeClass('hide');
            var img=$('#blah').attr('oldData');
            $('#blah').attr('src',img);
            $('#img').val(null);

        })
    </script>
    
@endsection