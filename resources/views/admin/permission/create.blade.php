@extends('admin.partials.master')
@section('style')

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
                          مجموعة صلاحيات جديدة
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
                          <!-- <div class="card"> -->

                            <div class="card-body">
                                <form action="{{url('permission')}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                                    <div class="row">
                                        <div class=" col-md-5">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">اسم المجموعة</label>
                                                <input required type="text" id="eventRegInput2" class="form-control" placeholder="" value="" name="name">
                                            </div>
                                        </div>
                                    </div>

                                
                                        <div class="row">
                                            <div class="col-md-8" style="margin:0% 25% ">
                                                <ul>
                                                     <li class="parent">
            <label>
                <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="order"/>
            </label>
            <label for="node-4" class="expandable">الطلبيات<span class="caret">

            </span>
        </label>

        <ul >

            <li class="parent">
                <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="order_show"/></label><label for="node-4" class="expandable">عرض<span class="caret"></span></label>

            </li>
            <li class="parent">
                <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="order_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

            </li>


        </ul>
    </li>

                                                <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="category"/>
                                                    </label>
                                                    <label for="node-4" class="expandable">التصنيفات<span class="caret">

                                            </span>
                                                    </label>

                                                    <ul >
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="category_show"/></label><label for="node-4" class="expandable">عرض<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="category_insert"/></label><label for="node-4" class="expandable">إضافة<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="category_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="category_delete"/></label><label for="node-4" class="expandable">حذف<span class="caret"></span></label>

                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="item"/>
                                                    </label>
                                                    <label for="node-4" class="expandable">السلع<span class="caret">

                                            </span>
                                                    </label>

                                                    <ul >
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="item_show"/></label><label for="node-4" class="expandable">عرض<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="item_insert"/></label><label for="node-4" class="expandable">إضافة<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="item_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="item_delete"/></label><label for="node-4" class="expandable">حذف<span class="caret"></span></label>

                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="slider"/>
                                                    </label>
                                                    <label for="node-4" class="expandable">Application Slider<span class="caret">

                                            </span>
                                                    </label>

                                                    <ul >
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="slider_show"/></label><label for="node-4" class="expandable">عرض<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="slider_insert"/></label><label for="node-4" class="expandable">إضافة<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="slider_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="slider_delete"/></label><label for="node-4" class="expandable">حذف<span class="caret"></span></label>

                                                        </li>

                                                    </ul>
                                                </li>
                                                    <li class="parent">
                                                        <label>
                                                            <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="send_notificatio"/>
                                                        </label>
                                                        <label for="node-4" class="expandable">الاشعارات<span class="caret"></span>
                                                        </label>


                                                    </li> 
                                                   
                                                <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="customer"/>
                                                    </label>
                                                    <label for="node-4" class="expandable"> الزبائن<span class="caret">

                                        </span>
                                                    </label>

                                                    <ul >
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="customer_show"/></label><label for="node-4" class="expandable">عرض<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="customer_insert"/></label><label for="node-4" class="expandable">إضافة<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="customer_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="customer_delete"/></label><label for="node-4" class="expandable">حذف<span class="caret"></span></label>

                                                        </li>

                                                    </ul>
                                                </li>

                                                <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="car"/>
                                                    </label>
                                                    <label for="node-4" class="expandable">السيارات<span class="caret">

                                </span>
                                                    </label>

                                                    <ul >
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="car_show"/></label><label for="node-4" class="expandable">عرض<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="car_insert"/></label><label for="node-4" class="expandable">إضافة<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="car_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="car_delete"/></label><label for="node-4" class="expandable">حذف<span class="caret"></span></label>

                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="offer"/>
                                                    </label>
                                                    <label for="node-4" class="expandable">العروض<span class="caret">

                            </span>
                                                    </label>

                                                    <ul >
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="offer_show"/></label><label for="node-4" class="expandable">عرض<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="offer_insert"/></label><label for="node-4" class="expandable">إضافة<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="offer_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="offer_delete"/></label><label for="node-4" class="expandable">حذف<span class="caret"></span></label>

                                                        </li>

                                                    </ul>
                                                </li>
                                                <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="user"/>
                                                    </label>
                                                    <label for="node-4" class="expandable">المستخدمين<span class="caret">

        </span>
                                                    </label>

                                                    <ul >
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="user_show"/></label><label for="node-4" class="expandable">عرض<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="user_insert"/></label><label for="node-4" class="expandable">إضافة<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="user_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="user_delete"/></label><label for="node-4" class="expandable">حذف<span class="caret"></span></label>

                                                        </li>

                                                    </ul>
                                                </li>
                                              
                                              
                                              
                                                <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="permission"/>
                                                    </label>
                                                    <label for="node-4" class="expandable">الصلاحيات<span class="caret">

            </span>
                                                    </label>

                                                    <ul >

                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="permission_insert"/></label><label for="node-4" class="expandable">إضافة<span class="caret"></span></label>

                                                        </li>
                                                        <li class="parent">
                                                            <label><input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="permission_edit"/></label><label for="node-4" class="expandable">تعديل<span class="caret"></span></label>

                                                        </li>


                                                    </ul>
                                                </li>
                                                 <li class="parent">
                                                        <label>
                                                            <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="restore"/>
                                                        </label>
                                                        <label for="node-4" class="expandable">العناصر المحذوفة<span class="caret"></span>
                                                        </label>


                                                    </li>
                                                      <li class="parent">
                                                    <label>
                                                        <input type="checkbox" class="main" style="margin-left: 5px;" name="permission[]" value="other"/>
                                                    </label>
                                                    <label for="node-4" class="expandable">others <span class="caret">

                </span>
                                                    </label>


                                                </li>

                                                </ul>
                                            </div>

                                        </div>




                                    <div class="form-actions center">
<button type="submit" class="btn btn-primary pull-right">إضافة</button>
                                    </div>

<div class="clearfix"></div>
</form>
</div>
</div>

<!-- </div> -->
</div>
</div>
</div>
</div>
</section>
<!-- // Basic form layout section end -->

</div>





@endsection
@section('script')
<script src="{{asset('admin-plugins/treeview/NewGroup.js')}}"></script>
<script>
    var APP_URL = {!! json_encode(url('/permission/create')) !!}
    $('[href="' + APP_URL + '"]').parent().addClass('active');

</script>

    @endsection
