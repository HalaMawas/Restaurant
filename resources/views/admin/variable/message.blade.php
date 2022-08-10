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
                               ارسال اشعار للزبائن
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


                                <form class="form" action="{{url('messages')}}" method="POST"
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
                                            <h4 class="form-section"><i class="icon-clipboard4"></i> تم  تسجيل الطلب</h4>
                                          <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="car_number">العنوان</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="title" class="form-control"
                                                               placeholder="" name="waiting" value="{{$title_waiting->value}}" required>
                                                        <div class="form-control-position">
                                                            <i class="icon-android-notifications"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="car_number">نص الاشعر</label>
                                                    <div class="position-relative has-icon-left">
                                                        <textarea type="text" id="car_number" class="form-control"
                                                               placeholder="" name="message_waiting" >{{$message_waiting->value}}</textarea>
                                                        <div class="form-control-position">
                                                            <i class="icon-android-notifications"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                             <div class="col-md-6">
                                            <h4 class="form-section"><i class="icon-clipboard4"></i>  رفض الطلبية</h4>
                                          <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="car_number">العنوان</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="title" class="form-control"
                                                               placeholder="Notification title" name="refused" required value="{{$title_refused->value}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-android-notifications"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="car_number">نص الاشعر</label>
                                                    <div class="position-relative has-icon-left">
                                                        <textarea type="text" id="car_number" class="form-control"
                                                               placeholder="" name="message" >{{$message_refused->value}}</textarea>
                                                        <div class="form-control-position">
                                                            <i class="icon-android-notifications"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
										<div class="row">
                                               <div class="col-md-6">
                                            <h4 class="form-section"><i class="icon-clipboard4"></i>  الموافقة على الطلبية</h4>
                                          <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="car_number">العنوان</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="title" class="form-control"
                                                               placeholder="" name="accepted" value="{{$title_accepted->value}}" required>
                                                        <div class="form-control-position">
                                                            <i class="icon-android-notifications"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="car_number">نص الاشعر</label>
                                                    <div class="position-relative has-icon-left">
                                                        <textarea type="text" id="car_number" class="form-control"
                                                               placeholder="" name="message_accepted" >{{$message_accepted->value}}</textarea>
                                                        <div class="form-control-position">
                                                            <i class="icon-android-notifications"></i>
                                                        </div>
                                                    </div>
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
 

    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/send-client-notification')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

@endsection