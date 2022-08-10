@extends('admin.partials.master')
@section('style')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>

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
                                إضافة عرض  جديد
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


                                <form class="form" action="{{url('offer')}}" method="POST"
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
                                        <div class="row" >
                                            <div class="col-md-6" style="margin-right: 25%;margin-left: 25%;">
                                                <div class="form-group">
                                                    <label for="projectinput5">السلعة</label>
                                                    <select id="projectinput5" name="meal"
                                                            class="form-control js-example-basic-single" required>
<option value="" selected >يرجى اختيار سلعة </option>
                                                        @foreach($meals as $meal)
                                                            <option value="{{$meal->id}}"  >{{$meal->name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-right: 25%;margin-left: 25%;">
                                                <div class="form-group">
                                                    <label for="price">سعر العرض</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="number" id="price" class="form-control"
                                                               placeholder="سعر العرض" name="price" required>
                                                        <div class="form-control-position">
                                                            <i class="icon-cash"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-right: 25%;margin-left: 25%;">
                                               
                                                    <div class="form-group">
                                            <label for="issueinput3">العرض حتى تاريخ</label>
                                            <input type="date" id="issueinput3" class="form-control" name="to_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="تاريخ العرض">
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-actions col-md-6" style="margin-right: 25%;margin-left: 25%;">
                                            <button type="submit" class="btn btn-primary">
                                            <i class="icon-check2"></i> حفظ
                                        </button>
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> إلغاء
                                        </button>
                                    
                                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/offer')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>
 <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.js-example-basic-single').select2({dir: "rtl"});
        });
    </script>
@endsection