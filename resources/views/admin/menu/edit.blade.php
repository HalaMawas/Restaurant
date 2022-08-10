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


                                <form class="form" action="{{url('category')}}" method="POST"
                                      enctype="multipart/form-data">
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
                                    <div class="form-body">
                                             
                                        <div class="row">
                                            <div class="col-md-6" style="margin-right: 25%;margin-left: 25%;">
                                                <div class="form-group">
                                                    <label for="name_ar">التصنيف</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="name_ar" class="form-control"
                                                               placeholder="التصنيف" name="name_ar" required>
                                                        <div class="form-control-position">
                                                            <i class="icon-android-clipboard"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-right: 25%;margin-left: 25%;">
                                                <div class="form-group">
                                                    <label for="name_sv">English of Menu Type Name</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="name_en" class="form-control"
                                                               placeholder="English name" name="name_en" required value="{{$menu->sort}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-android-clipboard"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6" style="margin-right: 25%;margin-left: 25%;">

                                                <div class="form-group">
                                                    <label for="name_sv">ترتيب العرض</label>
                                                    <div class="position-relative has-icon-left">
                                                         <input type="number" id="input1-group2" name="sort" placeholder="الترتيب (1,2,3)..." class="form-control" required value="{{$menu->sort}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-android-clipboard"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions center">
                                            <button type="submit" class="btn btn-primary">
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
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>--}}

    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/menu/create')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

@endsection