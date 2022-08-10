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
                                Edit Customer Account
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


                                <form id="basic_form" class="form" action='{{url("customer/{$customer->id}")}}' method="POST"
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
                                                    <label for="timesheetinput1">First Name</label>
                                                    <div class="position-relative ">

                                                    <input type="text"  class="form-control"
                                                            value="{{$customer->first_name}}"   placeholder="first name" name="first_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Last Name</label>
                                                    <div class="position-relative ">
                                                        <input type="text" class="form-control"
                                                               value="{{$customer->last_name}}"      placeholder="last name" name="last_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="timesheetinput2">email</label>
                                                    <div class="position-relative ">
                                                        <input id="email" type="email" placeholder="example@example.com"
                                                               value="{{$customer->email}}"     class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="timesheetinput2">Phone</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="timesheetinput2" class="form-control"
                                                               value="{{$customer->phone}}"      placeholder="customer phone" name="phone" required>
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
                                                    <label for="timesheetinput2">password</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input id="password" type="password" disabled value="{{$customer->password}}"  class="form-control " name="password"  required >
                                                        <div class="form-control-position">
                                                            <i class="icon-key2"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="timesheetinput2">confirm password</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="password" name="confirmpassword" disabled  value="{{$customer->password}}"   id="confirmpassword" class="form-control"
                                                                required>
                                                        <div class="form-control-position">
                                                            <i class="icon-key2"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="row">--}}

                                            {{--<div class="col-md-6">--}}

                                                {{--<div class="form-group">--}}
                                                    {{--<label for="timesheetinput2">Account</label>--}}
                                                    {{--<div class="position-relative ">--}}
                                                        {{--<input  type="text" class="form-control " name="account"  >--}}

                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}






                                    </div>

                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary" >
                                            <i class="icon-check2"></i> Save
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
    <script>
        $('#confirmpassword').keypress(function() {
            var dInput = this.value;
            console.log(dInput);
            if(dInput!= $('#password').val()){
                $('.btn-primary').disabled();
            }
        });
    </script>



@endsection