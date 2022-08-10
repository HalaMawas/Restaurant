@extends('admin.partials.master')
@section('style')
 <link rel="stylesheet" type="text/css" href="{{asset('plugins/assets/select2/css/select2.min.css')}}"/>

@endsection
@section('content')




        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-card-center">إضافة Slide جديد</h4>
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
                    <div class="card-body collapse in " style="    min-height: 400px;">
                        <div class="card-block">

                            <form action="{{url('app-Slide')}}" method="POST" class="form col-md-6" style="margin: 0 25%;" enctype="multipart/form-data">
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
                                    
                                   
                                  
                                    <div class="form-group">
                                        <label for="eventRegInput3">الصورة </label>
                                        <input type="file" id="eventRegInput3" class="form-control" placeholder="" name="image" required>
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
    @endsection
    @section('script')

<script type="text/javascript" src="{{asset('plugins/assets/select2/js/select2.min.js')}}"></script>

    {{--/* for active sidebar*/--}}
    <script>

        var APP_URL = {!! json_encode(url('/app-Slide/create')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');

       
    </script>
    @endsection