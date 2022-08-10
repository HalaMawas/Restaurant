@extends('layouts.mine')


@section('content')
    <div class="card-header no-border pb-0">
        <div class="card-title text-xs-center">
        <!--   <img style="    width: 200px;margin-bottom: -20px;" src="{{asset('app-assets/images/logo/Group 707.png')}}" alt="branding logo"> -->
        </div>
        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>We will send you a link to reset your password.</span></h6>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" action="{{ route('password.email') }}" method="POST" novalidate>
                @csrf

                <fieldset class="form-group position-relative has-icon-left">
                    {{--<input type="email" class="form-control form-control-lg input-lg" id="user-email" placeholder="Your Email Address" required>--}}

                    <input id="email" type="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your Email Address" required autocomplete="email" autofocus>
                    <div class="form-control-position">
                        <i class="icon-mail6"></i>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </fieldset>
                {{--<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-lock4"></i> Recover Password</button>--}}
                <button type="submit" class="btn btn-danger btn-lg btn-block">
                    <i class="icon-lock4"></i>
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>
    <div class="card-footer no-border">
        <p class="float-sm-left text-xs-center"><a href="{{url('login')}}" class="card-link">Login</a></p>
        <!--<p class="float-sm-right text-xs-center">New to Robust ? <a href="register-simple.html" class="card-link">Create Account</a></p>-->
    </div>
@endsection

