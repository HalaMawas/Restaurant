@extends('control.master')
@section('style')
    <style>
        input{direction: ltr}
    </style>
    @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    بيانات الصفحة الشخصية
                </header>
                <div class="panel-body">
                    <div class="form  col-md-10">
                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="{{url("control/edit_contact_info")}}">
                            {{csrf_field()}}
                            <input hidden name="_method" value="POST" >
                            <div class="form-group col-md-offset-3 hide" id="error">
                            <span class="has-block  col-md-offset-3" style="color: red;font-size: 20px">
                                </span>

                            </div>

                            <div class="form-group  ">
                                <label for="phone_number" class="control-label col-lg-4" style="text-align: right"> البريد الإلكتروني للمؤسسة الخاص بالشكاوي :
</label>
                                <div class="col-lg-8 input-group ">
                                    <input class=" form-control" id="complaint_email" name="complaint_email" type="text" value="{{$variable->getvalue('complaint_email')}}" oldData="{{$variable->getvalue('complaint_email')}}" disabled/>

                                    <span class="input-group-btn">
                                                <button class="btn btn-success" type="button">تعديل</button>
                                              </span>
                                </div>
                            </div>
                            <div class="form-group  ">
                                <label for="phone_number" class="control-label col-lg-4" style="text-align: right">البريد الإلكتروني للمؤسسة الخاص للمراسلة: </label>
                                <div class="col-lg-8 input-group ">
                                    <input class=" form-control" id="company_email" name="company_email" type="text" value="{{$variable->getvalue('company_email')}}" oldData="{{$variable->getvalue('company_email')}}" disabled/>
                                    <span class="input-group-btn">
                                                <button class="btn btn-success" type="button">تعديل</button>
                                              </span>
                                </div>
                            </div>

                            
                            
                            <div class="form-group ">
                                <label for="telegram" class="control-label col-lg-4" style="text-align: right">رقم هاتف الطوارئ:</label>
                                <div class="col-lg-8 input-group">
                                    <input class="form-control " id="emergency_phone" name="emergency_phone" type="text" value="{{$variable->getvalue('emergency_phone')}}" oldData="{{$variable->getvalue('emergency_phone')}}" disabled/>
                                    <span class="input-group-btn">
                                                <button class="btn btn-success" type="button">تعديل</button>
                                              </span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="facebook" class="control-label col-lg-4" style="text-align: right">Facebook</label>
                                <div class="col-lg-8 input-group">
                                    <input class="form-control " id="facebook" name="facebook" type="text" value="{{$variable->getvalue('facebook')}}" oldData="{{$variable->getvalue('facebook')}}" disabled/>
                                    <span class="input-group-btn">
                                                <button class="btn btn-success" type="button">تعديل</button>
                                              </span>
                                </div>
                            </div>
                             <div class="form-group ">
                                <label for="Twitter" class="control-label col-lg-4" style="text-align: right">Telegram</label>
                                <div class="col-lg-8 input-group">
                                    <input class="form-control " id="Twitter" name="Twitter" type="text" value="{{$variable->getvalue('Twitter')}}" oldData="{{$variable->getvalue('Twitter')}}" disabled/>
                                    <span class="input-group-btn">
                                                <button class="btn btn-success" type="button">تعديل</button>
                                              </span>
                                </div>
                            </div>
                      

                            <div class="form-group">
                                <div class="col-lg-offset-5 col-lg-3">
                                    <button class="btn btn-info" type="button">حفظ</button>
<a type="button" class="btn btn-success" href="{{url('control/control')}}">إلغاء</a>                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $(document).on('click', '.btn-success', function () {
                var sp=$(this).parent();
                sp.prev().removeAttr("disabled");
                sp.prev().addClass('change');
                $(this).removeClass('btn-success');
                $(this).addClass('btn-danger');
                $(this).text("إلغاء");
            });

            $(document).on('click', '.btn-danger', function () {
                var sp=$(this).parent();
                sp.prev().attr('disabled','disabled');
                sp.prev().removeClass('change');
                var oldVal=sp.prev().attr('oldData');
                sp.prev().val(oldVal);
                $(this).removeClass('btn-danger');
                $(this).addClass('btn-success');
                $(this).text("تعديل");
            });
            $(document).on('click', '.btn-info', function () {
                var data ="_token="+$('[name="_token"]').val()+ "&_method=POST";

                var data1='';
                $('.change').each(function() {
                    console.log($(this).val());
                    if($(this).val()==null||$(this).val()=='')
                                                data1=data1+"&"+$(this).attr("name")+"="+'*';
                    else
                                            data1=data1+"&"+$(this).attr("name")+"="+$(this).val();

                })
                if(data1!='') {
                    $('#error').addClass('hide');
                    var url = $('#signupForm').attr('action');
                    data=data+data1;
                    console.log(data);
                    $.post(url, data, function (res) {

                        if(res.success == true ){
                      
                            new PNotify({
                                title: "تم",
                                text: res.msg,
                                type: 'success',
                                hideAfter:4000,
                                styling: 'bootstrap3',
                            });
                            $('.change').each(function () {
                                $(this).attr('oldData',$(this).val());
                                $(this).attr('disabled','disabled');
                                var sp=$(this).next('span');

                                sp.find('button').removeClass('btn-danger');
                                sp.find('button').addClass('btn-success');
                                sp.find('button').text("تعديل")
                            })

                        }
                        else{
                            new PNotify({
                                title:res.title,
                                text: res.msg,
                                type: 'error',
                                hideAfter:4000,
                                styling: 'bootstrap3'
                            });
                        }


                    },'json');
                }else {
                    new PNotify({
                        title:'',
                        text: ' لا يوجد حقل تم تغييره',
                        type: 'error',
                        hideAfter:4000,
                        styling: 'bootstrap3'
                    });

                }
            })
        })
    </script>
    <script>
        var APP_URL = {!! json_encode(url('control/contact_info')) !!}
        $('[href="' + APP_URL + '"]').addClass('active');
    </script>
@endsection