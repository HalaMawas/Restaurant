
<!DOCTYPE html>
<html lang="en">
    <!-- created by ALZahraaSoft at 2020 by:
                   eng. HALA MAWAS
                   eng. MOUSA KALOK
        -->
<head>
    
    <title>Login To Mandoob Control</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
     <!-- <link rel="icon" type="image/png" href="{{asset('backend-plugin/img/logo.png')}}"> -->
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
     <link rel="stylesheet" href="{{asset('loginstyle/css/util.css')}}">

    <link rel="stylesheet" href="{{asset('loginstyle/css/main.css')}}">
    <!--===============================================================================================-->
</head>
@if (session('error'))

<body data-open="click" data-menu="vertical-menu" data-col="2-columns"  onload=" me.showNotification2('top','center','danger','{{session()->get('error')}}')"  class="vertical-layout vertical-menu 2-columns  fixed-navbar">
@else
<body>
@endif
@if ($errors->any())
    <script>
        // $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js



        window.onload = function() {
            @foreach ($errors->all() as $error)
alert('اسم المستخدم أو كلمة السر غير صحيح')    ;
            @endforeach
        };
    </script>
@endif

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}" style="    direction: rtl;">
                @csrf
                
                <span class="login100-form-title p-b-48" style="padding-bottom: 0">

<img style="width: 138px;" src=""/>                 </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100" data-placeholder="البريد الالكتروني"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">

                    <input class="input100" type="password" name="password" required autocomplete="current-password">
                    <span class="focus-input100" data-placeholder="كلمة السر"></span>




                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            تسجيل الدخول
                        </button>
                    </div>
                </div>


            </form>
        </div>
        <footer style="
    position: fixed;
    width: 100%;
    bottom: 0px;
    /* z-index: -1; */
    text-align: center;
    padding-top: 8px;
    margin-top: 40px;
">
</footer>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('loginstyle/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
 <!--===============================================================================================-->
 <script src="{{asset('loginstyle/vendor/animsition/js/animsition.min.js')}}"></script>

<!--===============================================================================================-->
 <script src="{{asset('loginstyle/vendor/bootstrap/js/popper.js')}}"></script>

 <script src="{{asset('loginstyle/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!--===============================================================================================-->
 <script src="{{asset('loginstyle/vendor/select2/select2.min.js')}}"></script>

<!--===============================================================================================-->
 <script src="{{asset('loginstyle/vendor/daterangepicker/moment.min.js')}}"></script>

 <script src="{{asset('loginstyle/vendor/daterangepicker/daterangepicker.js')}}"></script>

<!--===============================================================================================-->
 <script src="{{asset('loginstyle/vendor/countdowntime/countdowntime.js')}}"></script>

<!--===============================================================================================-->
 <script src="{{asset('loginstyle/js/main.js')}}"></script>
<script>
    me = {
        showNotification2: function (from, align,mytype,msg) {
            type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

            color = Math.floor((Math.random() * 6) + 1);

            $.notify({
                    icon: "add_alert",
                    message: msg

                },
                {
                    type: mytype,
                    timer: 3000,
                    placement: {
                        from: from,
                        align: align
                    }
                });
        },
    }

</script>


</body>
</html>
