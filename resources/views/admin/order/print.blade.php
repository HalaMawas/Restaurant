<html>
<head>
    <title>TimeTable - {{ $order->created_at}}</title>
    <style>
        @media print {

            td, th {
                padding: 10px 5px;
                text-align: center;
                font-size: 12px;
            }

            @page {
                size: landscape;   /* auto is the initial value */
                margin: 0;  /* this affects the margin in the printer settings */
            }

            html {
                background-color: #FFFFFF;
                margin: 0; /* this affects the margin on the html before sending to printer */
            }

            body {
                margin: 0 10mm; /* margin you want for the content */
            }
        }

        td {
            text-align: center;
        }

    </style>
</head>
<body>
<div class="container" style="direction: rtl">
    <div id="print" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        {{--    Logo N School Details--}}
          <table width="100%">
            <tr>
                <td >
                    <strong><span style="color: #1b0c80; font-size: 25px;">{{strtoupper($varCompanyName->value) }}</span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px;"><i>{{ $order->address }}</i></span></strong><br/>
          
                    <br />
                    <strong><span style="color: #000; font-size: 15px;"></span></strong>
                </td>
            </tr>

        </table>
        <div class="row">
             <img src="{{asset($varLogo->value)}}"
                 style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.2; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
            <div class="col-md-6">
                 <table cellpadding="20" style="width:100%; border-collapse:collapse; border: 1px solid #000; margin: 10px auto;direction: rtl;" border="1">
             <thead class="thead-inverse">
                                            <tr>
                                                <th style="width: 25%">اسم الزبون</th>
                                                <td style="width: 25%">{{$order->customer->first_name.' '.$order->customer->last_name}}</td>
                                                <th style="width: 25%">تاريخ الطلبية</th>
                                                <th style="width: 25%">{{$order->created_at}}</th>
                                              
                                            </tr><tr>
                                                <th>حالة الطلبية </th>
                                                <td>{{$order->status}}</td>
                                                <th>تاريخ الطلبية</th>
                                                <th>{{$order->created_at}}</th>
                                              
                                            </tr>
                                            </thead>
                                          
        </table>
            </div>
        </div>
        {{--Background Logo--}}
        <div style="position: relative;  text-align: center; ">
           
        </div>

        {{-- Tabulation Begins --}}
        <table cellpadding="20" style="width:100%; border-collapse:collapse; border: 1px solid #000; margin: 10px auto;direction: rtl;" border="1">
             <thead class="thead-inverse">
                 <tr class="thead-inverse"><th colspan="7" style="text-align: center;    background: #e8e5e5ad;">
                                                تفاصيل الطلبية</th></tr>
                                            <tr>
                                                <th>الصنف</th>
                                                <th>المادة</th>
                                                <th>الاضافية</th>
                                                <th>ملاحظات</th>
                                                
                                                <th>الكمية</th>
                                                <th>السعر  للواحدة</th>
                                                <th>السعر الكلي</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $sum = 0;?>
                                            @foreach($order->meals as $meal)
                                                <tr>
                                                    <td scope="row">{{$meal->menu->name_en}}</td>
                                                    <td scope="row">{{$meal->name_en}}</td>
                                                    
                                                    <td>{{$meal->pivot->extra_note}}</td>
                                                    <td scope="row">{{$meal->pivot->note}}</td>
                                                    <td>{{$meal->pivot->quantity}}</td>
                                                    <td>{{$meal->pivot->price}}</td>
                                                    <td>{{$meal->pivot->quantity * $meal->pivot->price}}</td>
                                                    <?php $sum = $sum + $meal->pivot->quantity * $meal->pivot->price; ?>
                                                </tr>
                                            @endforeach
                                            <tr><th scope="row" colspan="7" style="text-align: center">
                                                    + {{$order->delivery_cost}} ل.س للتوصيل
                                                </th></tr>
                                            <tr class="thead-inverse"><th colspan="7" style="text-align: center">
                                                  إجمالي الفاتورة = {{$sum+$order->delivery_cost}} ل.س
                                                </th></tr>

                                            </tbody>
        </table>
    </div>
</div>

<script>
    window.print();
</script>
</body>
</html>
