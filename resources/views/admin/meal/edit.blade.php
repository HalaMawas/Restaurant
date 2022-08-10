@extends('admin.partials.master')
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
    <style>
        .hide{
            display: none;
        }
        </style>
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
                                تعديل سلعة
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


                                <form class="form" action='{{url("meal/{$meal->id}")}}' method="POST"
                                      enctype="multipart/form-data">
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

                                        <div class="row">
                                      
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label for="menu">التصنيف</label>
                                                    <select  name="menu" id="menu"
                                                             class="form-control js-example-basic-single" required>
                                                        <option value="" selected="" disabled="">اختر التصنيف
                                                        </option>
                                                        @foreach($menus as $menu)
                                                            <option @if($menu->id==$meal->menu_id) selected @endif value="{{$menu->id}}">{{$menu->name_en}}</option>

                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ترتيب العرض</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text"  class="form-control"
                                                               name="sortnumber" value="{{$meal->sort_number}}" >
                                                        <div class="form-control-position">
                                                            <i class="icon-bar-graph"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">الاسم</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text"  class="form-control"
                                                               placeholder="اسم السلعة" name="name_en" required value="{{$meal->name_en}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-food"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">نوع الكمية</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text"  class="form-control"
                                                               placeholder="كيلو , 100 غ , باقة , علبة ....." name="qnt_type" required value="{{$meal->qnt_type}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-food"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
  
                                        </div>
                                        <div class="row">
<div class="col-md-6">
                                                <div class="form-group">
                                                    <label>السعر</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">ل.س</span>
                                                        <input type="text" class="form-control" placeholder="سعر السلعة" name="price" required value="{{$meal->price}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput7">وصف السلعة</label>
                                                    <div class="position-relative has-icon-left">
                                                        <textarea id="timesheetinput7" rows="5" class="form-control"
                                                                  name="description_en" placeholder="إضافة شرح او وصف للسلعة""
                                                                  >{{$meal->description_en}}</textarea>
                                                        <div class="form-control-position">
                                                            <i class="icon-tag"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>حسم</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">ل.س</span>
                                                        <input type="text" class="form-control" placeholder="سعر السلعة" name="price" required value="{{$meal->price}}">
                                                    </div>
                                                </div>
                                        </div>
                                        <div calss="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>الصورة</label>

                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="img" class="img hide" name="logo"  >
                                                        <button id="close" class="btn-link hide" type="button" >إلغاء</button>
                                                        <button id="change" class="btn-link" type="button">تعديل</button>

                                                        <span class="file-custom"></span>
                                                    </label>
                                                    <div class="col-md-12">
                                                        <img id="blah" src="{{asset("imageMeals/{$meal->image}")}}" oldData="{{asset("imageMeals/{$meal->image}")}}" style="max-width: 180px; margin-top: 15px"
                                                             alt=""/>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        @if(isset($meal->meal_option))
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="button" id="plus" class="btn btn-info">إضافات<span
                                                                class="icon-plus2" style="margin-right:20px"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                            @foreach($meal->meal_option as $mel)
                                            <div class="row col-md-12 extraOption">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>الاسم</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text"  class="form-control" name="name[]" value="{{$mel->name}}" required>
                                                            <div class="form-control-position">
                                                                <i class="icon-list-numbered"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>السعر الاضافي</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text"  class="form-control" name="price_extra[]" value="{{$mel->price}}" required>
                                                            <div class="form-control-position">
                                                                <i class="icon-list-numbered"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-md-1" style="margin-top:25px; margin-left:8.33333333%">
                                                        <button type="button" id="remove" class="btn btn-danger"><span class="icon-cross2"></span>
                                                        </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> إلغاء
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-check2"></i> تعديل
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
    <div class="row" id="couponRow" hidden>
        <div class="row col-md-12 extraOption">
            <div class="col-md-5">
                <div class="form-group">
                    <label>الاسم</label>
                    <div class="position-relative has-icon-left">
                        <input type="text"  class="form-control"name="name[]" required>
                        <div class="form-control-position">
                            <i class="icon-list-numbered"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>السعر الاضافي</label>
                    <div class="position-relative has-icon-left">
                        <input type="text"  class="form-control" name="price_extra[]" required>
                        <div class="form-control-position">
                            <i class="icon-list-numbered"></i>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-md-1" style="margin-top:25px; margin-left:8.33333333%">
                    <button type="button" id="remove" class="btn btn-danger"><span class="icon-cross2"></span>
                    </button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/meal/create')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>
    <script>
        $('#restaurant').on('change',function(){
            var _this = $(this);
            var data = "id="+_this.val();
            console.log(data);
            var url = _this.closest('.form-group').data('route');


            $.post(url , data , function(res){
                console.log(res);
                $menu=[];

                // $menu.push('<option value="none" selected="" disabled="">select Menu Type</option>');

                for(var i=0 ;i<res.length;i++){
                    $menu.push('<option value="'+res[i]['id']+'">'+ res[i]['name_en']+' / '+res[i]['name_sv']+'</option>');
                }

                $('#menu').empty();
                $('#menu').append($menu);

            });

        });

    </script>
    <script>
        $('#img').change(function () {
            var input = document.getElementById('img');
            $('#img').removeClass('hide');

            // $(this).closest("div").find('.help-block').html('');
            // $('div').removeClass('has-error');
            // $(this).closest("div").removeClass('has-error');

            var size = Math.round(input.files[0].size / 1024);
            if (size > 2048) {
                // $(this).closest("div").find('.help-block').html('<strong>حجم الصورة يجب ألا يتجاوز 2048KB</strong>');
                // $(this).closest("div").addClass('has-error');
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
        $('#close').click(function () {

            $('#img').addClass('hide');
            $('#close').addClass('hide');
            $('#change').removeClass('hide');
            $('#blah').removeClass('hide');
            var img=$('#blah').attr('oldData');
            $('#blah').attr('src',img);
            $('#img').val(null);

        }) ;
        $(document).on('click', '#plus', function () {
            console.log($('form .extraOption').length);
            if($('form .extraOption').length<12)
            $('.form-body').append($('#couponRow').clone().html());
            else
                  new PNotify({
                    title: "Wrong!",
                    text:  'You can not add more than 12 options',
                    type: 'error',
                    hideAfter:4000,
                    styling: 'bootstrap3'
                });
          
        });
        $(document).on('click', '#remove', function () {
            $(this).closest('.row').remove();
        });
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.js-example-basic-single').select2({dir: "rtl"});
        });
    </script>

@endsection