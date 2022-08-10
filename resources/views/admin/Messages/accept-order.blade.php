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
                                Accepted Email Text
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


                                <form class="form" id="myForm" action="{{url('set-order-message')}}" method="POST"
                                      enctype="multipart/form-data">
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
                                    <div class="form-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                          
                                            <textarea name="area2" id="area2" style="width: 100%;">
                                               {!! $message->value !!}
                                            </textarea>
                                            <br />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <i class="icon-check2"></i> Save
                                        </button>
                                    </div>
                                </form>
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
  
<script type="text/javascript" src="{{asset('admin-plugins/nicEdit.js')}}"></script>
<script type="text/javascript">
   // bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	bkLib.onDomLoaded(function() {
	
	new nicEditor({fullPanel : true}).panelInstance('area2');
	
});
</script>
<script type="text/javascript">
      $(document).ready(function() {
            $('.btn-primary').click(function (e) {
                $('#area2').val($('.nicEdit-main').html());
                $("#myForm").submit();
            })
        })

</script>
    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/get-order-message')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>

@endsection