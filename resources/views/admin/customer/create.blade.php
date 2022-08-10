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
                                إضافة زبون جديد
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


                                <form id="basic_form" class="form" action="{{url('customer')}}" method="POST"
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
                                                    <label for="timesheetinput2">البريد الالكتروني</label>
                                                    <div class="position-relative ">
                                                        <input id="email" type="email" placeholder="example@example.com"
                                                               class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >

                                                    </div>
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

                                                <div class="form-group">
                                                    <label for="timesheetinput2">كلمة السر</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input id="password" type="password" class="form-control " name="password"  required >
                                                        <div class="form-control-position">
                                                            <i class="icon-key2"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="timesheetinput2">تأكيد كلمة السر</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control"
                                                               required>
                                                        <span id='message'></span>
                                                        <div class="form-control-position">
                                                            <i class="icon-key2"></i>
                                                        </div>
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
        var APP_URL = {!! json_encode(url('/customer/create')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

    <script type="text/javascript">
        function Validate() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;
            if (password != confirmPassword) {
                document.getElementById('message').focus;
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'password does not matching';

                // alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>



@endsection