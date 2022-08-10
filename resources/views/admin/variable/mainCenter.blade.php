
@extends('admin.partials.master')
@section('style')
    <style>

        #map-canvas {
            width: 100%;
            height: 250px;
        }
    </style>
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
                                Main Center
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


                                <form class="form" action="{{url('main-center')}}" method="POST"
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
                                        <h4 class="form-section"><i class="icon-android-pin"></i>Center location on
                                            map</h4>
                                        <div class="form-group  col-md-8 col-md-offset-2">
                                       
                                    
                                       </div>


                                        <div id="map-canvas"></div>
                                    
                                        <div class="row hide">
                                            <div class="form-group col-md-6">
                                                <label for="">Lat</label>
                                                <input type="text" class="form-control input-sm" name="lat" id="lat"
                                                       value="{{$lat->value}}" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Lng</label>
                                                <input type="text" class="form-control input-sm" name="lng" id="lng"
                                                       value="{{$lng->value}}" required>
                                            </div>
                                        </div>


                                   

                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary save">
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
    {{--/* for active sidebar*/--}}
    <script>
        var APP_URL = {!! json_encode(url('/main-center')) !!}
        $('[href="' + APP_URL + '"]').parent().addClass('active');
    </script>


 
 <script>
        var map;
        var marker;
        var coords;
 		var    lat = {!! json_encode($lat) !!};
		var    lng = {!! json_encode($lng) !!};
        function initialize() {
            var latlng = new google.maps.LatLng(lat.value,lng.value);
            var myOptions = {
                zoom: 12,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });
            // add a marker on map
            placeMarker(latlng);
        };

        function placeMarker(location) {
            if (marker) {
                marker.setMap(null);
                marker = null;
                placeMarker(location);
            } else {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true
                });
                $('#lat').val(marker.getPosition().lat());
                $('#lng').val( marker.getPosition().lng());
            }
            google.maps.event.addListener(marker, 'position_changed', function () {

                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);

            });
        };

    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-VkAkMcMlVRYlAB5pItCf7QExPCFHHNA&callback=initialize">
    </script>

@endsection