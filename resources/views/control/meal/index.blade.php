@extends('control.master')
@section('style')
<link rel="stylesheet" href="{{asset('backend/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #f72b2b;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ed72e;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endsection
@section('content')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Dashboard</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="#">قائمة المأكولات</a></li>
					<li><a href="#">التصنيفات</a></li>
					<li class="active">تعديل</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">التصنيفات</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>#</th>
                                            <th>التصنيف</th>
                                        	<th>الاسم</th>
                                            <th>الترتيب</th>
                                            <th>الحالة</th>
                                            <th>تعديل	</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   	@foreach($meals as $key=>$meal)
                                   	<tr>
                                   	<td>{{$key+1}}</td>
                                   	<td>{{$meal->category->name_ar}}</td>
                                    <td>{{$meal->name_ar.' / '.$meal->name_en}}</td>
                                   	<td>{{$meal->sort}}</td>
                              
    <td>
 <label class="switch">
  <input class="state-swich" type="checkbox" @if($meal->state) checked @endif onclick="myFunction({{$meal->id}})">
  <span class="slider round"></span>
</label>
    </td>
                                   	<td><button class="btn btn-warning edit"> <i class="fa fa-edit"></i></button></td>
                                   	<td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                   </tr>
                                   	@endforeach
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
@endsection
@section('script')
 <script src="{{asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/init-scripts/data-table/datatables-init.js')}}"></script> 
    <script src="{{asset('backend/scripts/edit.js')}}"></script>
    <script type="text/javascript">
       

       function myFunction($id) {
        var data="_method=Post"
        data = data +"&id="+$id+'&type=Meal';
        // data+="&name_sv="+new_name_sv;
        var url ="{{ url('api/changeState') }}";

        $.post(url,data,function(res){

            if(res.success==true){
                 console.log(res.success);
                new PNotify({
                    // title:"Done",
                    text: res.msg,
                    type: 'success',
                    hideAfter:4000,
                    styling: 'bootstrap3',
                });
            
            }
            else{
                new PNotify({
                    title: "Wrong!",
                    text: res.msg,
                    type: 'error',
                    hideAfter:4000,
                    styling: 'bootstrap3'
                });
              

            }
        },'json');
     
       }
    </script>

@endsection