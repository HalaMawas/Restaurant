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
                                إضافة حسم جديد
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


                                <form class="form" action="{{url('discount')}}" method="POST"
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="issueinput3">من تاريخ</label>
                                                        <input type="date" value="{{$discount->start}}" id="issueinput3" class="form-control" name="start" data-toggle="tooltip" data-trigger="hover" data-placement="top" required data-title="From Date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="issueinput4">حتى تاريخ</label>
                                                        <input type="date" id="issueinput4" value="{{$discount->end}}" class="form-control" name="end" data-toggle="tooltip" data-trigger="hover" required data-placement="top" data-title="To Date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                            <label>نوع الحسم </label>
                                            <div class="input-group">
                                              
                                                <label class="display-inline-block custom-control custom-radio">
                                                    <input type="radio" name="type" value="fixed"  class="custom-control-input" @if($discount->type=='fixed') checked @endif>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description ml-0"> مبلغ ثابت </span>
                                                </label>
                                                  <label class="display-inline-block custom-control custom-radio ml-1">
                                                    <input type="radio" name="type" value="percent" class="custom-control-input" @if($discount->type=='percent') checked @endif>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description ml-0"> نسبة  </span>
                                                </label>
                                            </div>
                                        </div>
                                        </div>
                                            </div>
                                               <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label>مقدار الحسم</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-percent"></i></span>
                                                        <input type="text" class="form-control" placeholder="" name="value" value="{{$discount->value}}" required>
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
        var APP_URL = {!! json_encode(url('/discount/create')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

@endsection