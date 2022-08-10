@extends('admin.partials.master')
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>

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
                                الطلبات
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


                                <form class="form" action="{{url('control/order')}}" method="GET"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('GET')}}
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
                                                    <label for="table">الطاولات</label>
                                                    <select  name="table" id="table"
                                                             class="form-control js-example-basic-single" >
                                                        <option value="" selected>جميع  الطاولات
                                                        </option>
                                                        @foreach($tables as $table)
                                                            <option value="{{$table->id}}" @if(app('request')->input('table')==$table->id) selected @endif>{{$table->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="issueinput3">من تاريخ</label>
                                                    <input type="date" value="{{app('request')->input('from_date')}}" id="issueinput3" class="form-control" name="from_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="From Date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="issueinput4">إلى تاريخ</label>
                                                    <input type="date" id="issueinput4" value="{{app('request')->input('to_date')}}" class="form-control" name="to_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="To Date">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-actions center">
                                        {{--<button type="button" class="btn btn-warning mr-1">--}}
                                            {{--<i class="icon-cross2"></i> Cancel--}}
                                        {{--</button>--}}
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-android-search"></i> بحث
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                    @if(isset($orders))
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-icons">
                                الطلبات
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
						 <div class="card-body">
                                       <div class="col-md-12" style="    padding: 20px 23px;">
                                       
                                        <a href="{{url('api/exportorder/'.'?restaurant='.app('request')->input('restaurant').'&customer='.app('request')->input('customer').'&from_date='.app('request')->input('from_date').'&to_date='.app('request')->input('to_date'))}}"  class="btn btn-success">
                                            <i class="icon-download3"></i> Excel
                                        </a>
                                    </div>
                                       
                                  
                            
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">



                                <!-- Table head options start -->
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="card">

                                                <div class="card-body collapse in">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="thead-inverse">
                                                            <tr>
                                                                <th>رقم الطاولة</th>
                                                                <!-- <th>Restaurant</th> -->
                                                                <th>تاريخ الطلبية</th>
																<th>إجمالي الفاتورة</th>
																<th>حسم</th>
                                                                <th>حالة الطلبية</th>
																<!-- <th>Car</th> -->
                                                                <th>تعديل</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if($orders->count()==0)
                                                                <tr ><th colspan="4">لا يوجد سجلاتdata</th></tr>
                                                            @else
                                                            @foreach($orders as $order)
                                                            <tr>
                                                                <th scope="row">{{$order->table->name}}</th>

                                                                <td>{{$order->created_at}}</td>
																<td>{{$order->total_bill}}</td>
																<td>{{$order->discount}}</td>
                                                                <td>{{$order->status}}</td>
															<!-- 	<td>
																@isset($order->taxi_id)
																	{{$order->taxi->car_number}}
																	@endisset
																</td> -->

                                                                <td>  <a href="{{url("control/order/{$order->id}")}}" type="button" class="btn btn-primary edit" style="border:0px;" ><i class="icon-edit"></i>
                                                                    </a></td>
                                                            </tr>
                                                            @endforeach
                                                            @endif

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Table head options end -->
                                    <div class="container">
                                        @foreach ($orders as $user)

                                        @endforeach
                                    </div>
                                    {{$orders->links()}}
                            </div>
                        </div>



                    </div>
                    @endif

                </div>
            </div>

        </section>
        <!-- // Basic form layout section end -->

    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/order')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function () {

            $('[name=from_date]').change(function(){
                _this=$(this);
                $('[name=to_date]').attr('min',_this.val());
                // $('[name=to_date]').val(_this.val());
            });
            $('[name=to_date]').change(function(){
                _this=$(this);
                $('[name=from_date]').attr('max',_this.val());
                // $('[name=from_date]').val(_this.val());
            });

        });
    </script>


@endsection