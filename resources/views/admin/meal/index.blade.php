@extends('admin.partials.master')
@section('content')

    <div class="app-content container-fluid">
        <div class="content-wrapper">
         
            <div class="content-body">
                <!-- Bordered table start -->
                <div class="row match-height">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">تعديل الوجبات</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-block">

                                    <div class="nav-vertical">

                                    <ul class="nav nav-tabs nav-left">
                                        @foreach($menus as $key=>$menu)
                                            <?php
                                            $name=str_replace(' ', '-',$menu->id);
                                            $menuname=preg_replace('/[^A-Za-z0-9\-]/', '', $name);
                                            ?>
                                        <li class="nav-item">

                                            <a @if($key==0) class="nav-link active"  aria-expanded="true"@else class="nav-link" aria-expanded="false" @endif href="#tabVerticalLeft{{$menu->id}}" data-toggle="tab" id="baseVerticalLeft-tab{{$menu->id}}" aria-controls="tabVerticalLeft{{$menu->id}}" >{{$menu->name_en}}</a>
                                        </li>

                                        @endforeach
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
                                        @foreach($menus as $key1=>$menu)
                                            <?php
                                            $name1=str_replace(' ', '-',$menu->id);
                                            $menuname1=preg_replace('/[^A-Za-z0-9\-]/', '', $name1);
                                            ?>
                                            <div role="tabpanel" @if($key1==0)class="tab-pane fade active in"  aria-expanded="true"@else class="tab-pane fade  in" aria-expanded="false" @endif  id="tabVerticalLeft{{$menu->id}}" aria-labelledby="{{$menuname1}}-tab" >
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>السلعة</th>
                                                            <th>السعر</th>
                                                            <th>تعديل</th>
                                                            <th>حذف</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($menu->meals as $meal)
                                                            @if($meal->state ==1)
                                                            <tr data-route="{{url("meal/{$meal->id}")}}">
                                                                <td>{{$meal->name_en.' / '.$meal->name_ar}}</td>
                                                                <td>{{$meal->price}}</td>

                                                                <td>  <a href="{{url("meal/{$meal->id}")}}" type="button" class="btn btn-primary edit" style="border:0px;" ><i class="icon-edit"></i>
                                                                    </a></td>
                                                                <td>   <a type="button" class="btn btn-danger delete" style="border:0px;" data-toggle="modal" data-target="#small"><i class="icon-ios-trash"></i>
                                                                    </a></td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            @endforeach

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered table end -->
            </div>
        </div>
    </div>
    <input type="hidden"  id="token" name="_token" value="{{ csrf_token() }}">

    <!-- Modal -->
    <div class="modal fade text-xs-left" id="small" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel19">حذف السلعة</h4>
                </div>
                <div class="modal-body">
                    <h5>هل أنت متأ:د من حذف هذه السلعة ?!</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-info" data-dismiss="modal" id="close">إغلاق</button>
                    <button type="button" class="btn btn-outline-danger confirm">حذف</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('scripts/delete.js')}}"></script>

    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/meal')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>
    @endsection