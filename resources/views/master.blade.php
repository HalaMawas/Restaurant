<!DOCTYPE html>
<html lang=" {{LaravelLocalization::getCurrentLocale()}}">
    <head>
        <meta charset="utf-8">
        <title>One Life</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="{{asset('fronted/img/favicon.ico')}}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('fronted/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('fronted/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('fronted/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
        <link href="{{asset('fronted/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="{{asset('fronted/css/style.css')}}" rel="stylesheet">

         @if(LaravelLocalization::getCurrentLocale()!='en')
    
        <link href="{{asset('fronted/css/rtl.css')}}" rel="stylesheet">
        @endif
        <style type="text/css">
        input[type=checkbox], input[type=radio]{
            accent-color: #fbaf32;
        }
        </style>
        @yield('style')
    </head>

    <body>
        <!-- Nav Bar Start -->
        @include('partials.header')
        <!-- Nav Bar End -->
        
        
        <!-- Page Header Start -->
        <div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Food Menu</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Food Start -->
        @yield('content')
        <!-- Food End -->
        

       


        <!-- Footer Start -->
        @include('partials.footer')
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('fronted/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('fronted/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('fronted/lib/tempusdominus/js/moment.min.js')}}"></script>
        <script src="{{asset('fronted/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
        <script src="{{asset('fronted/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        
        <!-- Contact Javascript File -->
        <script src="{{asset('fronted/mail/jqBootstrapValidation.min.js')}}"></script>
        <script src="{{asset('fronted/mail/contact.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('fronted/js/main.js')}}"></script>
    </body>
</html>
