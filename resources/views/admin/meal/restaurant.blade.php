@extends('admin.partials.master')
@section('style')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-plugins/app-assets/vendors/js/gallery/photo-swipe/photoswipe.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-plugins/app-assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/css/pages/gallery.css')}}">


@endsection
    @section('content')

            <div class=" app-content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Edit Meal</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Restaurant</a>
                        </li>
						<li class="breadcrumb-item"><a href="">Meals</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Meal
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Image grid -->
            <section id="image-gallery" class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
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
                        <div class="card-text">
                            {{--<p>Image gallery grid with photo-swipe integration. Display images gallery in 4-2-1 columns and photo-swipe provides gallery features.</p>--}}
                        </div>
                    </div>
                    <div class="card-block  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        <div class="row">
                            @foreach($restaurants as $restaurant)
                            <figure class="col-lg-3 col-md-6 col-xs-12" style="    text-align: center;" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a href="{{url("edit-meal/{$restaurant->id}")}}" itemprop="contentUrl" data-size="480x360">
                                    <img class="img-thumbnail img-fluid" src="{{asset("images/{$restaurant->logo}")}}" itemprop="thumbnail" alt="Image description" style="width:200px;height:200px"/>
									<p><span>{{$restaurant->name}}</span></p>
                                </a>
                                
                            </figure>
                            @endforeach
                        </div>
                    </div>
                    <!--/ Image grid -->

                </div>
                <!--/ PhotoSwipe -->
            </section>
            <!--/ Image grid -->

        </div>
    </div>

    </div>

@endsection
@section('script')
    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/meal')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>
@endsection