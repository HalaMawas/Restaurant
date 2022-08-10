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
                                Edit delivery cost
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


                                <form class="form" action="{{url('cost')}}" method="POST"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{ method_field('POST') }}

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

                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="name_sv">المسافة الأولى</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-cash"></i></span>
                                                        <input type="text" value="{{$distance->value}}" class="form-control" placeholder="البعد عن مركز التوصيل  مقدراً بالكيلو متر" name="distance" required>
                                                        <span class="input-group-addon">KM</span>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="name_sv">تكلفة التوصيل للمسافة الاولى</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-cash"></i></span>
                                                        <input type="text" value="{{$cost->value}}" class="form-control" placeholder="تكلفة التوصيل للمسافة الاولى" name="cost" required>
                                                        <span class="input-group-addon">ل.س</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										   <div class="row">

                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="name_sv">المسافة الثانية</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-cash"></i></span>
                                                        <input type="text" value="{{$extra_distance->value}}" class="form-control" placeholder="البعد عن مركز التوصيل  مقدراً بالكيلو متر" name="extra_distance" required>
                                                        <span class="input-group-addon">KM</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="name_sv">تكلفة التوصيل للمسافة الثانية</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-cash"></i></span>
                                                        <input type="text" value="{{$extraCost->value}}" class="form-control" placeholder="كلفة التوصيل للمسافة الثانية" name="extraCost" required>
                                                        <span class="input-group-addon">ل.س</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions center">
                                         <button type="submit" class="btn btn-primary">
                                            <i class="icon-check2"></i> حفظ
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
        var APP_URL = {!! json_encode(url('/cost')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

@endsection