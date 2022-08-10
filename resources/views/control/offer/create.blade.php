@extends('control.master')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

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
					<li><a href="#">العروض</a></li>
					<li class="active">إضافة</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<strong>إضافة  عرض جديد </strong> 
				</div>
				<div class="card-body card-block">
					
					<form class="form-horizontal" role="form" id="myForm" action="{{url('control/offer')}}" method="POST" enctype="multipart/form-data">
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
						<div class="row form-group">
							<div class="col col-md-6">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-th-list"></i></div>
									<input type="text" id="input1-group1" name="title_ar" placeholder="العنوان بالعربي" class="form-control" required>
								</div>
							</div>
								<div class="col col-md-6">
								<div class="input-group">
									
									  <textarea class="form-control" id="summernote" name="description_ar" placeholder="شرح العرض  عربي...."></textarea>

									
								</div>
							</div>
						</div> 
						<div class="row form-group">
							<div class="col col-md-6">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-th-list"></i></div>
									<input type="text" id="input1-group2" name="title_en" placeholder="English title..." class="form-control" required>
								</div>
							</div>
							<div class="col col-md-6">
								<div class="input-group">
									
									  <textarea class="form-control" id="summernote" name="description_en" placeholder="English offer description...."></textarea>

									
								</div>
							</div>
						</div>	
						<div class="row form-group">
							<div class="col col-md-6">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
									<input type="number" id="input1-group2" name="sort" placeholder="الترتيب (1,2,3)..." class="form-control" required>
								</div>
							</div>
					
							<div class="col col-md-6">
								<div class="input-group">
									
									  <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
  <input placeholder="Select date" type="text" id="example" class="form-control">
  <label for="example">Try me...</label>
  <i class="fas fa-calendar input-prefix" tabindex=0></i>
</div>

									
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-6">
							
                                                                    <div class="col-12 col-md-6" style="float:right;"><input placeholder="صورة الوجبة" type="file" id="img" name="image" class="form-control-file"></div>
                                                                    <div class="col-md-3" style="float:right;">
                                                        <img id="blah" style="max-width: 180px; margin-top: 15px"
                                                             alt=""/>
                                                    </div>
							</div>
						</div>

						<div class="card-footer">
							<button type="submit" class="btn btn-success btn-sm">
								<i class="fa fa-dot-circle-o"></i> حفظ
							</button>
							<button type="reset" class="btn btn-danger btn-sm">
								<i class="fa fa-ban"></i> إلغاء
							</button>
						</div>
						
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script>
 	$(document).ready(function() {
  // $('#summernote').summernote();
  // Data Picker Initialization
$('.datepicker').datepicker();
});
        $('#img').change(function () {
            var input = document.getElementById('img');
            $(this).closest("div").find('.help-block').html('');
            $('div').removeClass('has-error');
            $(this).closest("div").removeClass('has-error');

            var size = Math.round(input.files[0].size / 1024);
            if (size > 2048) {
                $(this).closest("div").find('.help-block').html('<strong> The image size should not exceed 2048 KB</strong>');
                $(this).closest("div").addClass('has-error');
                $(this).focus();
                $(this).val('');
                $('#blah').attr('src', '');


            } else {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });

    </script>
@endsection