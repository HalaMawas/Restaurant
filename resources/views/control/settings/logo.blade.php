@extends('control.master')
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
                               شعار الشركة
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


                                <form class="form" action="{{url('logo')}}" method="POST"
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
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label for="projectinput1">شعار الشركة </label>
                                            <input type="file" id="img" name="logo" class="req">
                            <span class="help-block" >

                                </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                <img id="blah" src="{{asset("{$logo->value}")}}" style="max-width: 180px; margin-top: 15px" alt="" />
                            </div>
                                        </div>
                                    </div>
                                </div>
										 
                                    </div>
                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
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
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>--}}

    {{--/* for active sidebar*/--}}
   <script  src="{{asset('scripts/submit.js')}}"></script>
    <script>
        $('#img').change(function() {
            var input=document.getElementById('img');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
 <script>
    var APP_URL = {!! json_encode(url('/logo')) !!}
    $('[href="' + APP_URL + '"]').parent().addClass('active');
  </script>

@endsection