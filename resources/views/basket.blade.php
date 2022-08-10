@extends('master')

@section('content')
 <!-- Menu Start -->
        <div class="menu">
            <div class="container">
                <div class="section-header text-center">
                    <p></p>
                    <h2>{{$table->name}}</h2>
                </div>
                <div class="menu-tab">
                    
                    <div class="tab-content">
                        <div id="burgers" class="container tab-pane active">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                      <form class="form-horizontal" role="form" id="myForm" action="{{url('sendorder')}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" name="table" value="{{$table->id}}" hidden>
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الوجبة</th>
                                            <th>الاضافات</th>
                                            <th>السعر   </th>
                                            <th>إلغاء   </th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    @foreach ($table->baskets as $key => $meal)
                                      <tr>
                                    <td> <img src="{{url("imageMeals/{$meal->meal->image}")}}" alt="Image"></td>
                                    <td>{{$meal->meal->{'name_'.LaravelLocalization::getCurrentLocale()} }}</td>
                                    @php $extrasum=0; @endphp
                                    <td> @foreach($meal->extraOptions() as $extra)
                                          @php  $extrasum=$extrasum+$extra->price; @endphp
                                            <p>{{$extra->{'name_'.LaravelLocalization::getCurrentLocale()} }}</p>
                                            @endforeach</td>
                                            <td>{{ $meal->meal->price + $extrasum }}</td>
                                    <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                   </tr>
                                    @endforeach
                                   </tbody>
                                </table>
                                   <button class="btn custom-btn" type="submit">send order</button>
                            </form>
                                   
                                   
                                   
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
@endsection