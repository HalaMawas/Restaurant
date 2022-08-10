@extends('admin.partials.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>

    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
@endsection
@section('content')

    <div class="app-content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">تعديل تصنيف</h2>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">التصنيفات</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل تصنيف<
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Bordered table start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">التصنيفات</h4>
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
                                <div class="card-block card-dashboard">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0" id="example">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>الترتيب</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($restaurants as $key=>$restaurant)
                                            <tr data-route="{{url("restaurant/{$restaurant->id}")}}">
                                            <td>{{$key+1}}</td>
                                            <td>{{$restaurant->name}}</td>
                                            <td>{{$restaurant->sort_number}}</td>
                                         
                                            <td>  <a href="{{url("restaurant/{$restaurant->id}")}}" type="button" class="btn btn-primary edit" style="border:0px;" ><i class="icon-edit"></i>
                                                </a></td>
                                            <td>  <a type="button" class="btn btn-danger delete" style="border:0px;" data-toggle="modal" data-target="#small"><i class="icon-ios-trash"></i>
                                                </a>
                                            </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered table end -->
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
                        <h4 class="modal-title" id="myModalLabel19">حذف التصنيف</h4>
                    </div>
                    <div class="modal-body">
                        <h5>هل أنت متأ:د من حذف هذا التصنيف ?!</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-info" data-dismiss="modal" id="close">إغلاق</button>
                        <button type="button" class="btn btn-outline-danger confirm">حذف</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/restaurant')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>
    <script src="{{asset('scripts/delete.js')}}"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );

            // DataTable
            var table = $('#example').DataTable();

            // Apply the search
            table.columns().every( function () {
                var that = this;

                $( 'input clear', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        } );
    </script>
@endsection