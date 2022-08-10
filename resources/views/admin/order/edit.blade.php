@extends('admin.partials.master')
@section('style')
    <style>

        #map-canvas {
            width: 100%;
            height: 250px;
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
                               تفاصيل الطلبية
                            </h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">


                                <form class="form" action="{{url("order/{$order->id}")}}" method="POST"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}

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
                                                    <label for="timesheetinput1">الطاولة </label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="timesheetinput1" class="form-control"
                                                               disabled=""
                                                               placeholder="restaurant name" name="name" required
                                                               value="{{$order->table->name}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-android-person"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                              <div class="col-md-3">

                                                <div class="form-group">
                                                    <label for="issueinput3">تاريخ الطلبية</label>
                                                    <input type="date" disabled=""
                                                           value="{{$order->created_at->toDateString()}}"
                                                           id="issueinput3" class="form-control" name="from_date"
                                                           data-toggle="tooltip" data-trigger="hover"
                                                           data-placement="top" data-title="From Date">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="timesheetinput6">وقت الطلبية</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input disabled="" type="time" id="time" class="form-control"
                                                               name="endtime"
                                                               value="{{$order->created_at->format('H:i')}}">
                                                        <div class="form-control-position">
                                                            <i class="icon-clock5"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label >حالة الطلبية</label>
                                                    <select id="issueinput5" name="status" class="form-control" disable>
                                                        <option @if($order->status=='wait') selected @endif value="waiting">في الانتظار</option>
                                                        <option @if($order->status=='accept') selected @endif value="accepted">تمت الموافقة</option>
{{--                                                        <option @if($order->status=='receive') selected @endif value="received">received</option>--}}
                                                        <option @if($order->status=='deliver') selected @endif value="delivered">تم التوصيل</option>
                                                        <option @if($order->status=='refused') selected @endif value="refused">رفض</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput6">ملاحظات الادمن حول الطلبية</label>
                                                    <div class="position-relative has-icon-left">
                                                            <textarea type="text" class="form-control"
                                                                      placeholder="Admin Note"
                                                                      name="note">{{$order->note}}</textarea>
                                                        <div class="form-control-position">
                                                            <i class="icon-clipboard"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-actions center">
                                        <a type="button" href="javascript:history.back()" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> إلغاء
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-check2"></i> حفظ
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-icons">
                               إضافة حسم
                            </h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">


                                <form class="form" action="{{url("order/discount/{$order->id}")}}" method="POST"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}

                                    @if (session('discounterror'))
                                        <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <div class="alert alert-danger" style="text-align: center;">
                                                    {!! session('discounterror') !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (session('discountsuccess'))
                                        <div class="row">
                                            <div class="form-group col-md-12 " style="text-align: center;">

                                                <div class="alert alert-success">
                                                    {!! session('discountsuccess') !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-body">

                                       
                                        <div class="row">
                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label >نوع الحسم</label>
                                                    <select id="issueinput5" name="discount_type" class="form-control" disable>
                                                        <option @if($order->discount=='fixed') selected @endif value="fixed"> مبلغ ثابت</option>
                                                        <option @if($order->discount=='percent') selected @endif value="percent">قيمة مئوية </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="timesheetinput1">قيمة الحسم </label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="timesheetinput1" class="form-control"
                                                               
                                                               placeholder="أضف قيمة الحسم" name="discount" required
                                                               value="{{$order->discount}}">
                                                        <div class="form-control-position">
                                                            <!-- <i class="icon-android-person"></i> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-actions center">
                                       
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-check2"></i> إضافة
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-icons">
                                <i class="icon-clipboard"></i>الطبية
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
<a href='{{url("print/{$order->id}")}}' target="_blank" class="btn btn-primary">print</a>
                                <div class="card-body collapse in">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>الصنف</th>
                                                <th>الوجبة</th>
                                                <th>الاضافية</th>

                                                <th>السعر</th>
                                              <!--   <th>الكمية</th>
                                                <th>السعر  للواحدة</th>
                                                <th>السعر الكلي</th> -->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $sum = 0;?>
                                            @foreach($order->meals as $meal)
                                                <tr>
                                                    <td scope="row">{{$meal->category->name_ar}}</td>
                                                    <td scope="row">{{$meal->name_ar}}</td>

                                  
                                            
                                                    <td scope="row">{{$meal->pivot->note}}</td>
													<td>{{ $meal->pivot->meal_price}}</td>
                                                   
                                                </tr>

                                            @endforeach
                                            <tr><th scope="row" colspan="7" style="text-align: center">
                                                   
                                                </th></tr>
                                            <tr class="thead-inverse"><th colspan="7" style="text-align: center">
                                                  إجمالي الفاتورة = {{$order->total_bill}} ل.س
                                                </th></tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>

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
        var APP_URL = {!! json_encode(url('/order')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-VkAkMcMlVRYlAB5pItCf7QExPCFHHNA&libraries=places"
            type="text/javascript"></script>
   



@endsection
