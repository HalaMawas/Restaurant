@extends('admin.partials.master')
@section('style')
 <link rel="stylesheet" type="text/css" href="{{asset('plugins/assets/select2/css/select2.min.css')}}"/>

@endsection
@section('content')




    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">تعديل Slide</h4>
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

                        <form action="{{url("app-Slide/{$slide->id}")}}" method="POST" class="form col-md-6" style="margin: 0 25%;" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}

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
                                    <label>الصورة</label>

                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="img" class="img hide" name="image"  required >
                                        <button id="close" class="btn-link hide" type="button" >إلغاء</button>
                                        <button id="change" class="btn-link" type="button">تعديل</button>
                                        

                                        <span class="file-custom"></span>
                                    </label>
                                    <div class="col-md-12">
                                        <img id="blah" src="{{asset("Slide/{$slide->image}")}}" oldData="{{asset("Slide/{$slide->image}")}}" style="max-width: 180px; margin-top: 15px"
                                             alt=""/>
                                    </div>
                                </div> 
                               
                             


                                </div>

                                <div class="form-actions center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="icon-check2"></i> تعديل
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

    <script>
        $(document).ready(function () {
          $("#countryInput4").select2({
              dir: "rtl"
          });
          });
        var APP_URL = {!! json_encode(url('/app-Slide')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
           $('#img').change(function () {
            var input = document.getElementById('img');
            $('#img').removeClass('hide');

            // $(this).closest("div").find('.help-block').html('');
            // $('div').removeClass('has-error');
            // $(this).closest("div").removeClass('has-error');

            var size = Math.round(input.files[0].size / 1024);
            if (size > 2048) {
              $(this).closest("div").find('.help-block').html('<strong>حجم الصورة يجب ألا يتجاوز 2048KB</strong>');
               $(this).closest("div").addClass('has-error');
                $(this).focus();
                $(this).val('');
                $('#blah').attr('src', '');


            } else {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });

    </script>
    <script>
        $('#change').click(function () {
            $('#img').removeClass('hide');
            $('#close').removeClass('hide');;
            $('#change').addClass('hide');
            $('#blah').addClass('hide');


        })
        $('#delete').click(function () {
            $('#img1').removeClass('hide');
            $('#blah1').addClass('hide');
            $('#isicon').val('0');
        })
        $('#close').click(function () {

            $('#img').addClass('hide');
            $('#close').addClass('hide');
            $('#change').removeClass('hide');
            $('#blah').removeClass('hide');
            var img=$('#blah').attr('oldData');
            $('#blah').attr('src',img);
            $('#img').val(null);

        })
    </script>
    <script type="text/javascript">
     $('#img_en').change(function () {
            var input = document.getElementById('img_en');
            $('#img_en').removeClass('hide');

            // $(this).closest("div").find('.help-block').html('');
            // $('div').removeClass('has-error');
            // $(this).closest("div").removeClass('has-error');

            var size = Math.round(input.files[0].size / 1024);
            if (size > 2048) {
              $(this).closest("div").find('.help-block').html('<strong>حجم الصورة يجب ألا يتجاوز 2048KB</strong>');
               $(this).closest("div").addClass('has-error');
                $(this).focus();
                $(this).val('');
                $('#blah_en').attr('src', '');


            } else {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah_en').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });

    </script>
    <script>
        $('#change_en').click(function () {
            $('#img_en').removeClass('hide');
            $('#close_en').removeClass('hide');;
            $('#change_en').addClass('hide');
            $('#blah_en').addClass('hide');


        })
        $('#delete_en').click(function () {
            $('#img1_en').removeClass('hide');
            $('#blah1_en').addClass('hide');
            $('#isicon_en').val('0');
        })
        $('#close_en').click(function () {

            $('#img_en').addClass('hide');
            $('#close_en').addClass('hide');
            $('#change_en').removeClass('hide');
            $('#blah_en').removeClass('hide');
            var img=$('#blah_en').attr('oldData');
            $('#blah_en').attr('src',img);
            $('#img_en').val(null);

        })
    </script>
   
    @endsection