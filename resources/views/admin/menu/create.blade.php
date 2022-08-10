@extends('admin.partials.master')
@section('style')
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>--}}

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
                                إضافة تصنيف جديد
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
<form class="form-horizontal" role="form" id="myForm" action="{{url('control/category')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        
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
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-th-list"></i></div>
                                    <input type="text" id="input1-group1" name="name_ar" placeholder="التصنيف بالعربي" class="form-control" required>
                                </div>
                            </div>
                        </div> 
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-th-list"></i></div>
                                    <input type="text" id="input1-group2" name="name_en" placeholder="English Menu..." class="form-control" required>
                                </div>
                            </div>
                        </div>  
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" id="input1-group2" name="sort" placeholder="الترتيب (1,2,3)..." class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-6">
                            
                                                                    <div class="col-12 col-md-6" style="float:right;"><input placeholder="صورة الوجبة" type="file" id="img" name="image" class="form-control-file"></div>
                                                                    <div class="col-md-3" style="float:right;">
                                                        <img id="blah" style="max-width: 180px; margin-top: 15px"
                                                             alt=""/>
                                                    </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-dot-circle-o"></i> حفظ
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> إلغاء
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
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>--}}

    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/menu/create')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>
    <script>
        $('#img').change(function () {
            var input = document.getElementById('img');
            $(this).closest("div").find('.help-block').html('');
            $('div').removeClass('has-error');
            $(this).closest("div").removeClass('has-error');

            var size = Math.round(input.files[0].size / 1024);
            if (size > 2048) {
                $(this).closest("div").find('.help-block').html('<strong> The image size should not exceed 2048 KB</strong>');
                $(this).closest("div").addClass('has-error');
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
@endsection