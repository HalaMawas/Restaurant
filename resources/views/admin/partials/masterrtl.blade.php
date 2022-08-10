<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Project Dashboard -MHL Admin</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('MHLlogo.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('MHLlogo.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('MHLlogo.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('MHLlogo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('MHLlogo.png')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('MHLlogo.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/css/bootstrap.css')}}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/fonts/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/fonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/vendors/css/extensions/pace.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/css/colors.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/app-assets/css/core/colors/palette-gradient.css')}}">
    <!-- END Page Level CSS-->

    <!-- PNotify -->
    <link href="{{asset('admin-plugins/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('admin-plugins/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{asset('admin-plugins/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">

    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-plugins/assets/css/style.css')}}">
    <!-- END Custom CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('44f016a9ca81aa7bec44', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('newOrder');
        channel.bind('App\\Events\\eventTrigger', function(data) {
            var count=+$('.tag-pill').html()+1;
        $('.tag-pill').text(count);
        $('.notification-tag').text(count+' New');
        console.log(data);

        $('.notification-list').prepend(
            '<a class="list-group-item" href="http://localhost:81/blog/public/order/'+data.order.id+'" >'+
                '<div class="media"> <div class="media-left valign-middle"><i class=" icon-cart3 icon-bg-circle bg-cyan"></i> </div>'+
                '<div class="media-body">'+
                '<h6 class="media-heading">'+data.customer+'</h6>'+
                '<p class="notification-text font-small-3 text-muted">'+data.restaurant+'</p><small></small>'+
            '</div></div></a>'
        )

            var snd='<audio autoplay=true ><source src="http://localhost:81/blog/public/sound/Call-bell-ding.mp3"> </source></audio>';
            $('body').append(snd);
        } );
    </script>
    @yield('style')
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

<!-- navbar-fixed-top-->
@include('admin.partials.header')

<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- main menu-->
@include('admin.partials.sidebar')
<!-- / main menu-->

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border" style="position:fixed;bottom:0;width:100%">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2019 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">AlZAHRAAIT</a>, All rights reserved. </span></p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{asset('admin-plugins/app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<!-- PNotify -->
<script src="{{asset('admin-plugins/pnotify/dist/pnotify.js')}}"></script>
<script src="{{asset('admin-plugins/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{asset('admin-plugins/pnotify/dist/pnotify.nonblock.js')}}"></script>

{{--<script type="text/javascript" src="https://js.pusher.com/4.4/pusher.min.js" charset="utf-8"></script>--}}

 {{--<script>--}}

    {{--// Enable pusher logging - don't include this in production--}}
    {{--Pusher.logToConsole = true;--}}

    {{--var pusher = new Pusher('44f016a9ca81aa7bec44', {--}}
      {{--cluster: 'eu',--}}
      {{--forceTLS: true--}}
    {{--});--}}

    {{--var channel = pusher.subscribe('my-channel');--}}
    {{--channel.bind('App\\Events\\OrderSend', function(data) {--}}
      {{--alert(JSON.stringify(data));--}}
    {{--});--}}
  {{--</script>--}}


<script src="{{asset('admin-plugins/app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-plugins/app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-plugins/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-plugins/app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-plugins/app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-plugins/app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-plugins/app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-plugins/app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
{{--<script src="{{asset('admin-plugins/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>--}}
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="{{asset('admin-plugins/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-plugins/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
{{--<script src="{{asset('admin-plugins/app-assets/js/scripts/pages/dashboard-lite.js')}}" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL JS-->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>--}}

@yield('script')
</body>
</html>
