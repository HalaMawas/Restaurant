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
                            <h4 class="card-title" id="basic-layout-icons">إضافة طاولة جديدة</h4>
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
<form class="form-horizontal" role="form" id="myForm" action="{{url('control/table')}}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" id="input1-group1" name="name" placeholder="رقم الطاولة " class="form-control" required>
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
        var APP_URL = {!! json_encode(url('control/table/create')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>
    
@endsection