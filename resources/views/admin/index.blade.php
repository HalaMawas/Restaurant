@extends('adminPanel.partials.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- stats -->
    <div class="row">
		 <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="deep-orange">{{$waiting}}</h3>
                                <span>Waiting Orders</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-hour-glass deep-orange font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="teal">{{$accepted}}</h3>
                                <span>Prepared Orders</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-paper-airplane teal font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="cyan">{{$delivered}}</h3>
                                <span>Delivered Orders</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-checkmark cyan font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		      <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink">{{$refused}}</h3>
                                <span> Refused Orders</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-close pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
       
    </div>
    <!--/ stats -->
   
</div>
<div class="row match-height">
   
    
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">طلبات قيد الانتظار</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                <!--     <p>Total paid invoices 240, unpaid 150. <span class="float-xs-right"><a href="#">Invoice Summary <i class="icon-arrow-right2"></i></a></span></p> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>رقم الطاولة</th>
                                <th>الوجبة </th>
                                <th>وقت الطلب</th>
                                <th>الحالة</th>
                                <!-- <th>عدد الزبائن </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($baskets as $key=>$basket)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td class="text-truncate"><a href="{{url("tableOrder/{$basket->table_id}")}}">{{$basket->table->name}}</a></td>
                                <td class="text-truncate">{{$basket->meal->name_ar}}</td>
                                <td class="text-truncate">{{date("H:i",strtotime($basket->created_at))}}</td>
                                <td class="text-truncate"><span class="tag tag-default tag-success">{{$basket->state}}</span></td>
                                <!-- <td class="text-truncate">10/05/2016</td> -->
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الطلبات اليوم</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                <!--     <p>Total paid invoices 240, unpaid 150. <span class="float-xs-right"><a href="#">Invoice Summary <i class="icon-arrow-right2"></i></a></span></p> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>الطاولة</th>
                                <th>الفاتورة</th>
                                <th>الوقت</th>
                                <!-- <th>عدد الزبائن </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="text-truncate"><a href="#">{{$order->table->id}}</a></td>
                                <td class="text-truncate">{{$order->total_bill}}</td>
                                <td class="text-truncate">{{$order->discount_value}}</td>
                               
                                <!-- <td class="text-truncate">10/05/2016</td> -->
                            </tr>
                           @endforeach
                        </tbody>
                        <tbody>
                            <tr ><th colspan="3">المبلغ الكلي {{$orders->sum('total_bill')-$orders->sum('discount_value')}}</th></tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection