@extends('admin.partials.master')
@section('style')

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
                                إضافة موظف جديد
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


                                <form id="basic_form" class="form" action="{{url('control/employee')}}" method="POST"
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
                                                    <label for="timesheetinput1">الاسم الاول</label>
                                                    <div class="position-relative ">

                                                        <input type="text"  class="form-control"
                                                               placeholder="" name="first_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">الكنية</label>
                                                    <div class="position-relative ">
                                                        <input type="text" class="form-control"
                                                               placeholder="" name="last_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="issueinput3"> تاريخ الميلاد</label>
                                                    <input type="date" value="{{app('request')->input('from_date')}}" id="issueinput3" class="form-control" name="birthdate" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="From Date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="timesheetinput2">موبايل</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="timesheetinput2" class="form-control"
                                                               placeholder="" name="phone" required>
                                                        <div class="form-control-position">
                                                            <i class="icon-android-call"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label for="table">نوع بطاقة الهوية</label>
                                                    <select  name="typeID" id="table"
                                                             class="form-control js-example-basic-single" >
                                                        <option value="personal" selected>هوية شخصية</option>
                                                        <option value="passport" selected>جواز سفر</option>
                                                        

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="timesheetinput2">رقم البطاقة</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="timesheetinput2" class="form-control"
                                                                   placeholder="" name="numberID" required>
                                                           
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="issueinput3">تاريخ التوظيف </label>
                                                    <input type="date" value="{{app('request')->input('from_date')}}" id="issueinput3" class="form-control" name="workdate" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="From Date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="issueinput4">انتهاء الاقامة </label>
                                                    <input type="date" id="issueinput4" value="{{app('request')->input('to_date')}}" class="form-control" name="expiredID" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="To Date">
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                       
                                      





                                    </div>

                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> إلغاء
                                        </button>
                                        <button type="submit" class="btn btn-primary" onclick="return Validate()">
                                            <i class="icon-check2"></i> حفظ
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
        var APP_URL = {!! json_encode(url('control/employee/create')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

    



@endsection